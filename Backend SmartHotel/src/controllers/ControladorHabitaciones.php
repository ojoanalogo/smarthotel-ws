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
     * @param $id_piso
     * @param $piso
     * @param $nombre
     * @return array
     */
    public function editarPiso($id_piso, $piso, $nombre) {
        global $db;
        $args = array($piso, $nombre, $id_piso);
        $query = "UPDATE sh_pisos SET piso=?, nombre=? WHERE id_piso=?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return array("code" => 0, "msg" => "Piso ya existe");
        }
        return array("code" => 1, "msg" => "Piso editado");
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
        $query = "SELECT * FROM sh_pisos WHERE id_piso=?";
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
    public function eliminarPiso($id_piso) {
        global $db;
        $args = array($id_piso);
        $query = "DELETE FROM sh_pisos WHERE id_piso=?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return array("code" => 0, "msg" => "Error al intentar borrar piso");
        }
        return array("code" => 1, "msg" => "Pisos eliminado");
    }

    /**
     * Habitaciones
     *
     *
     * SELECT id_habitacion, estatus, tipo_habitacion, costo_mx,
     * costo_usd, piso, nombre FROM `sh_habitaciones`
     * JOIN sh_habitaciones_tipos ON sh_habitaciones.id_tipo_habitacion = sh_habitaciones_tipos.id_tipo_habitacion
     * JOIN sh_pisos ON sh_habitaciones.id_piso = sh_pisos.id_piso
     *
     */
    public function obtenerHabitaciones() {
        global $db;
        $datos = array();
        $query = "SELECT sh_habitaciones.id_habitacion, sh_habitaciones.estatus, sh_habitaciones_tipos.tipo_habitacion,
 sh_habitaciones_tipos.costo_mx, sh_habitaciones_tipos.costo_usd, sh_pisos.piso,
  sh_pisos.nombre, sh_habitaciones.iot_id, sh_habitaciones.iot_key FROM sh_habitaciones
   JOIN sh_habitaciones_tipos ON sh_habitaciones.id_tipo_habitacion = sh_habitaciones_tipos.id_tipo_habitacion
    JOIN sh_pisos ON sh_habitaciones.id_piso = sh_pisos.id_piso ORDER BY sh_pisos.piso";
        $rs = $db->query($query, array());
        if ($rs === false) {
            return array("code" => 0, "msg" => "Error al intentar obtener habitaciones");
        }
        foreach ($rs as $row) {
            $datos[] = $row;
        }
        return array("code" => 1, "msg" => "Habitaciones obtenidas", "data" => $datos);
    }
}