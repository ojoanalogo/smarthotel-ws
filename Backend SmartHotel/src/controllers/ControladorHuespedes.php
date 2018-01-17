<?php

class ControladorHuespedes {

    public function obtenerHuespedes() {
        global $db;
        $datos = array();
        $query = "SELECT id_usuario, correo, nombre, apellido, telefono,
  fecha_registro FROM sh_huespedes";
        $rs = $db->query($query);
        if ($rs === false) {
            return array("code" => 1, "msg" => "No se pudo obtener los huespedes", "data" => "[]");
        }
        foreach ($rs as $row) {
            $datos[] = $row;
        }
        return array("code" => 1, "msg" => "Huespedes obtenidos", "data" => $datos);
    }
}