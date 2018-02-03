<?php
/**
 * Controlador habitaciones MySmartHotel
 *
 * Este archivo controla el controlador habitaciones
 * @author Alfonso Reyes Cortés <hola@mrarc.xyz>
 * @version 1.0
 */

class ControladorHabitaciones {
    /**
     * Pisos
     */

    /**
     * @param $piso
     * @param $nombre
     * @return array
     */
    public function añadirPiso($piso, $nombre) {
        global $db;
        $query = "INSERT INTO sh_pisos(piso, nombre) VALUES (?, ?)";
        $rs = $db->query($query, array($piso, $nombre));
        if ($rs === false) {
            return array("code" => 0, "msg" => "Piso ya existe");
        }
        return array("code" => 1, "msg" => "Piso añadido");
    }

    /**
     * @param $piso
     * @param $nombre
     * @param $nuevoPiso
     * @return array
     */
    public function editarPiso($piso, $nombre, $nuevoPiso) {
        global $db;
        $args = array($nuevoPiso, $nombre, $piso);
        $query = "UPDATE sh_pisos SET piso=?, nombre=? WHERE piso=?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return array("code" => 0, "msg" => "Piso ya existe");
        }
        return array("code" => 1, "msg" => "Piso editado", "data" => array($nuevoPiso, $nombre));
    }

    /**
     * @return array
     */
    public function obtenerPisos() {
        global $db;
        $query = "SELECT * FROM sh_pisos ORDER BY piso";
        $rs = $db->query($query);
        $datos = array();
        if ($rs === false) {
            return array("code" => 0, "msg" => "Error al intentar obtener pisos");
        }
        foreach ($rs as $row) {
            $datos[] = $row;
        }
        return array("code" => 1, "msg" => "Pisos obtenidos", "data" => $datos);
    }

    /**
     * @param $id_piso
     * @return array
     */
    public function obtenerPiso($id_piso) {
        global $db;
        $args = array($id_piso);
        $query = "SELECT * FROM sh_pisos WHERE piso=?";
        $rs = $db->query($query, $args);
        $datos = array();
        if ($rs === false) {
            return array("code" => 0, "msg" => "Error al intentar obtener piso");
        }
        foreach ($rs as $row) {
            $datos[] = $row;
        }
        return array("code" => 1, "msg" => "Piso obtenido", "data" => $datos);
    }

    /**
     * @param $id_piso
     * @return array
     */
    public function eliminarPiso($id_piso) {
        global $db;
        $args = array($id_piso);
        $query = "DELETE FROM sh_pisos WHERE piso=?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return array("code" => 0, "msg" => "Error al intentar eliminar piso");
        }
        return array("code" => 1, "msg" => "Pisos eliminado");
    }

    /**
     * Habitaciones
     *
     *
     * SELECT habitacion, estatus, tipo_habitacion, costo_mx,
     * costo_usd, piso, nombre FROM `sh_habitaciones`
     * JOIN sh_habitaciones_tipos ON sh_habitaciones.id_tipo_habitacion = sh_habitaciones_tipos.id_tipo_habitacion
     * JOIN sh_pisos ON sh_habitaciones.id_piso = sh_pisos.id_piso
     *
     */
    /**
     * @return array
     */
    public function obtenerHabitaciones() {
        global $db;
        $query = "SELECT sh_habitaciones.habitacion, sh_habitaciones.estatus, sh_habitaciones_tipos.tipo_habitacion,
 sh_habitaciones_tipos.costo_mx, sh_habitaciones_tipos.costo_usd, sh_pisos.piso, sh_pisos.nombre,
  sh_habitaciones.iot_id, sh_habitaciones.iot_key FROM sh_habitaciones
   JOIN sh_habitaciones_tipos ON sh_habitaciones.id_tipo_habitacion = sh_habitaciones_tipos.id_tipo_habitacion
   JOIN sh_pisos ON sh_habitaciones.id_piso = sh_pisos.piso ORDER BY sh_habitaciones.habitacion, sh_habitaciones.id_piso";
        $queryTipos = "SELECT * from sh_habitaciones_tipos";
        $rs = $db->query($query, array());
        if ($rs === false)
            return array("code" => 0, "msg" => "Error al intentar obtener habitaciones");
        $rsTipos = $db->query($queryTipos, array());
        if ($rsTipos === false)
            return array("code" => 0, "msg" => "Error al intentar obtener tipos de habitación");
        $queryPisos = "SELECT * from sh_pisos";
        $rsPisos = $db->query($queryPisos, array());
        if ($rsPisos === false)
            return array("code" => 0, "msg" => "Error al intentar obtener pisos");
        $datos = array();
        $categorias = array();
        $pisos = array();
        foreach ($rs as $row)
            $datos[$row["nombre"]][] = $row;
        /**
         * Categorias y pisos para las opciones select
         */
        foreach($rsTipos as $row)
            $categorias[] = $row;
        foreach($rsPisos as $row)
            $pisos[] = $row;
        return array("code" => 1, "msg" => "Habitaciones obtenidas", "data" => $datos, "categorias" => $categorias, "pisos" => $pisos);
    }

    /**
     * @param $numeroHabitacion
     * @param $piso
     * @param $tipo_habitacion
     * @param $iot_id
     * @param $iot_key
     * @return array
     */
    public function añadirHabitacion($numeroHabitacion, $piso, $tipo_habitacion, $iot_id, $iot_key) {
        global $db;
        $args = array($numeroHabitacion, $piso, $tipo_habitacion, $iot_id, $iot_key);
        $query = "INSERT INTO sh_habitaciones(habitacion, id_piso, id_tipo_habitacion, iot_id, iot_key, estatus) VALUES(?, ?, ?, ?, ?, 1)";
        $rs = $db->query($query, $args);
        if ($rs === false)
            return array("code" => 0, "msg" => "Error al intentar añadir habitación");
        return array("code" => 1, "msg" => "Habitaciones añadida");
    }

    /**
     * @param $id_habitacion
     * @return array
     */
    public function eliminarHabitacion($id_habitacion) {
        global $db;
        $args = array($id_habitacion);
        $query = "DELETE FROM sh_habitaciones WHERE habitacion = ?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return array("code" => 0, "msg" => "Error al intentar eliminar habitación");
        }
        return array("code" => 1, "msg" => "Habitación eliminada");
    }

    /**
     * @param $id_habitacion
     * @return array
     */
    public function obtenerHabitacion($id_habitacion) {
        global $db;
        $args = array($id_habitacion);
        $query = "SELECT * FROM sh_habitaciones WHERE habitacion=?";
        $rs = $db->query($query, $args);
        $datos = array();
        if ($rs === false) {
            return array("code" => 0, "msg" => "Error al intentar obtener habitación");
        }
        foreach ($rs as $row) {
            $datos[] = $row;
        }
        return array("code" => 1, "msg" => "Habitación obtenida", "data" => $datos);
    }

    /**
     * @param $id_habitacion
     * @param $nuevaHabitacion
     * @param $piso
     * @param $tipo_habitacion
     * @param $iot_id
     * @param $iot_key
     * @return array
     */
    public function editarHabitacion($id_habitacion, $nuevaHabitacion, $piso, $tipo_habitacion, $iot_id, $iot_key) {
        global $db;
        $args = array($nuevaHabitacion, $piso, $tipo_habitacion, $iot_id, $iot_key, $id_habitacion);
        $query = "UPDATE sh_habitaciones SET habitacion=?, id_piso=?, id_tipo_habitacion=?, iot_id=?, iot_key=? WHERE habitacion=?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return array("code" => 0, "msg" => "Esa habitación ya existe");
        }
        return array("code" => 1, "msg" => "Habitación editada");
    }

    /**
     * Tipos de habitación
     */

    /**
     * @return array
     */
    public function obtenerTipos() {
        global $db;
        $query = "SELECT * FROM sh_habitaciones_tipos";
        $rs = $db->query($query, array());
        $datos = array();
        if ($rs === false) {
            return array("code" => 0, "msg" => "Error al intentar obtener piso");
        }
        foreach ($rs as $row) {
            $datos[] = $row;
        }
        return array("code" => 1, "msg" => "Tipos de habitaciones obtenidas", "data" => $datos);
    }

    /**
     * @param $tipo
     * @param $mx
     * @param $usd
     * @return array
     */
    public function añadirTipo($tipo, $mx, $usd) {
        global $db;
        $query = "INSERT INTO sh_habitaciones_tipos(tipo_habitacion, costo_mx, costo_usd) VALUES (?, ?, ?)";
        $rs = $db->query($query, array($tipo, $mx, $usd));
        if ($rs === false) {
            return array("code" => 0, "msg" => "Tipo de habitación ya existe");
        }
        return array("code" => 1, "msg" => "Tipo de habitación añadida");
    }

    public function obtenerTipo($id_tipo) {
        global $db;
        $args = array($id_tipo);
        $query = "SELECT * FROM sh_habitaciones_tipos WHERE id_tipo_habitacion=?";
        $rs = $db->query($query, $args);
        $datos = array();
        if ($rs === false) {
            return array("code" => 0, "msg" => "Error al intentar obtener tipo de habitación");
        }
        foreach ($rs as $row) {
            $datos[] = $row;
        }
        return array("code" => 1, "msg" => "Tipo de habitación obtenida", "data" => $datos);
    }
    public function editarTipo($id, $tipo, $mxn, $usd) {
        global $db;
        $args = array($tipo, $mxn, $usd, $id);
        $query = "UPDATE sh_habitaciones_tipos SET tipo_habitacion=?, costo_mx=?, costo_usd=? WHERE id_tipo_habitacion=?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return array("code" => 0, "msg" => "Tipo de habitación ya existe");
        }
        return array("code" => 1, "msg" => "Tipo de habitación editado");
    }
    public function eliminarTipo($id_tipo) {
        global $db;
        $args = array($id_tipo);
        $query = "DELETE FROM sh_habitaciones_tipos WHERE id_tipo_habitacion=?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return array("code" => 0, "msg" => "Error al intentar eliminar tipo de habitación");
        }
        return array("code" => 1, "msg" => "Tipo de habitación eliminada");
    }


}