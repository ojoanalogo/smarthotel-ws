<?php
// Require
require_once  __DIR__ . "/../libs/firebase/firebase.php";
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
            $query = "SELECT * FROM sh_huespedes WHERE correo=? AND clave=? ";
        else
            $query = "SELECT * FROM sh_panel_usuarios WHERE correo=? AND clave=?";
        $rs = $db->query($query, $args);
        if ($rs === false) {
            return false;
        }
        foreach ($rs as $row) {
            if ($row["id_huesped"] >= 1) {
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

    public function authMe($correo, $clave) {
        global $db;
        $login = $this->validarUsuario($correo, $clave, true);
        if($login) {
            if ($this->reservacionActiva($correo)) {
                //ha hecho login
                $res = array("iat" => time(), "exp" => time() + $this->diasMinutos(3));
                $jwt = JWT::encode($res, 'txsh2018');
                $consultaDatos = "SELECT sh_huespedes.correo AS huesped_correo, sh_huespedes.nombre AS huesped_nombre, sh_huespedes.apellido AS huesped_apellido, sh_reservaciones.desde AS reservacion_desde, sh_reservaciones.hasta AS reservacion_hasta, sh_reservaciones.id_habitacion AS habitacion_numero FROM sh_huespedes INNER JOIN sh_reservaciones WHERE sh_huespedes.id_huesped = sh_reservaciones.huesped AND (DATE(NOW()) BETWEEN sh_reservaciones.desde AND sh_reservaciones.hasta) AND activa=1 AND correo=? LIMIT 1";
                $rs = $db->query($consultaDatos, array($correo));
                if ($rs===false){
                    http_response_code(500);
                    return array("code" => 0, "response" => "Error al recuperar datos");
                }
                $datos = array();
                foreach ($rs as $row) {
                    $datos[] = $row;
                }
                http_response_code(200);
                return
                    array(
                        "code" => 1,
                        "response" => array(
                            "msg" => "Usuario validado",
                            "token" => $jwt,
                            "userData" => $datos
                        )
                    );
            } else {
                http_response_code(200);
                return array("code" => 2, "response" => "Reservación no activa");
            }
        } else {
            http_response_code(401);
            return array("code" => 0, "response" => "Usuario/Clave no valido");
        }
    }

    function reservacionActiva($correo) {
        global $db;
        $args = array($correo);
        $query = "SELECT * FROM sh_huespedes INNER JOIN sh_reservaciones WHERE sh_huespedes.id_huesped = sh_reservaciones.huesped AND (DATE(NOW()) BETWEEN sh_reservaciones.desde AND sh_reservaciones.hasta) AND activa=1 AND correo=? LIMIT 1";
        $rs = $db->query($query, $args);
        if($rs === false) {
            return false;
        }
        return $db->rowcount();
    }

    private function diasMinutos($dias) {
        return $dias * 24 * 60;
    }
}
