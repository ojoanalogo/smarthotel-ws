<?php
/**
 * Archivo Index MySmartHotel
 *
 * Este archivo inicializa la aplicación web
 * @author Alfonso Reyes Cortés <hola@mrarc.xyz>
 * @version 1.0
 */

// Libreria OneFramework
require_once('src/core/one_framework.php');
// Inicializar App
$app = new \OnePHP\App();

/**
 * DB
 */

require_once __DIR__ . "/src/libs/database_manager/pdo_database.class.php";
require_once __DIR__ . "/src/config/config.php";
$db = new wArLeY_DBMS(DB_TYPE, DB_HOST, DB_DB, DB_USR, DB_PWD, DB_PORT);
if ($db->Cnxn() == false) {
    die(HNDLR_CNXNDB);
}

/**
 * Controladores
 */
require_once __DIR__ . "/src/controllers/ControladorPrincipal.php";
require_once __DIR__ . "/src/controllers/ControladorLogin.php";


/**
 * Rutas de la aplicación
 */
// Index
$app->get('/dashboard',function() use ( $app ) {
    $controladorLogin = new ControladorLogin();
    $logeado = $controladorLogin->verificarAcceso();
    if ($logeado) {
        $controladorPrincipal = new ControladorPrincipal();
        return $app->Response('dashboard.php', array("datos" =>
            $controladorPrincipal->variablesUsuario($controladorLogin->obtenerUsuario())) , 201);
    }
    else
        return $app->Response('login.php', array(),201);
});

$app->get('/dashboard/habitaciones',function() use ( $app ) {
    $controladorLogin = new ControladorLogin();
    $logeado = $controladorLogin->verificarAcceso();
    if ($logeado) {
        $controladorPrincipal = new ControladorPrincipal();
        return $app->Response('habitaciones.php', array("datos" =>
            $controladorPrincipal->variablesUsuario($controladorLogin->obtenerUsuario())) , 201);
    }
    else
        return $app->Response('login.php', array(),201);
});
$app->get('/dashboard/huespedes',function() use ( $app ) {
    $controladorLogin = new ControladorLogin();
    $logeado = $controladorLogin->verificarAcceso();
    if ($logeado) {
        $controladorPrincipal = new ControladorPrincipal();
        return $app->Response('huespedes.php', array("datos" =>
            $controladorPrincipal->variablesUsuario($controladorLogin->obtenerUsuario())) , 201);
    }
    else
        return $app->Response('login.php', array(),201);
});

// Logout
$app->get('/logout',function() use ( $app ) {
    $controladorLogin = new ControladorLogin();
    $controladorLogin->deslogear();
    header("Location: /dashboard");
});

$app->get("/", function() use ($app) {
    $controladorLogin = new ControladorLogin();
    $logeado = $controladorLogin->verificarAcceso();
    if ($logeado) {
        $controladorPrincipal = new ControladorPrincipal();
        header("Location: /dashboard");
        return $app->Response('dashboard.php', array("datos" =>
            $controladorPrincipal->variablesUsuario($controladorLogin->obtenerUsuario())) , 201);
    }
    else

        return $app->Response('login.php', array(),201);
});

$app->post("/authme_panel", function() use ($app) {
    $controladorLogin = new ControladorLogin();
    if ($controladorLogin->validarUsuario($app->getRequest()->post("correo"), $app->getRequest()->post("clave"))) {
        header("Location: /dashboard");
    } else {
        return $app->Response('login.php', array("error" => true),201);
    }
});

// 404
$app->respond( function() use ( $app ){
    return $app->ResponseHTML('<p> 404 </p>', 404);
});

$app->listen();