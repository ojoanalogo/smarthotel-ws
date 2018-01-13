<?php include "includes/header.php" ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-gears fa-fw"></i> Configuración - Pisos</h1>
        </div>
    </div>
    <ol class="breadcrumb">
        <li><a href="/dashboard">Inicio</a></li>
        <li><a href="/dashboard/configuracion">Configuración</a></li>
        <li class="active">Editar pisos</li>
    </ol>
    <a href="#" style="margin-bottom: 15px;" data-toggle="modal" data-target="#añadirPiso" class="btn btn-success btn-fill btn-lg">
        <i class="fa fa-plus-circle fa-fw"></i> Añadir piso</a>

<div class="row">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading panel-success">Pisos</div>
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover" id="tabla-pisos">
                    <thead>
                    <tr>
                        <th width="3%">Piso</th>
                        <th width="74%">Nombre del piso</th>
                        <th width="23%">Administrar</th>
                    </tr>
                    </thead>
                    <tbody id="tabla-ajx">

                    </tbody>
                </table>
            </div>
            <h4 class="centrar" id="msgEmpty"></h4>
        </div>
    </div>
</div>
<?php include "includes/footer.php" ?>
<!-- Modales -->
<!-- Modal añadir piso -->
<div class="modal fade" id="añadirPiso" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2>Añadir piso <small>configuración</small></h2>
            </div>
            <div class="modal-body">
                <form id="guardarPiso">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12"> <label for="añadirPisoNumero">Piso</label>
                                <input min="1" max="80" type="number" name="añadirPisoNumero" id="añadirPisoNumero" class="form-control" placeholder="1">
                            </div>
                            <div class="col-md-12"><label for="añadirPisoNombre">Nombre de planta</label>
                                <input type="text" name="añadirPisoNombre" id="añadirPisoNombre" class="form-control" placeholder="Introduce un nombre">
                            </div>
                        </div>
                    </div>
                    <div class="msgError"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-md" data-dismiss="modal"><i class="fa fa-times fa-fw"></i>Cerrar</button>
                        <button type="submit" name="guardar" class="btn btn-primary btn-md"><i class="fa fa-save fa-fw"></i>Guardar</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>
<!-- /.modal -->
<!-- Modal editar piso -->
<div class="modal fade" id="editarPiso" tabindex="-2" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2>Editar piso <small>configuración</small></h2>
            </div>
            <div class="modal-body">
                <form id="editarPiso">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12"> <label for="editarPisoNumero">Piso</label>
                                <input min="1" max="80" type="number" name="editarPisoNumero" id="editarPisoNumero" class="form-control" placeholder="1"></div>
                            <div class="col-md-12"><label for="editarPisoNombre">Nombre de planta</label>
                                <input type="text" name="editarPisoNombre" id="editarPisoNombre" class="form-control" placeholder="Introduce un nombre"> </div>
                        </div>
                    </div>
                    <div class="msgError"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-md" data-dismiss="modal"><i class="fa fa-times fa-fw"></i>Cerrar</button>
                        <button type="submit" name="guardar" class="btn btn-primary btn-md"><i class="fa fa-save fa-fw"></i>Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
<!-- /.modal -->
    <script>
        /**
         * Código inicialización de pisos
         */
        $(document).ready(function() {
            obtenerPisos();
            handlerEliminarPiso();
            handlerEditarPiso();
        });
        /**
         * Obtener pisos e introducirlos en tabla
         */
        function obtenerPisos() {
            $.ajax({
                type: 'POST',
                url: '/api/cuarto/obtenerPisos',
                data: "",
                success: function(data) {
                    var $datos = JSON.parse(data);
                    if ($datos.code === 1) {
                        var $itera = $datos["data"];
                        if ($itera.length === 0) {
                            $('#msgEmpty').html('No hay pisos añadidos, <a href="#" data-toggle="modal" data-target="#añadirPiso">¿qué tal si añades uno?</a>');
                        }
                        // Template:
                        function template($id, $piso, $nombre) {
                            return '<tr>' + '<td align="center">' + $piso + '</td>' + '<td>' + $nombre + '</td>' + '<td align="center" valign="middle">' + '<a href="#" data-idPiso="' + $id + '" class="btn btn-md btn-info btn-fill editarPiso" style="color:#FFF;">' + '<i class="fa fa-edit fa-fw"></i> Editar' + '</a>&nbsp;' + '<a href="#" data-idPiso="' + $id + '" class="btn btn-danger btn-md btn-fill eliminarPiso">' + '<i class="fa fa-trash fa-fw"></i> Eliminar' + '</a>' + '</td>' + '</tr>';
                        }
                        $('#tabla-ajx').html('');
                        $.each($itera, function(i, item) {
                            $('#tabla-ajx').append(template(item.id_piso, item.piso, item.nombre));
                        });
                        handlerEliminarPiso();
                        handlerEditarPiso();
                    } else {
                        alert("Error al intentar obtener los pisos");
                    }
                },
                error: function(xhr, type, exception) {
                    swal("Error", "Ha ocurrido un error.\nInformación: " + type, "danger");
                }
            });
        }
        /**
         * Handler editar piso
         */
        function handlerEditarPiso() {
            $('.editarPiso').unbind();
            $('.editarPiso').click(function() {
                var $id = $(this).attr('data-idPiso');
                $.ajax({
                    type: 'POST',
                    url: '/api/cuarto/obtenerPiso',
                    data: "id_piso=" + $id,
                    success: function(data) {
                        var $datos = JSON.parse(data);
                        if ($datos.code === 1) {
                            $('#editarPiso').modal('toggle');
                            $('#editarPisoNumero').val($datos["data"][0]["piso"]);
                            $('#editarPisoNombre').val($datos["data"][0]["nombre"]);
                            $('form#editarPiso').attr("id-piso", $datos["data"][0]["id_piso"]);
                        } else {
                            swal("No se pudo obtener información", "Ha ocurrido un error.", "danger");
                        }
                    },
                    error: function(xhr, type, exception) {
                        swal("Error", "Ha ocurrido un error.\nInformación: " + type, "danger");
                    }
                });
            });
        }

        $('form#editarPiso').on('submit', function(e) {
            console.log("he");
            editarPiso();
            e.preventDefault();
        });
        function editarPiso() {
            var $piso = $('#editarPisoNumero').val();
            var $nombre = $('#editarPisoNombre').val();
            var $id_piso = $('form#editarPiso').attr('id-piso');
            if (!validarPiso($piso, $nombre)) {
                return true;
            }
            $.ajax({
                type: 'POST',
                url: '/api/cuarto/editarPiso',
                data: "id_piso=" + $id_piso + "&piso=" + $piso + "&nombre=" + $nombre,
                success: function(data) {
                    var $res = (JSON.parse(data));
                    if ($res.code === 1) {
                        $('#editarPiso').modal('toggle');
                        $('.msgError').html('');
                        $('#editarPisoNumero').val('');
                        $('#editarPisoNombre').val('');
                        obtenerPisos();
                        swal("Piso editado", "Se ha editado este piso", "success");
                    } else {
                        $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Este piso ya existe</div>');
                    }
                },
                error: function(xhr, type, exception) {
                    $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Error en el servidor, no se pudo añadir el piso</div>');
                }
            });
        }

        /**
         * Handler eliminar piso
         */
        function handlerEliminarPiso() {
            $('.eliminarPiso').unbind();
            $('.eliminarPiso').click(function() {
                var $id = $(this).attr('data-idPiso');
                swal({
                    title: "¿Estás seguro que quieres eliminar este piso?",
                    text: "Esta acción no se puede revertir",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Si, borralo!",
                    closeOnConfirm: false
                }, function() {
                    $.ajax({
                        type: 'POST',
                        url: '/api/cuarto/eliminarPiso',
                        data: "id_piso=" + $id,
                        success: function(data) {
                            var $datos = JSON.parse(data);
                            if ($datos.code === 1) {
                                swal("Piso eliminado", "Se ha eliminado este piso", "success");
                                obtenerPisos();
                            } else {
                                swal("No se pudo eliminar", "Ha ocurrido un error.", "danger");
                            }
                        },
                        error: function(xhr, type, exception) {
                            swal("Error", "Ha ocurrido un error.\nInformación: " + type, "danger");
                        }
                    });
                });
            });
        }
        /**
         * Guardar piso en la base de datos
         */
        $('form#guardarPiso').on('submit', function(e) {
            guardarPiso();
            e.preventDefault();
        });
        function isNumber(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }
        function validarPiso($piso, $nombre) {
            if (!isNumber($piso)) {
                $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'No es un numero de piso valido</div>');
                return false;
            }
            if ($piso > 80 || $piso < 0) {
                $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Debes introducir un numero de piso entre 1 y 80</div>');
                return false;
            }
            if ($piso === "" || $piso === null) {
                $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Introduce un numero de piso</div>');
                return false;
            }
            if ($nombre === "" || $nombre === null) {
                $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Introduce un nombre de piso</div>');
                return false;
            }
            return true;
        }

        function guardarPiso() {
            var $piso = $('#añadirPisoNumero').val();
            var $nombre = $('#añadirPisoNombre').val();
            if (!validarPiso($piso, $nombre)) {
                return true;
            }
            $.ajax({
                type: 'POST',
                url: '/api/cuarto/addPiso',
                data: "piso=" + $piso + "&nombre=" + $nombre,
                success: function(data) {
                    var $res = (JSON.parse(data));
                    if ($res.code === 1) {
                        $('#añadirPiso').modal('toggle');
                        $('.msgError').html('');
                        $('#msgEmpty').html('');
                        $('#añadirPisoNumero').val('');
                        $('#añadirPisoNombre').val('');
                        obtenerPisos();
                        swal("Piso añadido", "Se ha añadido este piso", "success");
                    } else {
                        $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Este piso ya existe</div>');
                    }
                },
                error: function(xhr, type, exception) {
                    $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Error en el servidor, no se pudo añadir el piso</div>');
                }
            });
        }
    </script>