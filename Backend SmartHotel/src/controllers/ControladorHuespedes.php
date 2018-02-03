<?php

class ControladorHuespedes {

    public function obtenerHuespedes() {
        global $db;
        $datos = array();
        $query = "SELECT id_huesped, correo, nombre, apellido, telefono,
  fecha_registro FROM sh_huespedes";
        $rs = $db->query($query);
        if ($rs === false) {
            return array("code" => 0, "msg" => "No se pudo obtener los huespedes");
        }
        foreach ($rs as $row) {
            $datos[] = $row;
        }
        return array("code" => 1, "msg" => "Huespedes obtenidos", "data" => $datos);
    }

    public function obtenerHuesped($id) {
        global $db;
        $datos = array();
        $args = array($id);
        $query = "SELECT * FROM sh_huespedes WHERE id_huesped=?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return array("code" => 0, "msg" => "No se pudo obtener el huesped");
        }
        foreach ($rs as $row) {
            $datos[] = $row;
        }
        return array("code" => 1, "msg" => "Huesped obtenido", "data" => $datos);
    }


    public function crearHuesped($correo, $clave, $nombre, $apellido, $telefono, $pais, $direccion) {
        if(!$correo || !$clave || !$nombre || !$apellido || !$telefono || !$pais || !$direccion) {
            return false;
        }
        global $db;
        $fechaRegistro = date("Y-m-d H:i:s");
        $claveHash = stripslashes(hash("sha256", $clave));
        $args = array($correo, $nombre, $apellido, $telefono, $fechaRegistro, $pais, $direccion, $claveHash);
        $query = "INSERT INTO sh_huespedes(correo, nombre, apellido, telefono, fecha_registro, pais_id, direccion, clave) 
VALUES (?,?,?,?,?,?,?,?)";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return false;
        }
        return true;
    }
    public function editarHuesped($idHuesped, $nombre, $apellido, $correo, $direccion, $telefono) {
        if(!$idHuesped || !$correo || !$nombre || !$apellido || !$telefono || !$direccion) {
            return false;
        }
        global $db;
        $args = array($nombre, $apellido, $correo, $direccion, $telefono, $idHuesped);
        $query = "UPDATE sh_huespedes SET nombre=?, apellido=?, correo=?, direccion=?, telefono=? WHERE id_huesped=?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return array("code" => 0, "msg" => "No se pudo editar el huesped");
        }
        return array("code" => 1, "msg" => "Huesped editado");
    }
    public function removerHuesped($id) {
        if (!$id) {
            return false;
        }
        global $db;
        $args = array($id);
        $query = "DELETE FROM sh_huespedes WHERE id_huesped=?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return false;
        }
        return true;
    }
}