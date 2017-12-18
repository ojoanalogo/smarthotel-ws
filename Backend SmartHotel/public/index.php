<?php
require __DIR__ . '/../vendor/autoload.php';

// Inicializar la app
$config = require __DIR__ . '/../src/config.php';
$app = new \Slim\App($config);

$container = $app->getContainer();

// Registrar dependencias
require __DIR__ . '/../src/dependencies.php';

// Registrar middleware
require __DIR__ . '/../src/middleware.php';

// Registrar rutas
require __DIR__ . '/../src/routes.php';
$app->run();