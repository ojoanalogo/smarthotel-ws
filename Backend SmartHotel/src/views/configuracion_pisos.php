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
            <div class="panel-heading">Pisos</div>
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover" id="tabla-pisos">
                    <thead>
                    <tr style="color:#FFF;">
                        <th width="3%">#ID</th>
                        <th width="74%">Nombre del piso</th>
                        <th width="23%">Administrar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td align="center">1</td>
                        <td>&nbsp;1</td>
                        <td align="center" valign="middle">
                            <a href="#" data-toggle="modal" data-target="#editarPiso" class="btn btn-md btn-info btn-fill" style="color:#FFF;">
                                <i class="fa fa-edit fa-fw"></i> Editar</a>
                            <a href="#" class="btn btn-danger btn-md btn-fill">
                                <i class="fa fa-trash fa-fw"></i> Eliminar</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php" ?>

<!-- Modales -->

<div class="modal fade" id="añadirPiso" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2>Añadir piso <small>configuración</small></h2>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12"> <label for="añadirPisoNumero">Piso</label>
                            <input min="0" max="80" type="number" name="añadirPisoNumero" id="añadirPisoNumero" class="form-control"></div>
                        <div class="col-md-12"><label for="añadirPisoNombre">Nombre de planta</label>
                            <input type="text" name="añadirPisoNombre" id="añadirPisoNombre" class="form-control"> </div>
                    </div>
                </div>
                <div class="msgError"></div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default btn-md" data-dismiss="modal"><i class="fa fa-times fa-fw"></i>Cerrar</button>
                <button type="submit" id="guardarPiso" name="guardar" class="btn btn-primary btn-md"><i class="fa fa-save fa-fw"></i>Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

    <script>
        /**
         * Código configuración de pisos
         */
        $(document).ready(function() {
            $('#tabla-pisos').dataTable({
                "language": {
                    "url": "/public/js/esp_datatables.json"
                }
            });
        });

        /**
         * Obtener pisos e introducirlos en tabla
        */
        $.ajax({
            type: 'POST',
            url: '/api/cuarto/obtenerPisos',
            data: "",
            success: function(data) {
                var $datos = JSON.parse(data);
                var $itera = $datos["data"];
                $.each($itera, function(i, item) {
                   console.log(item);
                });
            },
            error: function(xhr, type, exception) {
                console.log("ajax error response type "+type);
            }
        });

        /**
         * Guardar piso en la base de datos
         */
        $('#guardarPiso').click(function(){
            var $piso = $('#añadirPisoNumero').val();
            var $nombre = $('#añadirPisoNombre').val();
            if (!$.isNumeric($piso)) {
                $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' +
                    'No es un numero de piso valido</div>');
                return true;
            }
            if ($piso === "" || $piso === null) {
                $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' +
                    'Introduce un numero de piso</div>');
                return true;
            }
            if ($nombre === "" || $nombre === null) {
                $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' +
                    'Introduce un nombre de piso</div>');
                return true;
            }
            $.ajax({
                type: 'POST',
                url: '/api/cuarto/add',
                data: "piso=" + $piso + "&nombre=" + $nombre,
                success: function(data) {
                    var $res = (JSON.parse(data));
                    if ($res.code === 1) {
                        $('#añadirPiso').modal('toggle');
                        $('.msgError').html('');
                    } else {
                        $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' +
                            'Este piso ya existe</div>');
                    }
                 },
                error: function(xhr, type, exception) {
                    console.log("ajax error response type "+type);
                    $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' +
                        'Error en el servidor, no se pudo añadir el piso</div>');
                }
            });
        });
    </script>