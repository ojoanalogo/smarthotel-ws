<?php include "includes/header.php" ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-users fa-fw"></i> Huespedes</h1>
        </div>
    </div>
    <ol class="breadcrumb">
        <li><a href="/dashboard">Inicio</a></li>
        <li class="active">Huespedes</li>
    </ol>

<a href="#" style="margin-bottom: 15px;" data-toggle="modal" data-target="#añadirMiembro" class="btn btn-default btn-fill btn-lg"><i class="fa fa-plus-circle fa-fw"></i> Añadir huesped</a>

<div class="panel panel-default">
    <div class="panel-heading">Pisos</div>
    <div class="table-responsive">
        <table width="100%" class="table table-striped table-bordered table-hover" id="tabla-huespedes">
    <thead>
    <tr style=" font-weight:bold;">
        <th width="10%" >ID huesped</th>
        <th width="20%">Nombre</th>
        <th width="30">Apellido</th>
        <th width="20%">Num telefono</th>
        <th width="20%">Administrar</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($usuarios as $usuario) {
    echo '<tr id="usuario">
        <td align="center">' . $usuario["id_usuario"] . '</td>
        <td>&nbsp;<span data-toggle="tooltip" data-placement="right" title="Nombre">' . $usuario["nombre"] . '</span></td>
        <td>' . $usuario["apellido"] . '</td>
        <td align="center" valign="middle">' . $usuario["telefono"] . '</td>
        <td align="center" valign="middle">
            <a href="#" class="btn btn-md   btn-fill btn-primary"><i class="fa fa-list"></i> Historial</a>
           <a href="#" data-toggle="modal" data-target="#editarUsuario" class="btn btn-md btn-info btn-fill" style="color:#FFF;">
                        <i class="fa fa-edit fa-fw"></i> Editar
           </a>
                     <a href="#" class="btn btn-danger btn-md btn-fill">
                        <i class="fa fa-trash fa-fw"></i> Eliminar
                     </a>
         </td>
    </tr>';
    }
    ?>
    </tbody>
</table>
    </div>
</div>

<?php include "includes/footer.php" ?>

<!-- Modales -->

<div class="modal fade" id="añadirMiembro" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2>Añadir huesped <small>usuarios</small></h2>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6"> <label for="nombre">Name</label>
                            <input type="text" name="nombre" id="nombre" class="form-control"></div>
                        <div class="col-md-6"><label for="apellido">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control"> </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12"><label for="usuario">Usuario</label>
                            <input type="text" name="usuario" id="usuario" class="form-control"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><label for="correo">Correo</label>
                            <input type="email" name="correo" id="correo" class="form-control"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><label for="clave">Clave</label>
                            <input type="password" name="clave" id="clave" class="form-control"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="member_address">Dirección</label>
                    <textarea name="direccion" id="direccion" class="form-control"></textarea>
                    <div class="row">
                        <div class="col-md-12"><label for="clave">Telefono</label>
                            <input type="number" name="telefono" id="telefono" class="form-control"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-md" data-dismiss="modal"><i class="fa fa-times fa-fw"></i>Cerrar</button>
                <button type="submit" name="guardar" class="btn btn-primary btn-md"><i class="fa fa-save fa-fw"></i>Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    $(document).ready(function() {
        $('#tabla-huespedes').dataTable({
            "language": {
                "url": "/public/js/esp_datatables.json"
            }
        });
    });
</script>
