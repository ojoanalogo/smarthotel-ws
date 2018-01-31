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
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="header">
                <h4 class="title">Ayuda</h4>
                <p class="category">Soporte</p>
            </div>
            <div class="content">
                <div class="centrar"><i class="fa fa-users fa-4x"></i></div>
                <hr>
                <p class="text-muted">Modifica datos de usuario y añade nuevos al sistema, también puedes ver registros de estadias</p>
                <div class="footer">
                    <div class="stats">
                        <div class="btn-group" role="group">
                            <a href="#" data-toggle="modal" data-target="#añadirHuesped" class="btn btn-success btn-fill btn-md">
                                <i class="fa fa-plus-circle fa-fw"></i> Añadir huesped</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading panel-success">Huespedes</div>
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover" id="tabla-huespedes">
                    <thead>
                    <tr>
                        <th width="15%">Nombre</th>
                        <th width="20%">Apellido</th>
                        <th width="15%">Correo</th>
                        <th width="20%">Num telefono</th>
                        <th width="30%">Administrar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($args["data"] as $usuario) {
                        echo '<tr id="usuario">
<td>&nbsp;<span data-toggle="tooltip" data-placement="left" title="Nombre">' . $usuario["nombre"] . '</span></td>
<td>' . $usuario["apellido"] . '</td>
<td>' . $usuario["correo"] . '</td>
<td align="center" valign="middle">' . $usuario["telefono"] . '</td>
<td align="center" valign="middle">
    <a href="#" class="btn btn-md btn-fill btn-primary"><i class="fa fa-list"></i> Historial</a>
    <a href="#" data-toggle="modal" data-target="#editarUsuario" class="btn btn-md btn-info btn-fill" style="color:#FFF;"><i class="fa fa-edit fa-fw"></i> Editar</a>
    <a href="#" data-idHuesped="' . $usuario["id_usuario"] . '" class="btn btn-danger btn-md btn-fill eliminarHuesped"><i class="fa fa-trash fa-fw"></i> Eliminar</a>
    </td>
 </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php" ?>
<!-- Modales -->
<div class="modal fade" id="añadirHuesped" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="añadirHuesped" method="post" action="/dashboard/huespedes/add">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2>Añadir huesped <small>usuarios</small></h2>
            </div>
            <div class="modal-body">
                <div class="form-group form-group-lg">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nombre">Nombre</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-pencil text-muted"></i></div>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="apellido">Apellido</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-pencil text-muted"></i></div>
                            <input type="text" name="apellido" id="apellido" class="form-control" required>
                            </div>
                        </div>
                    <div class="col-md-12">
                        <label for="correo_huesped">Correo</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-at text-muted"></i></div>
                        <input type="email" name="correo_huesped" id="correo_huesped" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="clave_huesped">Clave</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-lock text-muted"></i></div>
                            <input maxlength="32" type="password" name="clave_huesped" id="clave_huesped" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="pais">País</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-flag text-muted"></i></div>
                        <select class="form-control" name="pais" id="pais" required></select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="clave">Dirección</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-signing text-muted"></i></div>
                        <textarea name="direccion" id="direccion" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="clave">Telefono</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-phone text-muted"></i></div>
                        <input type="number" name="telefono" id="telefono" class="form-control" maxlength="128" required>
                        </div>
                    </div>
                </div>
                </div>
            </div>
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
<!-- /.modal -->
<script>
    $(document).ready(function() {
        $('#tabla-huespedes').dataTable({
            "language": {
                "url": "/public/js/esp_datatables.json"
            }
        });
        populateCountries("pais");
    });
    $('.eliminarHuesped').click(function(){
       var $idHuesped = $(this).attr('data-idHuesped');
        swal({
                title: "Estás seguro?",
                text: "Esta acción no se podrá deshacer",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Borrar",
                closeOnConfirm: false
            },
            function() {
                window.location.replace("/dashboard/huespedes/remove/" + $idHuesped);
            });
    });
    <?php
            if($extra) {
                if (isset($extra["error"])) {
                    echo 'swal("Huesped ya existe", "Correo ya en uso", "error");';
                }
                if (isset($extra["ok"])) {
                    echo 'swal("Huesped añadido", "Huesped añadido a la base de datos", "success");';
                }
                if (isset($extra["removido"])) {
                    echo 'swal("Huesped removido", "El huesped ha sido removido", "success");';
                }
                if (isset($extra["errorRemovido"])) {
                    echo 'swal("Error", "No se pudo remover el huesped", "error");';
                }
            }
//    echo json_encode($extra);
    ?>
</script>
