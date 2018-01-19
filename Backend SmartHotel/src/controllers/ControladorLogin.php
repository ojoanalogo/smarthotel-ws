<?php
// Require
include_once "/../libs/firebase/firebase.php";
use Firebase\JWT\JWT;

/**
 * Controlador Login MySmartHotel
 *
 * Manejo de login
 * @author Alfonso Reyes Cortés <hola@mrarc.xyz>
 * @version 1.0
 */

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
     * @param bool $appLogin
     * @return bool - Valida si las credenciales son correctas
     */
    public function validarUsuario($user_post, $password_post, $appLogin=false) {
        global $db;
        $user = strtolower(trim($user_post));
        $password = stripslashes(hash("sha256", $password_post));
        $args = array($user, $password);
        $query = null;
        if ($appLogin)
            $query = "SELECT * FROM sh_huespedes WHERE correo=? AND clave=?";
        else
            $query = "SELECT * FROM sh_panel_usuarios WHERE correo=? AND clave=?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return false;
        }
        foreach ($rs as $row) {
            if ($row["id_usuario"] >= 1) {
                if(!$appLogin) {
                    $this->crearSesion($user);
                }
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
            global $db;
            $fecha = date('Y-m-d H:i:s');
            $db->query("UPDATE sh_panel_usuarios SET ultimo_login=? WHERE correo=?", array($fecha, $usuario));
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

    public function authMe($body) {
        $obj = json_decode($body, true);
        $login = $this->validarUsuario($obj["correo"], $obj["clave"], true);
        if($login) {
            //ha hecho login
            $res = array("iat" => time(), "exp" => time() + $this->diasMinutos(3));
            $jwt = JWT::encode($res, '');
            return
                array(
                    "code" => 1,
                    "response" => array(
                        "msg" => "Usuario validado",
                        "token" => $jwt
                    )
                );
        } else {
            return array("code" => 0, "response" => "Usuario/Clave no valido");
        }
    }

    private function diasMinutos($dias) {
        return $dias * 24 * 60;
    }
}
