<?php
ini_set('default_charset', 'utf-8');
header("Content-Type: text/html; charset=utf-8");
require("/../../src/libs/database_manager/pdo_database.class.php");
require("/../../src/config/config.php");
$db = new wArLeY_DBMS(DB_TYPE, DB_HOST, DB_DB, DB_USR, DB_PWD, DB_PORT);
if ($db->Cnxn() == false) {
    die(HNDLR_CNXNDB);
}
$userInvalido = null;
$loggedId = null;
?>
<?php
if (isset($_POST['correo']) && isset($_POST['clave'])) {
    $correo = strtolower(trim($_POST['correo']));
    $clavePost = stripslashes($_POST['clave']);
    $clave = hash('sha256', $clavePost);
    $arrayArgs = array($correo, $clave);
    $loginQuery = "SELECT id_usuario FROM sh_usuarios WHERE correo=? AND clave=?";
    $resultCheck = $db->query($loginQuery, $arrayArgs);
    if($resultCheck===false) {
        $loggedId = "error";
    } else {
        foreach ($resultCheck as $row) {
            if ($row["id_usuario"] > 0) {
                $loggedId = "correcto";
            } else {
                $loggedId = "incorrecto";
            }
        }

    }
    if ($loggedId == "correcto") {
        $userInvalido = false;
        crearValidacion($_POST['correo']);
        header("Location: /");
        die();
    } else {
        $userInvalido = true;
    }
}
function crearValidacion($usuario){
    $_SESSION["login_usuario"] = $usuario;
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
    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #eee;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin .checkbox {
            font-weight: 400;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body>

<div class="container">

    <form class="form-signin" method="get">
        <h2 class="form-signin-heading">Please sign in</h2>


        <label for="usuario" class="sr-only">Correo</label>
        <input type="email" name='correo' id="correo" class="form-control" placeholder="Correo" required autofocus>

        <label for="clave" class="sr-only">Clave de usuario</label>
        <input type="password" name="clave" id="clave" class="form-control" placeholder="Clave" required>
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" checked="">
                <span class="form-check-sign"></span>
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Acceder</button>
    </form>

</div> <!-- /container -->
</body>
<!-- Archivos JS  -->
<script src="/public/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="/public/js/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin notificaciones    -->
<script src="/public/js/bootstrap-notify.js"></script>
<?php

if ($userInvalido) {
    echo '<script> $.notify({
	message: "Correo/Clave incorrectos" 
},{
	type: "danger"
}); </script>';
}
if ($loggedId === "error") {
    echo '<script> $.notify({
	message: "Error en el sistema" 
},{
	type: "danger"
}); </script>';
}
?>
</html>

