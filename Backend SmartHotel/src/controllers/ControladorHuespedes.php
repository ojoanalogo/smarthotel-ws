<?php

class ControladorHuespedes {

    public function enviarAlarmaPuerta($id_iot_device) {
        global $db;
        $args = array($id_iot_device);
        $query = "SELECT fcm_key FROM sh_huespedes JOIN sh_reservaciones ON sh_reservaciones.huesped = sh_huespedes.id_huesped JOIN sh_habitaciones ON sh_reservaciones.id_habitacion = sh_habitaciones.habitacion WHERE sh_habitaciones.iot_id=? AND (DATE(NOW()) BETWEEN sh_reservaciones.desde AND sh_reservaciones.hasta) AND activa=1";
        $rs = $db->query($query, $args);
        if($rs === false) {
            return array("code" => 0, "msg" => "No se pudo enviar la alarma");
        }
        $fcm = "";
        foreach ($rs as $row) {
            $fcm = $row["fcm_key"];
        }
        return array("code" => 1, "msg" => "Enviando alarma", "resultado" => array($this->sendFCM($fcm, "⚠️ Aviso", "🚪 Dejaste abierta la puerta de tu habitación")));
    }
    public function sendFCM($id, $titulo, $msg) {
        if (!defined('API_ACCESS_KEY')) define( 'API_ACCESS_KEY', 'AAAAmnmTP8g:APA91bFiTrAY3E8OZ27F7pr_iFdJqMPZqoeUH_TXFbSzkLsOt2jdMc9PSEUBQp9Te7Fn_aYC3PpUGLvpv68FMkHh12Khbtgme7vsei-p2mkJaQ8Gzqbze7AcsOZLp9M4OqxZ8T6_pbOr' );
        $tokenarray = array($id);
        $msg = array(
            'title' => $titulo,
            'subtitle' => 'Notificaciones hotel',
            'sound' => 'default',
            'color' => '#009688',
            'icon' => 'ic_stat_room',
            'body' => $msg);
        $fields = array(
            'registration_ids' => $tokenarray,
            'notification' => $msg);
        $headers = array
        ('Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        return $result;
    }

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
    public function getEmails() {
        global $db;
        $args = array();
        $data = array();
        $query = "SELECT correo FROM sh_huespedes";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return array();
        }
        foreach ($rs as $row) {
            $data[] = $row;
        }
        return $data;
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