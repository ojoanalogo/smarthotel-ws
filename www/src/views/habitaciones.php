<?php include "includes/header.php" ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-bed fa-fw"></i> Habitaciones</h1>
    </div>
</div>
<ol class="breadcrumb">
    <li><a href="/dashboard">Inicio</a></li>
    <li class="active">Habitaciones</li>
</ol>
<div class="row">
    <div class="col-lg-3 col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Ayuda</h4>
                <p class="category">Soporte</p>
            </div>
            <div class="content">
                <div class="centrar"><i class="fa fa-bookmark-o fa-4x"></i></div>
                <hr>
                <p class="text-muted">Cuando quieras asignar o registrar a un huesped a una habitación hazlo desde esta ubicación</p>
                <p class="text-muted">También puedes ver los detalles de habitación si tienen el sistema IoT activado</p>
            </div>
            <hr>
            <div class="header">
                <h4 class="title">Preguntas frecuentes</h4>
                <p class="category">Soporte</p>
            </div>
            <div class="content">
                <b class="text-info"><i class="fa fa-question-circle-o fa-fw"></i> ¿Como registro un huesped?</b>
                <div></div>
                <p class="text-muted">
                    Selecciona la opción "Check-In" e introduce los datos del huesped para añadirlo a la base de datos y asignarle una habitación que podrá controlar desde la aplicación.
                </p>
                <b class="text-info"><i class="fa fa-question-circle-o fa-fw"></i> ¿Cómo veo el estatus de una habitación</b>
                <div></div>
                <p class="text-muted">
                    Selecciona la opción detalles habitación, si tiene el sistema IoT activado saldrá la opción
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-12">
<form class="navbar-form"  method="post">

    <div class="navbar navbar-default row" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav_menu">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><i class="fa fa-calendar fa-fw"></i></a>
            </div>
            <div class="navbar-collapse collapse" id="nav_menu">
                <ul class="nav navbar-nav">
                    <li style="margin-top:16px;"><div class="input-group">
                            <span class="input-group-addon">Fecha &nbsp;<?php echo date("Y-m-d")?></span>
                        </div>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </div>
</form>
        <div class="ajxLoader centrar" style="margin-top: 60px;">
            <i class="fa fa-circle-o-notch fa-spin fa-5x fa-fw text-muted"></i>
            <span class="sr-only">Loading...</span>
        </div>
        <h4 class="centrar" id="msgEmpty"></h4>
        <div id="habitaciones">

        </div>
    </div>
</div>
<table width="50%" border="0" align="center">
    <tr>
        <td>
            <div class="row">
                <div class="col-md-6" style="color:#5cb85c"><i class="fa fa-circle"></i>&nbsp;Disponible</div>
                <div class="col-md-6" style="color:#d9534f"><i class="fa fa-circle"></i>&nbsp;Ocupada</div>
            </div>
        </td>
    </tr>
</table>
<?php include "includes/footer.php" ?>
<script>
    $('#datepicker').datepicker({
        format: "yyyy-mm-dd"
    });
    /**
     * Código inicialización de habitaciones
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
                if ($datos.code === 1) {
                    $('#msgEmpty').html('');
                    if ($datos["data"].length === 0) {
                        $('#msgEmpty').html('No hay tipos de habitación añadidos, <a href="#" data-toggle="modal" data-target="#añadirTipo">¿qué tal si añades uno?</a>');
                    }
                    /**
                     * Mostrar habitaciones
                     */
                    $('#habitaciones').html('');
                    $.each($datos["data"], function(i, item) {
                        function $habitaciones($data) {
                            var $str = "";
                            $.each($data, function(i, item) {
                                var $hasIot = item.iot_id !== "" ? '<a href="/dashboard/habitaciones/iot/' + item.habitacion + '" class="btn btn-fill" style="color:#FFF; background-color: #009688;" title="Detalles"><i class="fa fa-dashboard"></i> IoT</a>' : '';
                                $str+= '<div class="col-md-3" data-habitacion="' + item.habitacion + '"><div class="panel habitacion-disponible"> <div class="panel-heading">' + item.habitacion + '<span class="pull-right"><span class="label label-default">' + item.tipo_habitacion +'</span></span></div>' +
                                    '<div class="table-responsive">' +
                                    '<table width="100%" border="0" class="table"> ' +
                                    '<tr><td><i class="fa fa-user" title="Huesped"></i>&nbsp;<strong>-</strong></td></tr> ' +
                                    '<tr><td><i class="fa fa-clock-o" title="Hora"></i>&nbsp;<strong>-</strong></td></tr> ' +
                                    '<tr><td><a href="/dashboard/habitaciones/llegada/' + item.habitacion + '" class="btn btn-fill btn-success" style="color:#FFF; background-color: #5cb85c;" title="Check-In"> <i class="fa fa-bookmark-o"></i> Check-In</a>&nbsp;' + $hasIot + '</td> </tr> ' +
                                    '</table>' +
                                    '</div> ' +
                                    '</div> ' +
                                    '</div>';
                            });
                            return $str;
                        }
                            $('#habitaciones').append('<div class="panel panel-default">' +
                            '<div class="panel-heading">' +
                            i +
                            '</div>' +
                            '<div class="panel-body">' +
                                $habitaciones(item)
                            + '</div></div>');
                    });
                    getReservadas();
                } else {
                    swal("Error", "Error en la base de datos", "error");
                }
            },
            error: function(xhr, type, exception) {
                swal("Error", "Ha ocurrido un error.\nInformación: " + type, "error");
            }
        });
    }
    function handlerCheckout() {
        $('.checkOut').unbind();
            $('.checkOut').click((function(){
                var $idReserva = $(this).attr('data-idReservacion');
            swal({
                    title: "Estás seguro?",
                    text: "Cuando hagas check-out el huesped ya no podrá usar la aplicación",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Si, terminar manualmente",
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                },
                function(){
                    $.ajax({
                        type: 'POST',
                        url: '/api/reservacion/checkout',
                        data: "id_reserva=" + $idReserva,
                        success: function(data) {
                            var $datos = JSON.parse(data);
                            if ($datos.code === 1) {
                                obtenerHabitaciones();
                                swal("Check-Out hecho", "Huesped ya no tendrá acceso a la aplicación", "success");
                            } else {
                                swal("Error", "Error en la base de datos", "error");
                            }
                        },
                        error: function(xhr, type, exception) {
                            swal("Error", "Ha ocurrido un error.\nInformación: " + type, "error");
                        }
                    });
                });
        }));
    }
    function getReservadas() {
        $.ajax({
            type: 'POST',
            url: '/api/reservacion/obtenerHabitacionesReservadas',
            data: "",
            success: function(data) {
                var $datos = JSON.parse(data);
                if ($datos.code === 1) {
                    function $ocupado(item) {
                        var $hasIot = item.habitacion_iot_id !== "" ? '<a href="/dashboard/habitaciones/iot/' + item.habitacion_numero + '" class="btn btn-fill" style="color:#FFF; background-color: #009688;" title="Detalles"><i class="fa fa-dashboard"></i> IoT</a>' : '';
                        return '<div class="panel habitacion-ocupada"> <div class="panel-heading">' + item.habitacion_numero + '<span class="pull-right"><span class="label label-default">' + item.habitacion_tipo +'</span></span></div>' +
                            '<div class="table-responsive">' +
                            '<table width="100%" border="0" class="table"> ' +
                            '<tr><td><i class="fa fa-user" title="Huesped"></i>&nbsp;<strong>' + item.huesped_nombre + " " + item.huesped_apellido + '</strong></td></tr> ' +
                            '<tr><td><i class="fa fa-clock-o" title="Hora"></i>&nbsp;<strong>' + item.reservacion_desde + " - " + item.reservacion_hasta + '</strong></td></tr> ' +
                            '<tr><td><a href="#" data-idReservacion="' + item.reservacion_codigo + '" class="btn btn-fill btn-danger checkOut" style="color:#FFF; background-color: #F44336;" title="Check-Out"> <i class="fa fa-bookmark-o"></i> Check-Out</a>&nbsp;' + $hasIot + '</td> </tr> ' +
                            '</table>' +
                            '</div> ' +
                            '</div>';
                    }
                    $.each($datos["data"], function(i, item) {
                        $.each(item, function(i, item){
                            $('[data-habitacion="' + item["habitacion_numero"]  + '"]').html($ocupado(item));
                        });
                    });
                    handlerCheckout();
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