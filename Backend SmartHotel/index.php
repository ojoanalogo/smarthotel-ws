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
 * Controladores
 */
require __DIR__ . "/src/controllers/ControladorPrincipal.php";

/**
 * Rutas de la aplicación
 */
// Index
$app->get('/',function() use ( $app ) {
    $master = new ControladorPrincipal();
    $logeado = $master->verificarAcceso();
    if ($logeado)
        return $app->Response('dashboard.php', array(),201);
    else
        return $app->getRequest();
});

// Logout
$app->get('/logout',function() use ( $app ) {
    $master = new ControladorPrincipal();
    $master->deslogear();
    return $app->Response('login.php', array(), 201);
});

// 404
$app->respond( function() use ( $app ){
    return $app->ResponseHTML('<p> 404 </p>', 404);
});

$app->listen();