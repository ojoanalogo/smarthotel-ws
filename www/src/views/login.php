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
    <!-- Magia negra favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/public/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/public/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/public/favicon/favicon-16x16.png">
    <link rel="manifest" href="/public/favicon/manifest.json">
    <link rel="mask-icon" href="/public/favicon/safari-pinned-tab.svg" color="#009688">
    <link rel="shortcut icon" href="/public/favicon/favicon.ico">
    <meta name="msapplication-config" content="/public/favicon/browserconfig.xml">
    <meta name="theme-color" content="#009688">
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
        .input-group {
            padding-bottom: 15px;
        }
        .input-group .input-group-addon {
            color: #000;
            background-color: #EAEAEA;
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
                        MySmartHotel <small style="color: #444444 !important;">Acceso</small>
                    </p>
                    <?php if (isset($error)): ?>
                        <div class="text-danger">Correo/clave incorrectos</div>
                    <?php endif; ?>
                    <form role="form" method="post" action="/authme_panel">
                        <fieldset>
                            <div class="input-group">
                                <span class="input-group-addon" id="correo"><i class="fa fa-at fa-fw"></i></span>
                                <input class="form-control" placeholder="Correo" name="correo" type="email" aria-describedby="correo" required autofocus>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="clave"><i class="fa fa-lock fa-fw"></i></span>
                                <input class="form-control" placeholder="Clave" name="clave" type="password" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-lg btn-default btn-block"><i class="fa fa-sign-in fa-fw"></i>Acceder</button>
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