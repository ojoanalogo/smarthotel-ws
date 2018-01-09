<?php
/**
 * Controlador principal MySmartHotel
 *
 * Este archivo controla el controlador principal
 * @author Alfonso Reyes Cortés <hola@mrarc.xyz>
 * @version 1.0
 */

class ControladorPrincipal {
    public function variablesUsuario($usuario) {
        global $db;
        $args = array($usuario);
        $datos = array();
        $query = "SELECT * FROM sh_usuarios WHERE correo=?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return null;
        }
        foreach ($rs as $row) {
            $datos = $row;
        }
        return $datos;
    }
}
