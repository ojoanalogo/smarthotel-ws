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
  fecha_registro FROM sh_huespedes";
        $rs = $db->query($query);
        if ($rs === false) {
            return null;
        }
        foreach ($rs as $row) {
            $datos[] = $row;
        }
        return $datos;
    }
    public function obtenerConfig() {
        global $db;
        $query = "SELECT * FROM sh_configuracion LIMIT 1";
        $rs = $db->query($query);
        $datos = array();
        if ($rs === false) {
            return array("code" => 0, "msg" => "Error al intentar obtener configuración");
        }
        foreach ($rs as $row) {
            $datos[] = $row;
        }
        return array("code" => 1, "msg" => "Configuración obtenida", "data" => $datos);
    }

    public function actualizarConfig($dataConfig) {
        global $db;
        $parametros = array();
        parse_str($dataConfig, $parametros);
        $args = array($parametros["nombre_hotel"], $parametros["correo"], $parametros["ciudad"],
            $parametros["pais"], $parametros["codigo_postal"],
            $parametros["direccion"], $parametros["info"]);
        $query = "UPDATE sh_configuracion SET nombre_hotel=?, correo=?, ciudad=?, pais=?, codigo_postal=?, direccion=?, info=?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return array("code" => 0, "msg" => "Error al intentar obtener configuración");
        }
        return array("code" => 1, "msg" => "Configuración guardada", "data"=> $parametros);
    }
}