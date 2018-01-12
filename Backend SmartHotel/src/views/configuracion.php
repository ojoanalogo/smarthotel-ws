<?php include "includes/header.php" ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-gears fa-fw"></i> Configuración</h1>
        </div>
    </div>
    <ol class="breadcrumb">
        <li><a href="/dashboard">Inicio</a></li>
        <li class="active">Configuración</li>
    </ol>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">Editar ajustes</h4>
                </div>
                <div class="content">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre del hotel</label>
                                    <input type="text" class="form-control" placeholder="Hotel Todos Felices">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo de contacto</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ciudad</label>
                                    <input type="text" class="form-control" placeholder="Ciudad del hotel">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>País</label>
                                    <input type="text" class="form-control" placeholder="País del hotel">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Código Postal</label>
                                    <input type="number" class="form-control" placeholder="C.P">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input type="text" class="form-control" placeholder="Calle, numero, etc">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Información extra</label>
                                    <textarea rows="5" class="form-control" placeholder="Descripción del hotel""></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-info btn-fill pull-right">Actualizar configuración</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Habitaciones</h3>
                </div>
                <ul class="list-group centrar">
                    <li class="list-group-item">
                        <a href="/dashboard/configuracion/pisos" class="h2"><i class="fa fa-building fa-fw"></i> Configurar pisos </a>
                    </li>
                    <li class="list-group-item">
                        <a href="/dashboard/configuracion/cuartos" class="h2"><i class="fa fa-bed fa-fw"></i> Configurar habitaciones </a>
                    </li>
                </ul>
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Avisos</h3>
                </div>
                <ul class="list-group centrar">
                    <li class="list-group-item">
                        <a href="/dashboard/configuracion/avisos" class="h2"><i class="fa fa-bullhorn fa-fw"></i> Configurar avisos </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

<?php include "includes/footer.php" ?>