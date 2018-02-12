<?php include "includes/header.php" ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-bed fa-fw"></i> Habitación <?php echo $args[0] ?></h1>
    </div>
</div>
<ol class="breadcrumb">
    <li><a href="/dashboard">Inicio</a></li>
    <li><a href="/dashboard/habitaciones">Habitaciones</a></li>
    <li class="active">Check-In</li>
</ol>
<div class="row">

    <div class="container">
        <div class="card">
            <div class="header">
                <h4 class="title">Añadir huesped</h4>
                <p class="category">Hotel</p>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header bg-success">
                            <h3 class="title">Fecha llegada</h3>
                                <p class="category">&nbsp;</p>
                            </div>
                            <div class="content">
                                <div class="form-group form-group-lg">
                                <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-clock-o text-muted"></i></div>
                                        <input type="text" disabled placeholder="Fecha" class="form-control" name="llegadaReserva" id="llegadaReserva" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header bg-danger">
                                <h3 class="title">Fecha salida</h3>
                                <p class="category">&nbsp;</p>
                            </div>
                            <div class="content">
                                <div class="form-group form-group-lg">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-clock-o text-muted"></i></div>
                                        <input type="text" placeholder="Fecha" class="form-control" name="salidaReserva" id="salidaReserva" readonly="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">Notas extra</div>
                            <div class="form-group form-group-lg">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-pencil-square-o text-muted"></i></div>
                                    <textarea rows="3" name="notasReserva" id="notasReserva" class="form-control" placeholder="Escribe alguna nota especial..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Llegada huesped nuevo</div>
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">Registrar huesped nuevo</h4>
                                        </div>
                                        <div class="content">
                                            <form id="añadirHuesped">
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
                                                <button type="submit" class="btn btn-info btn-lg"><i class="fa fa-sign-in fa-fw"></i> Hacer check-in</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Llegada huesped existente</div>
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Introduce un correo si el huesped ya esta registrado en el sistema</h4>
                                </div>
                                <div class="content">
                                    <form id="añadirReservaHuespedExistente">
                                        <div class="form-group form-group-lg">
                                            <label for="correoRegistrado">Correo</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-at text-muted"></i></div>
                                                <input type="email" autocomplete="off" data-provide="typeahead" class="form-control" id="correoRegistrado" name="correoRegistrado" placeholder="Email">

                                            </div>
                                        </div>
                                        <button type="submit" href="#"  class="btn btn-info btn-lg"><i class="fa fa-sign-in fa-fw"></i> Hacer check-in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
</div>
<?php include "includes/footer.php" ?>
<?php
if($extra) {
    $correos = array();
    foreach ($extra as $dato) {
        $correos[] = ($dato["correo"]);
    }
    $correos = json_encode($correos);
    echo '<script>
    $(document).ready(function(){
        $("#correoRegistrado").typeahead({
            source: ' . $correos . '
            ,minLength: 1
        });
    });
</script>';
}
?>
<script>
    $(document).ready(function() {
        Date.prototype.yyyymmdd = function() {
            var mm = this.getMonth() + 1; // getMonth() is zero-based
            var dd = this.getDate();

            return [this.getFullYear(),
                (mm>9 ? '' : '0') + mm,
                (dd>9 ? '' : '0') + dd
            ].join('/');
        };
        var date = new Date();

        $('#llegadaReserva').val(date.yyyymmdd());
//    $('#llegada').val("asd");
        $('#salidaReserva').datepicker({
            format: 'yyyy/mm/dd',
            startDate: '+1d'
        });
        populateCountries("pais");

        $('form#añadirReservaHuespedExistente').on('submit', function(e) {
            añadirReservaHuespedExistente();
            e.preventDefault();
        });

        function añadirReservaHuespedExistente() {
            var $desde = $('#llegadaReserva').val();
            var $hasta = $('#salidaReserva').val();
             <?php echo 'var $habitacion=' . $args[0] . ';'?>
            var $notas = $('#notasReserva').val();
            var $correo = $('#correoRegistrado').val();
            if ($desde === "" || $desde === null) {
                swal('Faltan datos', 'Introduce una fecha de llegada', 'error');
                return false;
            }
            if ($hasta === "" || $hasta === null) {
                swal('Faltan datos', 'Introduce una fecha de salida', 'error');
                return false;
            }
            if($desde === $hasta) {
                swal('Fecha incorrecta', 'La fecha de llegada no puede ser igual que la de salida', 'error');
                return false;
            }
            if ($correo === "" || $correo === null) {
                swal('Faltan datos', 'Introduce una correo de huesped existente', 'error');
                return false;
            }
            $.ajax({
                type: "POST",
                url: '/api/reservacion/crearReservacionExistente',
                data: "correoHuesped=" + $correo + "&fechaDesde=" + $desde + "&fechaHasta=" + $hasta + "&idHabitacion=" + $habitacion + "&notas=" + $notas,
                success: function(data) {
                    var $datos = JSON.parse(data);
                    console.log($datos);
                    if ($datos.code === 1) {
                        swal("Check-In hecho", "Se han guardado los datos, el huesped ya puede usar la app", "success");
                        swal({
                                title: "Check-In hecho",
                                text: "Se han guardado los datos, el huesped ya puede usar la app",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Ok",
                                closeOnConfirm: false
                            },
                            function(){
                                window.location.href = "/dashboard/habitaciones";
                            });
                    } else {
                        swal("Error", "Este huesped ya esta alojado en una habitación", "warning");
                    }
                },
                error: function(xhr, type, exception) {
                    swal("No se pudo eliminar", "Ha ocurrido un error.", "danger");
                }
            });
        }
    });


</script>
