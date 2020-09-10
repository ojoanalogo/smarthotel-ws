<?php include "includes/header.php" ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-paint-brush fa-fw"></i> Solicitudes de limpieza</h1>
    </div>
</div>
<ol class="breadcrumb">
    <li><a href="/dashboard">Inicio</a></li>
    <li class="active">Solicitudes de limpieza</li>
</ol>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="header">
                <h4 class="title">Mostrando ultimas solicitudes (<b class="contadorSolicitudes text-danger">-</b>)</h4>
                <h5 class="title text-primary">Fecha &nbsp;<?php echo date("Y-m-d")?></h5>
                <p class="category">Servicio habitación</p>
            </div>
            <div class="content">
                <div class="row">
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="tabla-huespedes">
                            <thead>
                            <tr>
                                <th width="10%">Habitación</th>
                                <th width="20%">Huesped</th>
                                <th width="15%">Fecha</th>
                                <th width="15%">Num telefono</th>
                                <th width="25%">Notas</th>
                                <th width="15%">Administrar</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php" ?>

