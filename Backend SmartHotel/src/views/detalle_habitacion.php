<?php include "includes/header.php" ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-bed fa-fw"></i> Habitación - <?php echo $args[0] ?></h1>
    </div>
</div>
<ol class="breadcrumb">
    <li><a href="/dashboard">Inicio</a></li>
    <li> <a href="/dashboard/habitaciones">Habitaciones</a></li>
    <li class="active">Detalles habitación <?php echo $args[0] ?></li>
</ol>
    <div class="container">
        <div class="card">
            <div class="header">
                <h4 class="title">IoT</h4>
                <p class="category">Panel de control habitación <?php echo $args[0] ?></p>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <img class="img-responsive centrar" src="/public/img/cuarto.PNG">
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <div class="row">
                            <div class="col-md-4">
                                <img id="imgLuces" class="img-responsive centrar" src="/public/img/light-off.png" height="96">
                                <div class="centrar">
                                    <p class="h2">Luces</p>
                                    <a href="#" id="btnLuces" class="btn btn-lg">...</a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <canvas id="temperatura"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "includes/footer.php" ?>
<script>
    /**
     * Código inicialización de habitaciones
     */
    $(document).ready(function() {
        obtenerValores();
    });

    var gTemp = new LinearGauge({
        renderTo: 'temperatura',
        width: 120,
        height: 400,
        units: "°C",
        minValue: 0,
        maxValue: 80,
        majorTicks: [
            "0",
            "15",
            "20",
            "25",
            "30",
            "35",
            "40",
            "45",
            "50",
            "60",
            "80"
        ],
        minorTicks: 2,
        strokeTicks: true,
        highlights: [
            {
                "from": 45,
                "to": 80,
                "color": "rgba(200, 50, 50, .75)"
            }
        ],
        colorPlate: "#fff",
        borderShadowWidth: 0,
        borders: false,
        needleType: "arrow",
        needleWidth: 2,
        animationDuration: 1500,
        animationRule: "linear",
        tickSide: "left",
        numberSide: "left",
        needleSide: "left",
        barStrokeWidth: 1,
        barBeginCircle: false,
        value: 0
    }).draw();

    function obtenerValores() {
        var $numeroHabitacion = <?php echo $args[0] . ";" ?>
            $.ajax({
                type: 'POST',
                url: '/api/iot/' + $numeroHabitacion + '/obtenerDatos',
                data: "",
                success: function(data) {
                    console.log("i got called m8");
                    var $datos = (JSON.parse(data));
                    console.log($datos);
                    gTemp.value = $datos[1]["last_value"];
                    if($datos[3]["last_value"] === "1") {
                        $('#imgLuces').attr('src', "/public/img/light-on.png");
                        $('#btnLuces').html('Apagar');
                        $('#btnLuces').removeClass('btn-success');
                        $('#btnLuces').addClass('btn-danger');
                        $('#btnLuces').attr('data-action', "0");
                    } else {
                        $('#imgLuces').attr('src', "/public/img/light-off.png");
                        $('#btnLuces').html('Encender');
                        $('#btnLuces').removeClass('btn-danger');
                        $('#btnLuces').addClass('btn-success');
                        $('#btnLuces').attr('data-action', "1");
                    }
                    setTimeout(function(){
                        obtenerValores();
                    }, 1000*10);
                },
                error: function(xhr, type, exception) {
                    swal("Error IoT", "No se pudieron obtener los datos de la habitación, comprueba el ID de dispositivo", "error");
                }
            });
    }

    $('#btnLuces').click(function() {
        var $accion = $(this).attr('data-action');
        var $numeroHabitacion = <?php echo $args[0] . ";" ?>
            $.ajax({
            type: 'POST',
            url: '/api/iot/' + $numeroHabitacion + '/modificarDato/',
            data: "feed=" + "foco-1" + "&data=" + $accion,
            success: function(data) {
                obtenerValores();
                if($accion === "1") {
                    swal("Foco encendido", "", "success");
                } else {
                    swal("Foco apagado", "", "success");
                }
            },
            error: function(xhr, type, exception) {
                $('.msgError').html('<div class="alert alert-danger msgError" role="alert"><i class="fa fa-warning fw"></i> ' + 'Error en el servidor, no se pudo añadir el piso</div>');
            }
        });

    })


</script>
