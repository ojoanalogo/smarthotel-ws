<?php include "includes/header.php" ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-gears fa-fw"></i> Configuración - Tipos de habitación</h1>
        </div>
    </div>
    <ol class="breadcrumb">
        <li><a href="/dashboard">Inicio</a></li>
        <li><a href="/dashboard/configuracion">Configuración</a></li>
        <li class="active">Editar tipos de habitacion</li>
    </ol>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="header">
                <h4 class="title">Ayuda</h4>
                <p class="category">Soporte</p>
            </div>
            <div class="content">
                <div class="centrar"><i class="fa fa-bed fa-4x"></i></div>
                <hr>
                <p class="text-muted">Añade tipos de habitación para tener una mayor organización sobre las habitaciones del
                    hotel, puedes establecer precio en dolares y pesos mexicanos.</p>
                <div class="footer">
                    <div class="stats">
                        <a href="#" data-toggle="modal" data-target="#añadirTipo" class="btn btn-success btn-fill btn-md">
                            <i class="fa fa-plus-circle fa-fw"></i> Añadir tipo de habitación</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="header">
                <h4 class="title">Preguntas frecuentes</h4>
                <p class="category">Soporte</p>
            </div>
            <div class="content">
                <b class="text-info"><i class="fa fa-question-circle-o fa-fw"></i> ¿Qué es un tipo de habitación?</b>
                <div></div>
                <p class="text-muted">Es meramente una categoría de habitación, como lo puede ser una habitación de doble cama, doble cuarto, etc.
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading panel-success">Tipos de habitación</div>
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover" id="tabla-tipos">
                    <thead>
                    <tr>
                        <th width="50%">Tipo de habitación</th>
                        <th width="10%">Costo $MXN</th>
                        <th width="10%">Costo $USD</th>
                        <th width="25%">Administrar</th>
                    </tr>
                    </thead>
                    <tbody id="tabla-ajx">
                    </tbody>
                </table>
                <div class="ajxLoader centrar" style="margin-top: 60px;">
                    <i class="fa fa-circle-o-notch fa-spin fa-5x fa-fw text-muted"></i>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <h4 class="centrar" id="msgEmpty"></h4>
        </div>
    </div>
</div>
<?php include "includes/footer.php" ?>
<!-- Modales -->
<!-- Modal añadir tipo de habitación -->
<div class="modal fade" id="añadirTipo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2>Añadir tipo de habitación <small>configuración</small></h2>
            </div>
            <div class="modal-body">
                <form id="guardarTipoHabitacion">
                    <div class="form-group form-group-lg">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="añadirTipoNombre">Tipo de habitación</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-bed text-muted"></i></div>
                                <input name="añadirTipoNombre" id="añadirTipoNombre" class="form-control" placeholder="Cama sencilla">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="añadirTipoCostoMX">Costo pesos mexicanos</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-money text-success"></i></div>
                                    <input type="number" class="form-control" name="añadirTipoCostoMX" id="añadirTipoCostoMX"
                                           placeholder="200" min="0.00" max="99999.00">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="añadirTipoCostoUSD">Costo dólares</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-money text-success"></i></div>
                                    <input type="number" class="form-control" name="añadirTipoCostoUSD" id="añadirTipoCostoUSD"
                                           placeholder="200" min="0.00" max="99999.00">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="msgError"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-md" data-dismiss="modal"><i class="fa fa-times fa-fw"></i>Cerrar</button>
                        <button type="submit" name="guardar" class="btn btn-primary btn-md"><i class="fa fa-save fa-fw"></i>Guardar</button>
            </div>
                </form>
            </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>
<!-- /.modal -->
<!-- Modal editar tipo de habitación -->
<div class="modal fade" id="editarTipo" tabindex="-2" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2>Editar tipo de habitación <small>configuración</small></h2>
            </div>
            <div class="modal-body">
                <form id="editarTipo">
                    <div class="form-group form-group-lg">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="editarTipoNombre">Tipo de habitación</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-bed text-muted"></i></div>
                                <input name="editarTipoNombre" id="editarTipoNombre" class="form-control" placeholder="Cama sencilla">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="editarTipoCostoMX">Costo pesos mexicanos</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-money text-success"></i></div>
                                    <input type="number" class="form-control" name="editarTipoCostoMX" id="editarTipoCostoMX"
                                           placeholder="200" min="0.00" max="99999.00">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="editarTipoCostoUSD">Costo dólares</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-money text-success"></i></div>
                                    <input type="number" class="form-control" name="editarTipoCostoUSD" id="editarTipoCostoUSD"
                                           placeholder="200" min="0.00" max="99999.00">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="msgError"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-md" data-dismiss="modal"><i class="fa fa-times fa-fw"></i>Cerrar</button>
                        <button type="submit" name="guardar" class="btn btn-primary btn-md"><i class="fa fa-save fa-fw"></i>Guardar cambios</button>
            </div>
                </form>
            </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
<!-- /.modal -->
    <script>
        /**
         * Código inicialización de tipos de habitación
         */
        $(document).ready(function() {
            obtenerTiposDeHabitacion();
            handlerEliminarTipo();
            handlerEditarTipo();
        });
        /**
         * Obtener tipos de habitación e introducirlos en tabla
         */
        function obtenerTiposDeHabitacion() {
            $.ajax({
                type: 'POST',
                url: '/api/habitacion/obtenerTipos',
                data: "",
                success: function(data) {
                    $('.ajxLoader').hide();
                    var $datos = JSON.parse(data);
                    console.log($datos);
                    if ($datos.code === 1) {
                        var $itera = $datos["data"];
                        if ($itera.length === 0) {
                            $('#msgEmpty').html('No hay tipos de habitación añadidos, <a href="#" data-toggle="modal" data-target="#añadirTipo">¿qué tal si añades uno?</a>');
                        }
                        // Template:
                        function template($id, $tipo, $mx, $usd) {
                            return '<tr>' + '<td align="center">' + $tipo + '</td>' + '<td>$' + $mx + '</td>' + '<td>$' + $usd + '</td>' + '<td align="center" valign="middle">' + '<a href="#" data-idTipo="' + $id + '" class="btn btn-md btn-info btn-fill editarTipo" style="color:#FFF;">' + '<i class="fa fa-edit fa-fw"></i> Editar' + '</a>&nbsp;' + '<a href="#" data-idTipo="' + $id + '" class="btn btn-danger btn-md btn-fill eliminarTipo">' + '<i class="fa fa-trash fa-fw"></i> Eliminar' + '</a>' + '</td>' + '</tr>';
                        }
                        $('#tabla-ajx').html('');
                        $.each($itera, function(i, item) {
                            $('#tabla-ajx').append(template(item["id_tipo_habitacion"], item["tipo_habitacion"], item["costo_mx"], item["costo_usd"]));
                        });
                        handlerEliminarTipo();
                        handlerEditarTipo();
                    } else {
                        swal("Error", "Error en la base de datos", "error");
                    }
                },
                error: function(xhr, type, exception) {
                    swal("Error", "Ha ocurrido un error.\nInformación: " + type, "error");
                }
            });
        }
        /**
         * Handler editar tipo de habitación
         */
        function handlerEditarTipo() {
            $('.editarTipo').unbind();
            $('.editarTipo').click(function() {
                var $id = $(this).attr('data-idTipo');
                $.ajax({
                    type: 'POST',
                    url: '/api/habitacion/obtenerTipo',
                    data: "id_tipo=" + $id,
                    success: function(data) {
                        var $datos = JSON.parse(data);
                        if ($datos.code === 1) {
                            $('#editarTipo').modal('toggle');
                            $('#editarTipoNombre').val($datos["data"][0]["tipo_habitacion"]);
                            $('#editarTipoCostoMX').val($datos["data"][0]["costo_mx"]);
                            $('#editarTipoCostoUSD').val($datos["data"][0]["costo_usd"]);
                            $('form#editarTipo').attr("id-tipo", $datos["data"][0]["id_tipo_habitacion"]);
                        } else {
                            swal("No se pudo obtener información", "Ha ocurrido un error.", "error");
                        }
                    },
                    error: function(xhr, type, exception) {
                        swal("Error", "Ha ocurrido un error.\nInformación: " + type, "error");
                    }
                });
            });
        }

        $('form#editarTipo').on('submit', function(e) {
            editarTipo();
            e.preventDefault();
        });

        function editarTipo() {
            var $tipo = $('#editarTipoNombre').val();
            var $mxn = $('#editarTipoCostoMX').val();
            var $usd = $('#editarTipoCostoUSD').val();
            var $id = $('form#editarTipo').attr("id-tipo");
            if (!validarFormularioTipo($tipo, $mxn, $usd)) {
                return true;
            }
            $.ajax({
                type: 'POST',
                url: '/api/habitacion/editarTipo',
                data: "id_tipo=" + $id + "&tipo=" + $tipo + "&mxn=" + $mxn + "&usd=" + $usd,
                success: function(data) {
                    var $data = JSON.parse(data);
                    console.log($data);
                    if ($data.code === 1) {
                        $('#editarTipo').modal('toggle');
                        $('.msgError').html('');
                        $('#editarTipoNombre').val('');
                        $('#editarTipoCostoMX').val('');
                        $('#editarTipoCostoUSD').val('');
                        obtenerTiposDeHabitacion();
                        swal("Tipo de habitación editada", "Se ha editado este tipo de habitación", "success");
                    } else {
                        $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Este tipo de habitación ya existe</div>');
                    }
                },
                error: function(xhr, type, exception) {
                    $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Error en el servidor, no se pudo añadir el tipo de habitación</div>');
                }
            });
        }

        /**
         * Handler eliminar tipo de habitación
         */
        function handlerEliminarTipo() {
            $('.eliminarTipo').unbind();
            $('.eliminarTipo').click(function() {
                var $id = $(this).attr('data-idTipo');
                swal({
                    title: "¿Estás seguro que quieres eliminar este tipo de habitación?",
                    text: "Esta acción no se puede revertir",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Si, borrala!",
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function() {
                    $.ajax({
                        type: 'POST',
                        url: '/api/habitacion/eliminarTipo',
                        data: "id_tipo=" + $id,
                        success: function(data) {
                            var $datos = JSON.parse(data);
                            if ($datos.code === 1) {
                                swal("Tipo de habitación eliminada", "Se ha eliminado este tipo de habitación", "success");
                                obtenerTiposDeHabitacion();
                            } else {
                                swal("No se pudo eliminar", "Ha ocurrido un error.", "error");
                            }
                        },
                        error: function(xhr, type, exception) {
                            swal("Error", "Ha ocurrido un error.\nInformación: " + type, "error");
                        }
                    });
                });
            });
        }
        /**
         * Guardar tipo de habitación en la base de datos
         */
        $('form#guardarTipoHabitacion').on('submit', function(e) {
            guardarTipo();
            e.preventDefault();
        });
        function isNumber(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }
        function validarFormularioTipo($tipo, $mxn, $usd) {
            if (!isNumber($mxn) || !isNumber($usd)) {
                $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'No es un numero de precio correcto</div>');
                return false;
            }
            if ($mxn > 99999 || $mxn < 0 || $usd > 99999 || $usd < 0) {
                $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Debes introducir un costo valido</div>');
                return false;
            }
            if ($tipo === "" || $tipo === null) {
                $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Introduce un tipo de habitación</div>');
                return false;
            }
            if ($mxn === "" || $mxn === null || $usd === "" || $usd === null) {
                $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Introduce un precio en dólares y pesos</div>');
                return false;
            }
            return true;
        }

        function guardarTipo() {
            var $tipo = $('#añadirTipoNombre').val();
            var $mxn = $('#añadirTipoCostoMX').val();
            var $usd = $('#añadirTipoCostoUSD').val();
            if (!validarFormularioTipo($tipo, $mxn, $usd)) {
                return true;
            }
            $.ajax({
                type: 'POST',
                url: '/api/habitacion/addTipo',
                data: "tipo=" + $tipo + "&mxn=" + $mxn + "&usd=" + $usd,
                success: function(data) {
                    var $data = JSON.parse(data);
                    console.log($data);
                    if ($data.code === 1) {
                        $('#añadirTipo').modal('toggle');
                        $('.msgError').html('');
                        $('#msgEmpty').html('');
                        $('#añadirTipoNombre').val('');
                        $('#añadirTipoCostoMX').val('');
                        $('#añadirTipoCostoUSD').val('');
                        obtenerTiposDeHabitacion();
                        swal("Tipo de habitación añadida", "Se ha añadido esta habitación", "success");
                    } else {
                        $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Esta habitación existe</div>');
                    }
                },
                error: function(xhr, type, exception) {
                    $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Error en el servidor, no se pudo añadir el tipo de habitación</div>');
                }
            });
        }
    </script>