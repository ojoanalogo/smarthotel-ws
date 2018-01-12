<?php
/**
 * Controlador habitaciones MySmartHotel
 *
 * Este archivo controla el controlador habitaciones
 * @author Alfonso Reyes Cortés <hola@mrarc.xyz>
 * @version 1.0
 */

class ControladorHabitaciones {
    public function añadirPiso($piso, $nombre)
    {
        global $db;
        $query = "INSERT INTO sh_pisos VALUES (?, ?)";
        $rs = $db->query($query, array($piso, $nombre));
        if ($rs === false) {
            return array("code" => 0, "msg" => "Error al intentar añadir piso");
        }
        return array("code" => 1, "msg" => "Si funciona");
    }
}