<?php include "includes/header.php" ?>
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
    <a href="#" style="margin-bottom: 15px;" data-toggle="modal" data-target="#añadirHabitacion" class="btn btn-success btn-fill btn-lg">
        <i class="fa fa-plus-circle fa-fw"></i> Añadir habitación</a>
<div class="row">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading panel-success">Habitaciones</div>
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover" id="tabla-habitacions">
                    <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="8"> $ </th>
                        <th width="66%">Nombre del habitacion</th>
                        <th width="23%">Administrar</th>
                    </tr>
                    </thead>
                    <tbody id="tabla-ajx">
                    <tr><td colspan="6" bgcolor="#D1D1D1">Piso 1</td></tr>
                    <tr>
                        <td align="center">1</td>
                        <td><i class="fa fa-bed fa-fw"></i> </td>
                        <td>Habitación 1 </td>
                        <td align="center" valign="middle">
                            <a href="#" class="btn btn-md btn-info btn-fill editarHabitacion" style="color:#FFF;">
                                <i class="fa fa-edit fa-fw"></i> Editar
                            </a>
                            <a href="#" class="btn btn-danger btn-md btn-fill eliminarHabitacion">
                                <i class="fa fa-trash fa-fw"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h4 class="centrar" id="msgEmpty"></h4>
        </div>
    </div>
</div>
<?php include "includes/footer.php" ?>
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
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12"> <label for="añadirHabitacionNumero">Habitacion</label>
                                <input min="1" max="80" type="number" name="añadirHabitacionNumero" id="añadirHabitacionNumero" class="form-control" placeholder="1">
                            </div>
                            <div class="col-md-12"><label for="añadirHabitacionNombre">Nombre de planta</label>
                                <input type="text" name="añadirHabitacionNombre" id="añadirHabitacionNombre" class="form-control" placeholder="Introduce un nombre">
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
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12"> <label for="editarHabitacionNumero">Habitacion</label>
                                <input min="1" max="80" type="number" name="editarHabitacionNumero" id="editarHabitacionNumero" class="form-control" placeholder="1"></div>
                            <div class="col-md-12"><label for="editarHabitacionNombre">Nombre de planta</label>
                                <input type="text" name="editarHabitacionNombre" id="editarHabitacionNombre" class="form-control" placeholder="Introduce un nombre"> </div>
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
