<?php
/**
 * Controlador Login MySmartHotel
 *
 * Manejo de login
 * @author Alfonso Reyes Cortés <hola@mrarc.xyz>
 * @version 1.0
 */

// Require

class ControladorLogin
{
    /**
     * ControladorLogin constructor.
     * Inicializa el objeto db
     */
    function __construct()
    {
        session_start();
    }

    /**
     * @param $user_post - Usuario o correo solicitud
     * @param $password_post - Clave solicitud
     * @return bool - Valida si las credenciales son correctas
     */
    public function validarUsuario($user_post, $password_post)
    {
        global $db;
        $user = strtolower(trim($user_post));
        $password = stripslashes(hash("sha256", $password_post));
        $args = array($user, $password);
        $query = "SELECT * FROM sh_usuarios WHERE correo=? AND clave=?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return false;
        }
        foreach ($rs as $row) {
            if ($row["id_usuario"] >= 1) {
                $this->crearSesion($user);
                return true;
            }
        }
        return false;
    }

    /**
     * Crea una seisón de usuario
     * @param $usuario - Usuario de sesión
     */
    private function crearSesion($usuario) {
        if (!isset($_SESSION["login_usuario"])) {
            $_SESSION["login_usuario"] = $usuario;
        }
    }

    /**
     * Verifica si la sesión esta iniciada
     * @return bool - sesion login usuario
     */
    public function verificarAcceso() {
        return isset($_SESSION['login_usuario']);
    }

    public function obtenerUsuario() {
        return $_SESSION['login_usuario'];
    }

    /**
     * Deslogea al usuario destruyendo su sesión
     */
    public function deslogear() {
        session_destroy();
    }

}