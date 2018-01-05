<?php
header('Content-Type: text/html; charset=utf-8');
function obtenerSeccionNavbar($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI']);
    if ($current_file_name == $requestUri) {
        echo 'class="seleccionado"';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/public/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Titulo -->
    <title>MySmartHotel</title>
    <!-- Tags responsives -->
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap -->
    <link href="/public/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Libreria animaciones  -->
    <link href="/public/css/animate.min.css" rel="stylesheet"/>
    <!-- CSS Dashboard -->
    <link href="/public/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <!-- Fuentes e iconos -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="/public/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/public/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="/public/css/estilos.css" rel="stylesheet" />
</head>
<body>
<!-- Wrapper -->
<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar" data-color="teal" data-image="assets/img/sidebar.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    MySmartHotel
                </a>
            </div>
            <ul class="nav">
                <li <?php obtenerSeccionNavbar("/dashboard") ?>>
                    <a href="/index">
                        <i class="fa fa-dashboard"></i>
                        <p>Panel</p>
                    </a>
                </li>
                <li <?php obtenerSeccionNavbar("/habitaciones") ?>>
                    <a href="/habitaciones">
                        <i class="fa fa-bed"></i>
                        <p>Habitaciones</p>
                    </a>
                </li>
                <li <?php obtenerSeccionNavbar("huespedes.php") ?>>
                    <a href="huespedes.html">
                        <i class="fa fa-users"></i>
                        <p>Huespedes</p>
                    </a>
                </li>
                <li <?php obtenerSeccionNavbar("mapa.php") ?>>
                    <a href="mapa.html">
                        <i class="fa fa-map"></i>
                        <p>Mapa</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Navegación móvil -->
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Activar navegación</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Panel de Control</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="">
                                ADMIN
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Contenido -->
        <div class="content">
            <div class="container-fluid">