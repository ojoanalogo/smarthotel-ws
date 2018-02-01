<?php
header("Content-Type: text/html;charset=utf-8");
function obtenerSeccionNavbar($requestUri) {
    $current_file_name = basename($_SERVER['REQUEST_URI']);
    if ($current_file_name == $requestUri) {
        echo 'class="active"';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
    <link href="/public/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <!-- Fuentes e iconos -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <!-- Estilos de fuentes -->
    <link href="/public/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/public/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <!-- Estilos otros -->
    <link href="/public/css/estilos.css" rel="stylesheet" />
    <!-- Date picker css -->
    <link href="/public/css/datepicker.min.css" rel="stylesheet" />
    <!-- Date tables css -->
    <link href="/public/css/datatables.min.css" rel="stylesheet" />
    <!-- Sweet Alert css -->
    <link href="/public/css/sweetalert.css" rel="stylesheet" />
    <!-- Magia negra favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/public/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/public/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/public/favicon/favicon-16x16.png">
    <link rel="manifest" href="/public/favicon/manifest.json">
    <link rel="mask-icon" href="/public/favicon/safari-pinned-tab.svg" color="#009688">
    <link rel="shortcut icon" href="/public/favicon/favicon.ico">
    <meta name="msapplication-config" content="/public/favicon/browserconfig.xml">
    <meta name="theme-color" content="#009688">

</head>
<body>
<!-- Wrapper -->
<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar" data-color="teal" data-image="/public/img/sidebar.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    MySmartHotel
                </a>
            </div>
            <ul class="nav">
                <li <?php obtenerSeccionNavbar("dashboard") ?>>
                    <a href="/dashboard">
                        <i class="fa fa-dashboard"></i>
                        <p>Panel</p>
                    </a>
                </li>
                <li <?php obtenerSeccionNavbar("habitaciones") ?>>
                    <a href="/dashboard/habitaciones">
                        <i class="fa fa-bed"></i>
                        <p>Habitaciones</p>
                    </a>
                </li>
                <li <?php obtenerSeccionNavbar("huespedes") ?>>
                    <a href="/dashboard/huespedes">
                        <i class="fa fa-users"></i>
                        <p>Huespedes</p>
                    </a>
                </li>
                <li <?php obtenerSeccionNavbar("mensajes") ?>>
                    <a href="/dashboard/mensajes">
                        <i class="fa fa-inbox"></i>
                        <p>Mensajes</p>
                    </a>
                </li>
                <li <?php obtenerSeccionNavbar("limpieza") ?>>
                    <a href="/dashboard/limpieza">
                        <i class="fa fa-paint-brush"></i>
                        <p>Solicitudes limpieza</p>
                    </a>
                </li>
                <li <?php obtenerSeccionNavbar("mapa") ?>>
                    <a href="/dashboard/mapa">
                        <i class="fa fa-map"></i>
                        <p>Mapa</p>
                    </a>
                </li>
                <li <?php obtenerSeccionNavbar("configuracion") ?>>
                    <a href="/dashboard/configuracion">
                        <i class="fa fa-gear"></i>
                        <p>Configuración</p>
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
                    <a class="navbar-brand" href="#">Panel de Control&nbsp; <i class="fa fa-dashboard"></i></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p>
                                    <?php echo $datosUsuario["correo"] . " [" . $datosUsuario["rol"] . "]"; ?>
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu" style="font-size: 16px;">
                                <li><a href="#"><i class="fa fa-user fa-fw"></i> Ajustes cuenta</a></li>
                                <li><a href="/dashboard/configuracion"><i class="fa fa-gears fa-fw"></i> Configuración panel</a></li>
                                <li class="divider"></li>
                                <li><a style="color: #c9302c" href="/logout"><i class="fa fa-sign-out fa-fw"></i> Deslogear</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Contenido -->
        <div class="content">
            <div class="container-fluid">