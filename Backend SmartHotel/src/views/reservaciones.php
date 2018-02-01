<?php include "includes/header.php" ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-bookmark fa-fw"></i> Check-In</h1>
    </div>
</div>
<ol class="breadcrumb">
    <li><a href="/dashboard">Inicio</a></li>
    <li class="active">Reservaciones</li>
</ol>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="header">
                <h4 class="title">Ayuda</h4>
                <p class="category">Soporte</p>
            </div>
            <div class="content">
                <div class="centrar"><i class="fa fa-bookmark-o fa-4x"></i></div>
                <hr>
                <p class="text-muted">Cuando quieras asignar o registrar a un huesped a una habitación hazlo desde esta ubicación</p>
            </div>
            <hr>
            <div class="header">
                <h4 class="title">Preguntas frecuentes</h4>
                <p class="category">Soporte</p>
            </div>
            <div class="content">
                <b class="text-info"><i class="fa fa-question-circle-o fa-fw"></i> ¿Como registro un huesped?</b>
                <div></div>
                <p class="text-muted">
                    Selecciona la opción "Nuevo registro" e introduce los datos del huesped para añadirlo a la base de datos y asignarle una habitación que podrá controlar desde la aplicación.
                    Si el huesped ya ha sido hospedado antes, solo selecciona la opción "Llegada huesped registrado" y rellena los datos que se te solicitan
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading panel-success">Reservaciones</div>
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="header">
                            <h4 class="title">Mandar aviso rápido</h4>
                            <p class="category">Aviso</p>
                        </div>
                        <div class="content">
                            <div class="form-group">
                                <label for="mensajeGSM">Escribir Mensaje</label>
                                <textarea style="resize: none;" class="form-control" id="mensajeGSM" rows="3" draggable="false"></textarea>
                            </div>
                            <a href="#" class="btn btn-fill btn-warning" id="enviarMensajeGSM"> <i class="fa fa-paper-plane fa-lg"></i>&nbsp; Mandar aviso</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php" ?>
