<?php
/**
 * Controlador principal MySmartHotel
 *
 * Este archivo controla el controlador principal
 * @author Alfonso Reyes Cortés <hola@mrarc.xyz>
 * @version 1.0
 */

class ControladorPrincipal {

    /**
     * @param $usuario
     * @return array|null - Retorna los datos del administrador
     */
    public function variablesUsuario($usuario) {
        global $db;
        $args = array($usuario);
        $datos = array();
        $query = "SELECT id_usuario, correo, usuario, nombre, apellido,
  fecha_registro, rol FROM sh_panel_usuarios JOIN sh_roles ON sh_panel_usuarios.id_rol = sh_roles.id_rol";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return null;
        }
        foreach ($rs as $row) {
            $datos = $row;
        }
        return $datos;
    }

    public function obtenerUsuarios() {
        global $db;
        $datos = array();
        $query = "SELECT id_usuario, correo, usuario, nombre, apellido, telefono,
  fecha_registro FROM sh_usuarios";
        $rs = $db->query($query);
        if ($rs === false) {
            return null;
        }
        foreach ($rs as $row) {
            $datos[] = $row;
        }
        return $datos;
    }
}
