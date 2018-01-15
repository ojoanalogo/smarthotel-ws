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
                            <a href="mailto:arc980103@gmail.com" class="btn btn-success btn-fill btn-lg">
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
                    <form id="actualizarConfiguracion">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre del hotel</label>
                                    <input type="text" class="form-control" name="nombre_hotel" id="cfg_nombre_hotel" maxlength="32" placeholder="Hotel Todos Felices">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo de contacto</label>
                                    <input type="email" class="form-control" name="correo" id="cfg_correo" maxlength="256" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ciudad</label>
                                    <input type="text" class="form-control" name="ciudad" id="cfg_ciudad" maxlength="32" placeholder="Ciudad del hotel">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>País</label>
                                    <input type="text" class="form-control" name="pais" id="cfg_pais" maxlength="32" placeholder="País del hotel">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Código Postal</label>
                                    <input type="number" class="form-control" name="codigo_postal" min="0" max="99999" id="cfg_codigo_postal" placeholder="C.P">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input type="text" class="form-control" name="direccion" id="cfg_direccion" maxlength="256" placeholder="Calle, numero, etc">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Información extra</label>
                                    <textarea style="resize: none; overflow:hidden;" rows="5" class="form-control" name="info" id="cfg_info" maxlength="512" placeholder="Descripción del hotel"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar configuración</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
<?php include "includes/footer.php" ?>
<script>
    /**
     * Código inicialización de configuración
     */
    $(document).ready(function() {
        obtenerConfig();
    });
    $('form#actualizarConfiguracion').on('submit', function(e) {
        actualizarConfig();
        e.preventDefault();
    });
    function actualizarConfig() {
        swal({
            title: "¿Guardar cambios?",
            text: "",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: "btn-success",
            confirmButtonText: "Guardar",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }, function() {
            console.log($('form#actualizarConfiguracion').serialize());
            $.ajax({
                type: 'POST',
                url: '/api/hotel/actualizarConfig',
                data: $('form#actualizarConfiguracion').serialize(),
                success: function(data) {
                    var $datos = JSON.parse(data);
                    console.log($datos);
                    if ($datos.code === 1) {
                        swal("Configuración aplicada", "Se han guardado los nuevos datos", "success");
                        obtenerConfig();
                    } else {
                        swal("Error", "No se pudo guardar la configuración en la base de datos", "error");
                    }
                },
                error: function(xhr, type, exception) {
                    swal("No se pudo eliminar", "Ha ocurrido un error.", "danger");
                }
            });
        });
    }
    function obtenerConfig() {
        $.ajax({
            type: 'POST',
            url: '/api/hotel/obtenerConfig',
            data: "",
            success: function(data) {
                var $datos = JSON.parse(data);
                if ($datos.code === 1) {
                    var $cfg = $datos["data"];
                    $.each($cfg[0], function(i, item) {
                        $('#cfg_' + i).val(item);
                    });
                } else {
                    swal("Error", "No se pudo obtener la configuración de la base de datos", "error");
                }
            },
            error: function(xhr, type, exception) {
                swal("No se pudo eliminar", "Ha ocurrido un error.", "danger");
            }
        });
    }
</script>
