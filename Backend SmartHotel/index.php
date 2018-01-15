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
require_once __DIR__ . "/src/controllers/ControladorHabitaciones.php";

$controladorPrincipal = new ControladorPrincipal();
$controladorLogin = new ControladorLogin();
$controladorHabitaciones = new ControladorHabitaciones();

/**
 * Rutas de la aplicación
 */

/**
 * Ruta principal
 */
$app->get("/", function() use ($app, $controladorLogin, $controladorPrincipal) {
    if (checkAuth()) {
        header("Location: /dashboard");
        return $app->Response('dashboard.php', valoresDefault()  , 201);
    }
    else
        return $app->Response('login.php', array(),201);
});

/**
 * Servir Index
 */
$app->get('/dashboard', function() use ($app, $controladorLogin, $controladorPrincipal ) {
    if (checkAuth())
        return $app->Response('dashboard.php', valoresDefault()  , 201);
    else
        return $app->Response('login.php', array(),201);
});

/**
 * Servir pag habitaciones
 */
$app->get('/dashboard/habitaciones', function() use ( $app, $controladorLogin, $controladorPrincipal ) {
    if (checkAuth())
        return $app->Response('habitaciones.php', valoresDefault() , 201);
    else
        return $app->Response('login.php', array(),201);
});

/**
 * Servir Detalle habitación
 */
$app->get('/dashboard/habitaciones/detalle/:habitacion', function($habitacion) use ( $app, $controladorLogin, $controladorPrincipal ) {
    if (checkAuth())
        return $app->Response('detalle_habitacion.php', valoresDefault(array($habitacion)), 201);
    else
        return $app->Response('login.php', array(),201);
});

/**
 * Servir pag huespedes
 */
$app->get('/dashboard/huespedes',function() use ( $app, $controladorLogin, $controladorPrincipal ) {
    if (checkAuth())
        return $app->Response('huespedes.php', valoresDefault(), 201);
    else
        return $app->Response('login.php', array(),201);
});


/**
 * Servir pag Mapa
 */
$app->get('/dashboard/mapa',function() use ( $app, $controladorLogin, $controladorPrincipal ) {
    if (checkAuth())
        return $app->Response('mapa.php', valoresDefault(), 201);
    else
        return $app->Response('login.php', array(),201);
});

/**
 * Servir Configuración
 */
$app->get('/dashboard/configuracion', function() use ($app, $controladorLogin, $controladorPrincipal ) {
    if (checkAuth())
        return $app->Response('configuracion.php', valoresDefault(), 201);
    else
        return $app->Response('login.php', array(),201);
});

/**
 * Config pisos
 */

$app->get('/dashboard/configuracion/pisos', function() use ($app, $controladorLogin, $controladorPrincipal ) {
    if (checkAuth())
        return $app->Response('configuracion_pisos.php', valoresDefault(), 201);
    else
        return $app->Response('login.php', array(),201);
});

/**
 * Config cuartos
 */

$app->get('/dashboard/configuracion/habitaciones', function() use ($app, $controladorLogin, $controladorPrincipal ) {
    if (checkAuth())
        return $app->Response('configuracion_habitaciones.php', valoresDefault(), 201);
    else
        return $app->Response('login.php', array(),201);
});

// Logout
$app->get('/logout',function() use ( $app, $controladorLogin ) {
    $controladorLogin->deslogear();
    header("Location: /dashboard");
});

$app->post("/authme_panel", function() use ($app, $controladorLogin) {
    if ($controladorLogin->validarUsuario($app->getRequest()->post("correo"), $app->getRequest()->post("clave"))) {
        header("Location: /dashboard");
        return null;
    }
    return $app->Response('login.php', array("error" => true),201);
});

$app->post("/authme", function() use ($app, $controladorLogin) {
    $controladorLogin->authMe($app->getRequest()->post("correo"), $app->getRequest()->post("clave"));
});

$app->post("/api/habitacion/{funcion}", function($funcion) use ($app, $controladorHabitaciones) {
    /**
     * Para pisos
     */
    if($funcion == "addPiso")
        $app->JsonResponse($controladorHabitaciones->añadirPiso(
            $app->getRequest()->post("piso"),
            $app->getRequest()->post("nombre")), 201);
    if($funcion == "eliminarPiso")
        $app->JsonResponse($controladorHabitaciones->eliminarPiso($app->getRequest()->post("id_piso")), 201);
    if($funcion == "obtenerPisos")
        $app->JsonResponse($controladorHabitaciones->obtenerPisos(), 201);
    if($funcion == "obtenerPiso")
        $app->JsonResponse($controladorHabitaciones->obtenerPiso($app->getRequest()->post("id_piso")), 201);
    if($funcion == "editarPiso")
        $app->JsonResponse($controladorHabitaciones->editarPiso($app->getRequest()->post("piso"),
            $app->getRequest()->post("nombre")), 201);
    /**
     * Para habitaciones
     */
    if($funcion == "obtenerHabitaciones") {
        $app->JsonResponse($controladorHabitaciones->obtenerHabitaciones(), 200);
    }
});

$app->post("/api/hotel/{funcion}", function($funcion) use ($app, $controladorPrincipal) {
    if($funcion == "obtenerConfig")
        $app->JsonResponse($controladorPrincipal->obtenerConfig(), 201);
    if($funcion == "actualizarConfig")
        $app->JsonResponse($controladorPrincipal->actualizarConfig($app->getRequest()->getBody()), 201);
});

// 404
$app->respond( function() use ( $app ){
    return $app->ResponseHTML('<p> 404 </p>', 404);
});

function checkAuth() {
    global $controladorLogin;
    return $controladorLogin->verificarAcceso();
}

function valoresDefault($extraArgs = array()) {
    global $controladorPrincipal, $controladorLogin;
    $datosUsuario = $controladorPrincipal->variablesUsuario($controladorLogin->obtenerUsuario());
    $datosUsuarios = $controladorPrincipal->obtenerUsuarios();
    return array("datosUsuario" => $datosUsuario, "datosUsuarios" => $datosUsuarios, "args" => $extraArgs);
}

$app->listen();