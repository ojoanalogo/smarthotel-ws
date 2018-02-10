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
require_once __DIR__ . "/src/controllers/ControladorHuespedes.php";
require_once __DIR__ . "/src/controllers/ControladorReservaciones.php";

$controladorPrincipal = new ControladorPrincipal();
$controladorLogin = new ControladorLogin();
$controladorHabitaciones = new ControladorHabitaciones();
$controladorHuespedes = new ControladorHuespedes();
$controladorReservaciones = new ControladorReservaciones();

/**
 * Rutas de la aplicación
 */

/**
 * Ruta principal
 */
$app->get("/", function () use ($app, $controladorLogin, $controladorPrincipal) {
    if (checkAuth()) {
        header("Location: /dashboard");
        return $app->Response('dashboard.php', valoresDefault($controladorPrincipal->obtenerConfig()), 201);
    } else
        return $app->Response('login.php', array(), 201);
});

/**
 * Servir Index
 */
$app->get('/dashboard', function () use ($app, $controladorPrincipal) {
    if (checkAuth())
        return $app->Response('dashboard.php', valoresDefault($controladorPrincipal->obtenerConfig()), 201);
    else
        return $app->Response('login.php', array(), 201);
});

/**
 * Servir pag habitaciones
 */
$app->get('/dashboard/habitaciones', function () use ($app, $controladorLogin, $controladorPrincipal) {
    if (checkAuth())
        return $app->Response('habitaciones.php', valoresDefault(), 201);
    else
        return $app->Response('login.php', array(), 201);
});
$app->get('/dashboard/habitaciones/llegada/:habitacion', function ($habitacion) use ($app, $controladorHuespedes, $controladorLogin, $controladorPrincipal) {
    if (checkAuth())
        return $app->Response('llegada.php', valoresDefault(array($habitacion), $controladorHuespedes->getEmails()), 201);
    else
        return $app->Response('login.php', array(), 201);
});


/**
 * Servir IoT habitación
 */
$app->get('/dashboard/habitaciones/iot/:habitacion', function ($habitacion) use ($app, $controladorLogin, $controladorPrincipal) {
    if (checkAuth())
        return $app->Response('detalle_habitacion.php', valoresDefault(array($habitacion)), 201);
    else
        return $app->Response('login.php', array(), 201);
});

/**
 * Servir pag huespedes
 */
$app->get('/dashboard/huespedes', function () use ($app, $controladorHuespedes) {
    if (checkAuth())
        return $app->Response('huespedes.php', valoresDefault($controladorHuespedes->obtenerHuespedes()), 201);
    else
        return $app->Response('login.php', array(), 201);
});

/**
 * Añadir huesped
 */
$app->post('/dashboard/huespedes/add', function () use ($app, $controladorHuespedes) {
    $rq = $app->getRequest();
    if (checkAuth()) {
            if($controladorHuespedes->crearHuesped($rq->post("correo_huesped"),
                $rq->post("clave_huesped"), $rq->post("nombre"), $rq->post("apellido"), $rq->post("telefono"),
                $rq->post("pais"), $rq->post("direccion"))) {
                header("Location: /dashboard/huespedes");
                return $app->Response('huespedes.php', valoresDefault($controladorHuespedes->obtenerHuespedes(), array("ok" => "Usuario añadido")), 201);
            } else {
                return $app->Response('huespedes.php"', valoresDefault($controladorHuespedes->obtenerHuespedes(), array("error" => "Usuario ya existe")), 201);
            }
    }
});


/**
 * Remover huesped
 */
$app->get('/dashboard/huespedes/remove/{id}', function ($id) use ($app, $controladorHuespedes) {
    if (checkAuth()) {
        if($controladorHuespedes->removerHuesped($id)) {
            header("Location: /dashboard/huespedes/");
            return $app->Response('huespedes.php', valoresDefault($controladorHuespedes->obtenerHuespedes(), array("removido" => "Huesped removido")), 201);
        } else {
            header("Location: /dashboard/huespedes/");
            return $app->Response('huespedes.php', valoresDefault($controladorHuespedes->obtenerHuespedes(), array("errorRemovido" => "Error al remover huesped")), 201);
        }
    }
});

/**
 * Servir pag Mapa
 */
$app->get('/dashboard/mapa', function () use ($app, $controladorLogin, $controladorPrincipal) {
    if (checkAuth())
        return $app->Response('mapa.php', valoresDefault(), 201);
    else
        return $app->Response('login.php', array(), 201);
});

/**
 * Servir Configuración
 */
$app->get('/dashboard/configuracion', function () use ($app) {
    if (checkAuth())
        return $app->Response('/configuracion/configuracion.php', valoresDefault(), 201);
    else
        return $app->Response('login.php', array(), 201);
});

/**
 * Config pisos
 */
$app->get('/dashboard/configuracion/pisos', function () use ($app) {
    if (checkAuth())
        return $app->Response('/configuracion/pisos.php', valoresDefault(), 201);
    else
        return $app->Response('login.php', array(), 201);
});

/**
 * Config habitaciones
 */
$app->get('/dashboard/configuracion/habitaciones', function () use ($app) {
    if (checkAuth())
        return $app->Response('/configuracion/habitaciones.php', valoresDefault(), 201);
    else
        return $app->Response('login.php', array(), 201);
});

/**
 * Config tipos
 */

$app->get('/dashboard/configuracion/tipos_habitacion', function () use ($app) {
    if (checkAuth())
        return $app->Response('/configuracion/tipos_habitacion.php', valoresDefault(), 201);
    else
        return $app->Response('login.php', array(), 201);
});

// Logout
$app->get('/logout', function () use ($app, $controladorLogin) {
    $controladorLogin->deslogear();
    header("Location: /dashboard");
});

$app->post("/authme_panel", function () use ($app, $controladorLogin) {
    if ($controladorLogin->validarUsuario($app->getRequest()->post("correo"), $app->getRequest()->post("clave"))) {
        header("Location: /dashboard");
        return null;
    }
    return $app->Response('login.php', array("error" => true), 201);
});

$app->post("/authme", function () use ($app, $controladorLogin) {
    $datos = json_decode($app->getRequest()->getBody(), true);
    $app->JsonResponse($controladorLogin->authMe($datos["correo"], $datos["clave"], $datos["fcm"]));
});

/**
 * API Habitación
 */
$app->post("/api/habitacion/{funcion}", function ($funcion) use ($app, $controladorHabitaciones) {
    $rq = $app->getRequest();
    /**
     * Para pisos
     */
    if ($funcion == "addPiso")
        $app->JsonResponse($controladorHabitaciones->añadirPiso(
            $rq->post("piso"),
            $rq->post("nombre")), 201);
    if ($funcion == "eliminarPiso")
        $app->JsonResponse($controladorHabitaciones->eliminarPiso($rq->post("id_piso")), 201);
    if ($funcion == "obtenerPisos")
        $app->JsonResponse($controladorHabitaciones->obtenerPisos(), 201);
    if ($funcion == "obtenerPiso")
        $app->JsonResponse($controladorHabitaciones->obtenerPiso($rq->post("id_piso")), 201);
    if ($funcion == "editarPiso")
        $app->JsonResponse($controladorHabitaciones->editarPiso(
            $rq->post("piso"),
            $rq->post("nombre"),
            $rq->post("nuevoPiso")), 201);
    /**
     * Para tipos de habitación
     */
    if ($funcion == "obtenerTipos")
        $app->JsonResponse($controladorHabitaciones->obtenerTipos(), 201);
    if ($funcion == "addTipo")
        $app->JsonResponse($controladorHabitaciones->añadirTipo(
            $rq->post("tipo"),
            $rq->post("mxn"),
            $rq->post("usd")), 201);
    if ($funcion == "obtenerTipo")
        $app->JsonResponse($controladorHabitaciones->obtenerTipo(
            $rq->post("id_tipo")), 201);
    if ($funcion == "editarTipo")
        $app->JsonResponse($controladorHabitaciones->editarTipo(
            $rq->post("id_tipo"),
            $rq->post("tipo"),
            $rq->post("mxn"),
            $rq->post("usd")), 201);
    if ($funcion == "eliminarTipo")
        $app->JsonResponse($controladorHabitaciones->eliminarTipo($rq->post("id_tipo")), 201);
    /**
     * Para habitaciones
     */
    if ($funcion == "obtenerHabitaciones")
        $app->JsonResponse($controladorHabitaciones->obtenerHabitaciones(), 201);
    if ($funcion == "addHabitacion")
        $app->JsonResponse($controladorHabitaciones->añadirHabitacion($rq->post("numeroHabitacion"), $rq->post("piso"), $rq->post("tipo"), $rq->post("iot_id")), 201);
    if ($funcion == "eliminarHabitacion")
        $app->JsonResponse($controladorHabitaciones->eliminarHabitacion($rq->post("id_habitacion")), 201);
    if ($funcion == "obtenerHabitacion")
        $app->JsonResponse($controladorHabitaciones->obtenerHabitacion($rq->post("id_habitacion")), 201);
    if ($funcion == "editarHabitacion")
        $app->JsonResponse($controladorHabitaciones->editarHabitacion($rq->post("habitacion"), $rq->post("nuevaHabitacion"), $rq->post("piso"), $rq->post("tipo"), $rq->post("iot_id")), 201);
});

/**
 * API Reservaciones
 */
$app->post("/api/reservacion/{funcion}", function ($funcion) use ($app, $controladorReservaciones) {
    $rq = $app->getRequest();
    if ($funcion == "crearReservacionExistente")
        $app->JsonResponse($controladorReservaciones->crearReservacion($rq->post("correoHuesped"), $rq->post("fechaDesde"),
        $rq->post("fechaHasta"), $rq->post("idHabitacion"), $rq->post("notas")), 201);
    if ($funcion == "obtenerHabitacionesReservadas")
        $app->JsonResponse($controladorReservaciones->obtenerHabitacionesReservas(), 201);
    if ($funcion == "checkout")
        $app->JsonResponse($controladorReservaciones->checkOutManual($rq->post("id_reserva")), 201);
});

/**
 * API Usuarios
 */
$app->post("/api/huespedes/{funcion}", function ($funcion) use ($app, $controladorHuespedes) {
    $rq = $app->getRequest();
    if ($funcion == "obtenerHuesped")
        $app->JsonResponse($controladorHuespedes->obtenerHuesped($rq->post("id_huesped")), 201);
    if ($funcion == "editarHuesped")
        $app->JsonResponse($controladorHuespedes->editarHuesped($rq->post("id_huesped"), $rq->post("nombre"), $rq->post("apellido"), $rq->post("correo"), $rq->post("direccion"), $rq->post("telefono")), 201);
});


/**
 * API Hotel
 */
$app->post("/api/hotel/{funcion}", function ($funcion) use ($app, $controladorPrincipal) {
    if ($funcion == "obtenerConfig")
        $app->JsonResponse($controladorPrincipal->obtenerConfig(), 201);
    if ($funcion == "actualizarConfig")
        $app->JsonResponse($controladorPrincipal->actualizarConfig($app->getRequest()->getBody()), 201);
});

// 404
$app->respond(function () use ($app) {
    return $app->ResponseHTML('<p> 404 </p>', 404);
});

$app->post("/api/iot/alarma/{id}", function($id) use ($app, $controladorHuespedes) {
    $app->JsonResponse($controladorHuespedes->enviarAlarmaPuerta($id));
});

$app->post("/api/iot/{habitacion}/{funcion}", function ($habitacion, $funcion) use ($app) {
    $iot = new IoThabitacion($habitacion);
    if ($funcion == "obtenerDatos")
        $app->JsonResponse($iot->getAllData());
    if ($funcion == "obtenerDato")
        $app->JsonResponse($iot->getData($app->getRequest()->post("feed")));
    if ($funcion == "modificarDato")
        $app->JsonResponse($iot->moveData($app->getRequest()->post("feed"), $app->getRequest()->post("data")));
});

$app->get("/test", function () use ($app) {
    echo stripslashes(hash("sha256", "comodorops3"));
});

function checkAuth()
{
    global $controladorLogin;
    return $controladorLogin->verificarAcceso();
}

function valoresDefault($extraArgs = array(), $extraArgs2 = array())
{
    global $controladorPrincipal, $controladorLogin;
    $datosUsuario = $controladorPrincipal->variablesUsuario($controladorLogin->obtenerUsuario());
    return array("datosUsuario" => $datosUsuario, "args" => $extraArgs, "extra" => $extraArgs2);
}

$app->listen();