<?php
/**
 * Controlador habitaciones MySmartHotel
 *
 * Este archivo controla el controlador habitaciones
 * @author Alfonso Reyes Cortés <hola@mrarc.xyz>
 * @version 1.0
 */

class ControladorHabitaciones {

    public function añadirPiso($piso, $nombre) {
        global $db;
        $query = "INSERT INTO sh_pisos(piso, nombre) VALUES (?, ?)";
        $rs = $db->query($query, array($piso, $nombre));
        if ($rs === false) {
            return array("code" => 0, "msg" => "Piso ya existe");
        }
        return array("code" => 1, "msg" => "Piso añadido");
    }
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
}