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
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Ayuda</h4>
                    <p class="category">Soporte</p>
                </div>
                <div class="content">
                    <div class="centrar"><i class="fa fa-gears fa-4x"></i></div>
                    <hr>
                    <p class="text-muted">
                        Si algo no funciona de la manera correcta, tienes la opción de contactar con el soporte técnico del
                        software para ayudarte a resolver tus problemas.
                    </p>
                    <div class="footer">
                        <hr>
                        <div class="stats">
                            <a href="#" data-toggle="modal" data-target="#contactarSoporte" class="btn btn-success btn-fill btn-lg">
                                <i class="fa fa-envelope-o fa-fw"></i> Contactar soporte</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Habitaciones</h3>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="/dashboard/configuracion/pisos" class="h3"><i class="fa fa-building fa-fw"></i> Configurar pisos </a>
                    </li>
                    <li class="list-group-item">
                        <a href="/dashboard/configuracion/habitaciones" class="h3"><i class="fa fa-bed fa-fw"></i> Configurar habitaciones </a>
                    </li>
                </ul>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Avisos</h3>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="/dashboard/configuracion/avisos" class="h3"><i class="fa fa-bullhorn fa-fw"></i> Configurar avisos </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Ajustes</div>
            <div class="card">
                <div class="header">
                    <h4 class="title">Editar ajustes generales</h4>
                </div>
                <div class="content">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre del hotel</label>
                                    <input type="text" class="form-control" placeholder="Hotel Todos Felices" value="<?php echo $datosConfig["nombre_hotel"] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo de contacto</label>
                                    <input type="email" class="form-control" placeholder="Email" value="<?php echo $datosConfig["correo"] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ciudad</label>
                                    <input type="text" class="form-control" placeholder="Ciudad del hotel" value="<?php echo $datosConfig["ciudad"] ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>País</label>
                                    <input type="text" class="form-control" placeholder="País del hotel" value="<?php echo $datosConfig["pais"] ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Código Postal</label>
                                    <input type="number" class="form-control" placeholder="C.P" value="<?php echo $datosConfig["codigo_postal"] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input type="text" class="form-control" placeholder="Calle, numero, etc" value="<?php echo $datosConfig["direccion"] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Información extra</label>
                                    <textarea style="resize: none;" rows="5" class="form-control" placeholder="Descripción del hotel""><?php echo $datosConfig["info"]?></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-info btn-fill pull-right">Actualizar configuración</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
<?php include "includes/footer.php" ?>