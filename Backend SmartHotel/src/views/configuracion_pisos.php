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
    <a href="#"  data-toggle="modal" data-target="#añadirPiso" class="btn btn-default btn-fill btn-md">
        <i class="fa fa-plus-circle fa-fw"></i> Añadir piso</a>


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

<?php include "includes/footer.php" ?>


<!-- Modales -->

<div class="modal fade" id="añadirPiso" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Añadir piso</h4>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i>Cerrar</button>
                <button type="submit" id="guardarPiso" name="guardar" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i>Guardar</button>
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
        $('#guardarPiso').click(function(){
            var $piso = $('#añadirPisoNumero');
            var $nombre = $('#añadirPisoNombre');
            if (!$.isNumeric($piso.val())) {
                notificar("No es un numero de piso valido", "danger");
                return true;
            }
            if ($piso.val() === "" || $piso.val() === null) {
                notificar("Introduce un numero de piso", "danger");
                return true;
            }
            if ($nombre.val() === "" || $nombre.val() === null) {
                notificar("Introduce un nombre de piso", "danger");
                return true;
            }
            $.ajax({
                type: 'POST',
                url: '/api/cuarto/add',
                data: "piso=" + $piso + "&nombre=" + $nombre,
                success: function(data) {
                    console.log(data);
                    if (data.code === 1) {
                        alert("AÑADIDO");
                        $('#añadirPiso').modal('toggle');
                    } else {
                        alert("ERROR");
                    }
                 },
                error: function(xhr, type, exception) {
                    alert("ajax error response type "+type);
                }
            });
        });

        function notificar($msg, $severidad) {
            $.notify({
                message: $msg
            },{
                type: $severidad
            });
        }
    </script>