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
                        <a href="#" data-toggle="modal" data-target="#añadirHabitacion" class="btn btn-success btn-fill btn-md">
                            <i class="fa fa-plus-circle fa-fw"></i> Añadir habitacion</a>
                        <a href="#" data-toggle="modal" data-target="#añadirHabitacion" class="btn btn-success btn-fill btn-md">
                            <i class="fa fa-hotel fa-fw"></i> Añadir tipo de habitación</a>
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
                        <th width="3%">Habitacion</th>
                        <th width="37%">Tipo de habitación</th>
                        <th width="15%">Costo</th>
                        <th width="15%">IoT</th>
                        <th width="30%">Administrar</th>
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
<script>
    /**
     * Código inicialización de pisos
     */
    $(document).ready(function() {
        obtenerHabitaciones();
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
                console.log($datos["data"]);
                if ($datos.code === 1) {
                    $.each($datos["data"], function(i, item) {
                       console.log(i);
                       $.each(item, function(i, item){
                          console.log(item);
                       });
                    });
                } else {
                    swal("Error", "Error en la base de datos", "error");
                }
            },
            error: function(xhr, type, exception) {
                swal("Error", "Ha ocurrido un error.\nInformación: " + type, "error");
            }
        });
    }
</script>