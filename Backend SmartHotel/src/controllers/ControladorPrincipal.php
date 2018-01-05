<?php
/**
 * Controlador principal MySmartHotel
 *
 * Este archivo controla el controlador principal
 * @author Alfonso Reyes Cortés <hola@mrarc.xyz>
 * @version 1.0
 */

class ControladorPrincipal {
    public function verificarAcceso() {
        session_start();
        return isset($_SESSION['login_usuario']);
    }
    public function deslogear() {
        session_start();
        session_destroy();
    }
}
