<?php
/**
 * Controlador reservaciones MySmartHotel
 *
 * Este archivo controla el controlador habitaciones
 * @author Alfonso Reyes Cortés <hola@mrarc.xyz>
 * @version 1.0
 */

// Require
use Firebase\JWT\JWT;

class ControladorReservaciones {

    function getIdHuesped($correo) {
        global $db;
        $args = array($correo);
        $query = "SELECT id_huesped FROM sh_huespedes WHERE correo=?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return 0;
        }
        return $rs[0]["id_huesped"];
    }

    function solicitudLimpieza($body) {
        $datos = json_decode($body, true);
        $token = $datos["token"];
        if($this->validarToken($token)) {
            global $db;
            $correo = $datos["correo"];
            $habitacion = $datos["habitacion"];
            $notas = $datos["notas"];
            if(!$this->solicitudLimpiezaActiva($this->getIdHuesped($correo), $habitacion)) {
                $args = array($habitacion, $this->getIdHuesped($correo), $notas);
                $sql = "INSERT into sh_limpieza (habitacion, huesped, fecha, notas, estatus) VALUES (?,?,now(),?, 1)";
                $rs = $db->query($sql, $args);
                if ($rs === false) {
                    return array("code" => 0, "msg" => "Error procesando solicitud limpieza");
                }
                return array("code" => 1, "msg" => "Solicitud de limpieza añadida");
            } else {
                return array("code" => 2, "msg" => "Ya hay una solicitud activa de limpieza");
            }
        }
        return array("code" => -1, "msg" => "Token invalido");
    }

    function solicitudLimpiezaActiva($id_huesped, $habitacion) {
        global $db;
        $args = array($id_huesped, $habitacion);
        $sql = "SELECT * FROM sh_limpieza WHERE huesped=? AND habitacion=? AND estatus=1";
        $db->query($sql, $args);
        if($db->rowcount())
            return true;
        return false;
    }

    function validarToken($token) {
        try {
            $key = "eneit2018";
            $data = JWT::decode($token, $key, array('HS256'));
            if($data) {
                return true;
            }
        } catch (\Exception $e) {
            return false;
        }
        return false;
    }

    function obtenerHistorial($idHuesped) {
        global $db;
        $args = array($idHuesped);
        $sql = "SELECT * FROM sh_reservaciones WHERE huesped = ?";
        $rs = $db->query($sql, $args);
        if($rs === false) {
            return array("code" => 0, "msg" => "No se pudo obtener el historial");
        }
        $historial = array();
        foreach ($rs as $row) {
            $historial[] = $row;
        }
        return array("code" => 1, "msg" => "Historial obtenido", "data" => $historial);
    }

    function crearReservacion($idHuesped, $fechaDesde, $fechaHasta, $idHabitacion, $notas) {
        if(!$this->reservacionExiste($idHabitacion, $fechaDesde, $fechaHasta) && !$this->huespedYaHospedado($this->getIdHuesped($idHuesped), $fechaDesde, $fechaHasta)) {
            global $db;
            if(!$idHuesped || !$fechaDesde || !$fechaHasta || !$idHabitacion) {
                return array("code" => 2, "msg" => "Hay campos vacios");
            }
            $args = array($this->generarCodigoReservacion(), $this->getIdHuesped($idHuesped), $fechaDesde, $fechaHasta, $idHabitacion, $notas);
            $query = "INSERT INTO sh_reservaciones(id_reserva, huesped, desde, hasta, id_habitacion, notas, activa) VALUES (?,?,?,?,?,?, 1)";
            $rs = $db->query($query, $args);
            if ($rs === false) {
                return array("code" => 0, "msg" => "No se pudo crear la reservación");
            }
            return array("code" => 1, "msg" => "Reservación creada");
        }
        return array("code" => 2, "msg" => "Reservación ya existe");
    }

    function reservacionExiste($idHabitacion, $fechaDesde, $fechaHasta) {
        global $db;
        $args = array($fechaDesde, $fechaHasta, $fechaDesde, $fechaHasta, $idHabitacion);
        $sql = "SELECT * FROM sh_reservaciones WHERE (? BETWEEN desde AND hasta 
                OR ? BETWEEN desde AND hasta
                OR desde BETWEEN ? AND ?) AND id_habitacion=? AND activa=1";
        $db->query($sql, $args);
        if($db->rowcount())
            return true;
        return false;
    }

    function checkOutManual($idCheckout) {
        global $db;
        $args = array($idCheckout);
        $sql = "UPDATE sh_reservaciones SET sh_reservaciones.activa=0 WHERE sh_reservaciones.id_reserva=?";
        $rs = $db->query($sql, $args);
        if ($rs === false) {
            return array("code" => 0, "msg" => "No se pudo cancelar la reservación");
        }
        return array("code" => 1, "msg" => "Reservación modificada");
    }

    function huespedYaHospedado($idHuesped, $fechaDesde, $fechaHasta) {
        global $db;
        $args = array($fechaDesde, $fechaHasta, $fechaDesde, $fechaHasta, $idHuesped);
        $sql = "SELECT * FROM sh_reservaciones WHERE (? BETWEEN desde AND hasta 
                OR ? BETWEEN desde AND hasta
                OR desde BETWEEN ? AND ?) AND huesped=? AND activa=1";
        $db->query($sql, $args);
        if($db->rowcount())
            return true;
        return false;
    }

    function obtenerHabitacionesReservas() {
        global $db;
        $sql = "SELECT sh_habitaciones.habitacion AS habitacion_numero, sh_habitaciones.estatus AS habitacion_estatus, sh_habitaciones_tipos.tipo_habitacion AS habitacion_tipo,
sh_habitaciones_tipos.costo_mx AS habitacion_costo_MX, sh_habitaciones_tipos.costo_usd AS habitacion_costo_USD, sh_pisos.piso AS piso_numero, sh_pisos.nombre AS piso_nombre,
sh_huespedes.nombre AS huesped_nombre, sh_huespedes.correo AS huesped_correo, sh_huespedes.apellido AS huesped_apellido,
sh_habitaciones.iot_id AS habitacion_iot_id, sh_reservaciones.huesped AS reservacion_idHuesped, sh_reservaciones.desde AS reservacion_desde,
sh_reservaciones.id_reserva AS reservacion_codigo,
sh_reservaciones.hasta AS reservacion_hasta, sh_reservaciones.notas AS reservacion_notas
FROM sh_habitaciones
JOIN sh_reservaciones ON sh_habitaciones.habitacion = sh_reservaciones.id_habitacion
JOIN sh_habitaciones_tipos ON sh_habitaciones.id_tipo_habitacion = sh_habitaciones_tipos.id_tipo_habitacion
JOIN sh_huespedes ON sh_reservaciones.huesped = sh_huespedes.id_huesped
JOIN sh_pisos ON sh_habitaciones.id_piso = sh_pisos.piso  
WHERE DATE(NOW()) BETWEEN sh_reservaciones.desde AND sh_reservaciones.hasta AND sh_reservaciones.activa='1'
ORDER BY sh_habitaciones.habitacion, sh_habitaciones.id_piso";
        $rs = $db->query($sql, array());
        if($rs === false) {
            return array("code" => 0, "msg" => "No se pudieron obtener las habitaciones reservadas");
        }
        $datos = array();
        foreach ($rs as $row) {
            $datos[$row["piso_nombre"]][] = $row;
        }
        return array("code" => 1, "msg" => "Habitaciones reservadas obtenidas", "data" => $datos);
    }

    function generarCodigoReservacion() {
        $nCaracteres = 8;
        return substr(str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789"), 0, $nCaracteres);
    }
}