<?php include __DIR__ . "/../includes/header.php" ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-gears fa-fw"></i> Configuración - Habitaciones</h1>
    </div>
</div>
<ol class="breadcrumb">
    <li><a href="/dashboard">Inicio</a></li>
    <li><a href="/dashboard/configuracion">Configuración</a></li>
    <li class="active">Editar habitaciones</li>
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
                <p class="text-muted">Añade habitaciones al panel web y al sistema de comunicación. Es necesario configurar cada habitación
                con sus datos correctos para habilitar la sincronización y el correcto funcionamiento de la aplicación movil, así como tener un
                registro de los huespedes en donde se están alojando</p>
                <div class="footer">
                    <div class="stats">
                        <div class="btn-group" role="group">
                        <a href="#" data-toggle="modal" data-target="#añadirHabitacion" class="btn btn-success btn-fill btn-md">
                            <i class="fa fa-plus-circle fa-fw"></i> Añadir habitacion</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="header">
                <h4 class="title">Preguntas frecuentes</h4>
                <p class="category">Soporte</p>
            </div>
            <div class="content">
                <b class="text-info"><i class="fa fa-question-circle-o fa-fw"></i> ¿Qué es el sistema IoT?</b>
                <div></div>
                <p class="text-muted">El sistema IoT permite a los usuarios interactuar con su habitación de manera remota,
                    así como proveer a distintos aparatos dentro de la habitación de funciones extra.
                    Para habilitar este sistema, es necesario configurar cada cuarto con su respectivo identificado de sistema.
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading panel-success">Habitaciones</div>
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover" id="tabla-habitaciones">
                    <thead>
                    <tr>
                        <th width="3%">Habitación</th>
                        <th width="37%">Tipo de habitación</th>
                        <th width="15%">IoT</th>
                        <th width="10%">Estatus</th>
                        <th width="20%">Administrar</th>
                    </tr>
                    </thead>
                    <tbody id="tabla-ajx"></tbody>
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
<?php include __DIR__ . "/../includes/footer.php" ?>
<!-- Modales -->
<!-- Modal añadir habitacion -->
<div class="modal fade" id="añadirHabitacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2>Añadir habitacion <small>configuración</small></h2>
            </div>
            <div class="modal-body">
                <form id="guardarHabitacion">
                    <div class="form-group form-group-lg">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="añadirHabitacionNumero">Numero de habitación</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-edit text-muted"></i></div>
                                    <input min="1" max="9999" type="number" name="añadirHabitacionNumero" id="añadirHabitacionNumero" class="form-control" placeholder="101">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="añadirHabitacionPiso">Piso de la habitación</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-building text-muted"></i></div>
                                <select name="añadirHabitacionPiso" id="añadirHabitacionPiso" class="form-control pisos"></select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="añadirHabitacionTipo">Tipo de habitación</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-bed text-muted"></i></div>
                                    <select name="añadirHabitacionTipo" id="añadirHabitacionTipo" class="form-control categorias"></select>
                                </div>
                            </div>
                            <!-- coso IoT -->
                            <div class="col-md-12">
                                <hr>
                                <p class="h3">Detalles IoT</p>
                                <p class="text-muted">(Dejar en blanco para no habilitar)</p>
                                <hr>
                                <label for="añadirHabitacionIoT_ID">ID de Dispositivo</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-plug text-success"></i></div>
                                    <input type="text" class="form-control" name="añadirHabitacionIoT_ID" id="añadirHabitacionIoT_ID" placeholder="ID" maxlength="256">
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
<!-- Modal editar habitacion -->
<div class="modal fade" id="editarHabitacion" tabindex="-2" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2>Editar habitacion <small>configuración</small></h2>
            </div>
            <div class="modal-body">
                <form id="editarHabitacion">
                    <div class="form-group form-group-lg">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="editarHabitacionNumero">Numero de habitación</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-edit text-muted"></i></div>
                                    <input min="1" max="9999" type="number" name="editarHabitacionNumero" id="editarHabitacionNumero" class="form-control" placeholder="101">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="editarHabitacionPiso">Piso de la habitación</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-building text-muted"></i></div>
                                    <select name="editarHabitacionPiso" id="editarHabitacionPiso" class="form-control pisos"></select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="editarHabitacionTipo">Tipo de habitación</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-bed text-muted"></i></div>
                                    <select name="editarHabitacionTipo" id="editarHabitacionTipo" class="form-control categorias"></select>
                                </div>
                            </div>
                            <!-- coso IoT -->
                            <div class="col-md-12">
                                <hr>
                                <p class="h3">Detalles IoT</p>
                                <p class="text-muted">(Dejar en blanco para no habilitar)</p>
                                <hr>
                                <label for="editarHabitacionIoT_ID">ID de Dispositivo</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-plug text-success"></i></div>
                                    <input type="text" class="form-control" name="editarHabitacionIoT_ID" id="editarHabitacionIoT_ID" placeholder="ID" maxlength="256">
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
<!-- /.modal-dialog -->
<!-- /.modal -->
<script>
    /**
     * Código inicialización de habitaciones
     */
    $(document).ready(function() {
        obtenerHabitaciones();
        handlerEliminarHabitacion();
        handlerEditarHabitacion();
    });

    /**
     * Obtener habitaciones e introducirlas en tabla
     */
    function obtenerHabitaciones() {
        $.ajax({
            type: 'POST',
            url: '/api/habitacion/obtenerHabitaciones',
            data: "",
            success: function(data) {
                $('.ajxLoader').hide();
                var $datos = JSON.parse(data);
                if ($datos.code === 1) {
                    $('#msgEmpty').html('');
                    if ($datos["data"].length === 0) {
                        $('#msgEmpty').html('No hay tipos de habitación añadidos, <a href="#" data-toggle="modal" data-target="#añadirTipo">¿qué tal si añades uno?</a>');
                    }
                    /**
                     * Mostrar habitaciones
                     */
                    $('#tabla-ajx').html('');
                    $.each($datos["data"], function(i, item) {
                        $('#tabla-ajx').append('<tr><td colspan="5" class="bg-success"><b>' + i + '</b></td></tr>');
                        function $template($habitacion, $tipo, $iot, $estatus) {
                            var $hasIot = $iot === ""
                                ? "<i class='fa fa-times-circle fa-fw text-danger'></i> No"
                                : "<i class='fa fa-check-circle fa-fw text-success'></i> Si &nbsp;<a href='/dashboard/habitaciones/iot/" +
                                $habitacion + "' class='btn btn-sm btn-default'><i class='fa fa-dashboard'></i> Detalles habitación</a>";
                            var $estaHabilitada = $estatus === "1"
                                ? "<i class='fa fa-check-circle fa-fw text-success'></i> Habilitada"
                                : "<i class='fa fa-times-circle fa-fw text-danger'></i> Deshabilitada";
                            return  '<tr><td align="center">' + $habitacion + '</td>' +
                                '<td>' + $tipo + '</td>' +
                            '<td>' + $hasIot + '</td>' +
                                '<td>' + $estaHabilitada + '</td>' +

                                '<td align="center" valign="middle">' +
                                '<a href="#" data-idHabitacion="' + $habitacion + '" class="btn btn-md btn-info btn-fill editarHabitacion" style="color:#FFF;">' +
                                '<i class="fa fa-edit fa-fw"></i> Editar' +
                                '</a>' +
                                '<a href="#" data-idHabitacion="' + $habitacion + '" class="btn btn-danger btn-md btn-fill eliminarHabitacion">' +
                                '<i class="fa fa-trash fa-fw"></i> Eliminar' +
                                '</a>' +
                                '</td> '+
                                '</tr>';
                        }
                       $.each(item, function(i, item){
                          $('#tabla-ajx').append($template(item["habitacion"], item["tipo_habitacion"], item["iot_id"], item["estatus"]));
                       });
                    });
                    /**
                     * Categorias
                     */
                    $('select.categorias').html('');
                    $.each($datos["categorias"], function(i, item) {
                        $('select.categorias').append(
                            '<option data-idCat="' + item["id_tipo_habitacion"] + '">' + item["tipo_habitacion"] + '</option>');
                    });
                    /**
                     * Pisos
                     */
                    $('select.pisos').html('');
                    $.each($datos["pisos"], function(i, item) {
                        $('select.pisos').append(
                            '<option data-idPiso="' + item["piso"] + '">' + item["nombre"] + '</option>');
                    });
                    handlerEliminarHabitacion();
                    handlerEditarHabitacion();
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
     * Guardar habitación en la base de datos
     */
    $('form#guardarHabitacion').on('submit', function(e) {
        guardarHabitacion();
        e.preventDefault();
    });
    function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }
    function validarHabitacion($habitacion) {
        if (!isNumber($habitacion)) {
            $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'No es un numero de habitación valido</div>');
            return false;
        }
        if ($habitacion === "" || $habitacion === null) {
            $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Introduce un numero de habitación</div>');
            return false;
        }
        return true;
    }

    function guardarHabitacion() {
        var $numeroHabitacion = $('#añadirHabitacionNumero').val();
        var $piso = $('#añadirHabitacionPiso option:selected').attr("data-idPiso");
        var $tipo_habitacion = $('#añadirHabitacionTipo option:selected').attr("data-idCat");
        var $iot_id = $('#añadirHabitacionIoT_ID').val();
        var $iot_key = $('#añadirHabitacionIoT_clave').val();
        if (!validarHabitacion($numeroHabitacion)) {
            return true;
        }
        $.ajax({
            type: 'POST',
            url: '/api/habitacion/addHabitacion',
            data: "numeroHabitacion=" + $numeroHabitacion + "&piso=" + $piso + "&tipo=" + $tipo_habitacion + "&iot_id=" + $iot_id + "&iot_key=" + $iot_key,
            success: function(data) {
                var $datos = (JSON.parse(data));
                if ($datos.code === 1) {
                    $('#añadirHabitacion').modal('toggle');
                    $('.msgError').html('');
                    $('#msgEmpty').html('');
                    $('#añadirHabitacionNumero').val('');
                    obtenerHabitaciones();
                    swal("Habitación añadida", "Se ha añadido esta habitación", "success");
                } else {
                    $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Esta habitación ya existe</div>');
                }
            },
            error: function(xhr, type, exception) {
                $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Error en el servidor, no se pudo añadir el piso</div>');
            }
        });
    }

    /**
     * Handler eliminar habitación
     */
    function handlerEliminarHabitacion() {
        $('.eliminarHabitacion').unbind();
        $('.eliminarHabitacion').click(function() {
            var $id = $(this).attr('data-idHabitacion');
            swal({
                title: "¿Estás seguro que quieres eliminar esta habitación?",
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
                    url: '/api/habitacion/eliminarHabitacion',
                    data: "id_habitacion=" + $id,
                    success: function(data) {
                        var $datos = JSON.parse(data);
                        if ($datos.code === 1) {
                            swal("Habitación eliminada", "Se ha eliminado esta habitación", "success");
                            obtenerHabitaciones();
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


    $('form#editarHabitacion').on('submit', function(e) {
        editarHabitacion();
        e.preventDefault();
    });

    function editarHabitacion() {
        var $habitacion = $('#editarHabitacionNumero').val();
        var $id_habitacion = $('form#editarHabitacion').attr('id-habitacion');
        var $piso = $('#editarHabitacionPiso option:selected').attr("data-idPiso");
        var $tipo_habitacion = $('#editarHabitacionTipo option:selected').attr("data-idCat");
        var $iot_id = $('#editarHabitacionIoT_ID').val();
        var $iot_key = $('#editarHabitacionIoT_clave').val();
        if (!validarHabitacion($habitacion)) {
            return true;
        }
        $.ajax({
            type: 'POST',
            url: '/api/habitacion/editarHabitacion',
            data: "habitacion=" + $id_habitacion + "&nuevaHabitacion=" +
            $habitacion + "&piso=" + $piso + "&tipo=" + $tipo_habitacion + "&iot_id="
            + $iot_id + "&iot_key=" + $iot_key,
            success: function(data) {
                var $datos = (JSON.parse(data));
                if ($datos.code === 1) {
                    $('#editarHabitacion').modal('toggle');
                    $('.msgError').html('');
                    $('#editarHabitacionNumero').val('');
                    obtenerHabitaciones();
                    swal("Habitación editada", "Se ha editado esta habitación", "success");
                } else {
                    $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Esta habitación ya existe</div>');
                }
            },
            error: function(xhr, type, exception) {
                $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Error en el servidor, no se pudo añadir el piso</div>');
            }
        });
    }
    /**
     * Handler editar habitación
     */
    function handlerEditarHabitacion() {
        $('.editarHabitacion').unbind();
        $('.editarHabitacion').click(function() {
            var $id = $(this).attr('data-idHabitacion');
            $.ajax({
                type: 'POST',
                url: '/api/habitacion/obtenerHabitacion',
                data: "id_habitacion=" + $id,
                success: function(data) {
                    var $datos = JSON.parse(data);
                    console.log($datos);
                    if ($datos.code === 1) {
                        $('#editarHabitacion').modal('toggle');
                        $('#editarHabitacionNumero').val($datos["data"][0]["habitacion"]);
                        $("#editarHabitacionPiso option[data-idPiso='" + $datos['data'][0]['id_piso'] +"']").attr("selected","selected");
                        $("#editarHabitacionTipo option[data-idCat='" + $datos['data'][0]['id_tipo_habitacion'] +"']").attr("selected","selected");
                        $('#editarHabitacionIoT_ID').val($datos["data"][0]["iot_id"]);
                        $('#editarHabitacionIoT_clave').val($datos["data"][0]["iot_key"]);
                        $('form#editarHabitacion').attr("id-habitacion", $datos["data"][0]["habitacion"]);
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


</script>