<?php
/**
 * Controlador reservaciones MySmartHotel
 *
 * Este archivo controla el controlador habitaciones
 * @author Alfonso Reyes Cortés <hola@mrarc.xyz>
 * @version 1.0
 */
class ControladorReservaciones {
    function crearReservacion($idHuesped, $fechaDesde, $fechaHasta, $idHabitacion, $notas) {
        if(!$this->reservacionExiste($idHabitacion, $fechaDesde, $fechaHasta) && !$this->huespedYaHospedado($idHuesped, $fechaDesde, $fechaHasta)) {
            global $db;
            if(!$idHuesped || !$fechaDesde || !$fechaHasta || !$idHabitacion || !$notas) {
                return array("code" => 2, "msg" => "Hay campos vacios");
            }
            $args = array($this->generarCodigoReservacion(), $idHuesped, $fechaDesde, $fechaHasta, $idHabitacion, $notas);
            $query = "INSERT INTO sh_reservaciones(id_reserva, huesped, desde, hasta, id_habitacion, notas) VALUES (?,?,?,?,?,?)";
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
                OR desde BETWEEN ? AND ?) AND id_habitacion=?";
        $db->query($sql, $args);
        if($db->rowcount())
            return true;
        return false;
    }
    function huespedYaHospedado($idHuesped, $fechaDesde, $fechaHasta) {
        global $db;
        $args = array($fechaDesde, $fechaHasta, $fechaDesde, $fechaHasta, $idHuesped);
        $sql = "SELECT * FROM sh_reservaciones WHERE (? BETWEEN desde AND hasta 
                OR ? BETWEEN desde AND hasta
                OR desde BETWEEN ? AND ?) AND huesped=?";
        $db->query($sql, $args);
        if($db->rowcount())
            return true;
        return false;
    }

    function generarCodigoReservacion() {
        $nCaracteres = 8;
        return substr(str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789"), 0, $nCaracteres);
    }
}