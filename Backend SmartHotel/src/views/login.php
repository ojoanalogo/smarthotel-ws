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
        #bg {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
            min-width: 100%;
            min-height: 100%;
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
<img src="/public/img/fondo.jpg" id="bg" alt="">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading" align="center">
                    <img src="/public/img/logo.png" width="150" alt=""/> </div>
                <div class="panel-body">
                    <p class="lead">
                        MySmartHotel - Acceso
                    </p>
                    <?php if (isset($error)): ?>
                        <div class="text-danger">Correo/clave incorrectos</div>
                    <?php endif; ?>
                    <form role="form" method="post" action="/authme_panel">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Correo" name="correo" type="email" required autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Clave" name="clave" type="password" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-lg btn-default btn-block"><i class="fa fa-lock fa-fw"></i>Acceder</button>
                        </fieldset>
                    </form>
                    <p style="margin-top: 15px;" class="text-muted centrar">También puedes presionar la tecla <kbd>ENTER</kbd> para acceder</p>
                    <div style="color:#CCC; text-align:center; padding-top:10px;">ENEIT 2018</div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
<!-- Archivos JS  -->
<script src="/public/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="/public/js/bootstrap.min.js" type="text/javascript"></script>
</html>