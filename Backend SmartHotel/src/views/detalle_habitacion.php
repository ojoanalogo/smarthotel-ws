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
    <div class="container-fluid">
        <div class="card">
            <div class="header">
                <h4 class="title">IoT - ultima actualización <span class="contador">-</span></h4>
                <p class="category">Panel de control habitación <?php echo $args[0] ?></p>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <img class="img-responsive centrar" src="/public/img/cuarto.PNG">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Control de habitación</h4>
                                <p class="category">Soporte</p>
                            </div>
                            <div class="content">
                                <div class="centrar"><i class="fa fa-bed fa-4x"></i></div>
                                <hr>
                                <p class="text-muted">Aquí puedes tener un control de la habitación y ver variables de habitación</p>
                                <div class="footer">
                                    <div class="stats">
                                        <div class="btn-group" role="group">
                                            <a href="#" id="update" class="btn btn-success btn-fill btn-md">
                                                <i class="fa fa-refresh fa-fw"></i> Actualizar manualmente</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <img id="imgLuces" class="img-responsive centrar" src="/public/img/light-off.png" height="96">
                                <div class="centrar">
                                    <p class="h2">Luces</p>
                                    <a class="btn btn-lg" id="btnLuces" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Procesando acción">...</a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <img class="img-responsive centrar" src="/public/img/air-aconditioner.png" height="96">
                                <div class="centrar">
                                    <p class="h2">MiniSplit</p>
                                    <a class="btn btn-lg" id="btnMiniSplit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Procesando acción">...</a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <img class="img-responsive centrar" src="/public/img/tv.png" height="96">
                                <div class="centrar">
                                    <p class="h2">TV</p>
                                    <a class="btn btn-lg" id="btnTV" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Procesando acción">...</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-sm-12 centrar">
                                <canvas id="temperatura"></canvas>
                            </div>
                            <div class="col-md-4 col-sm-12 centrar">
                                <canvas id="termostato"></canvas>
                            </div>
                            <div class="col-md-4 col-sm-12 centrar">
                                <canvas id="humedad"></canvas>
                            </div>
                        </div>
                        <span class="h3 text-muted margin-top">Datos recientes</span>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div id="chart_temperatura" class="ct-chart"></div>
                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-warning"></i> Temperatura
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Actualizado (<span class="contadorGraph">hace 0 segundos</span>)
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div id="chart_termostato" class="ct-chart"></div>
                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-danger"></i> Termostato
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Actualizado (<span class="contadorGraph">hace 0 segundos</span>)
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div id="chart_humedad" class="ct-chart"></div>
                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-success"></i> Humedad
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Actualizado (<span class="contadorGraph">hace 0 segundos</span>)
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
<script>
    /**
     * Código inicialización de habitaciones
     */
    $(document).ready(function() {
        obtenerValores();
        obtenerGraficas();
    });

    $('#update').click(function(){
       getDataRequest();
       getGraphRequest();
        swal("Información actualizada", "", "success");
    });

    var gTermostato = new LinearGauge({
        renderTo: 'termostato',
        width: 320,
        height: 150,
        units: "°C",
        title: "Termostato",
        minValue: 14,
        maxValue: 28,
        majorTicks: [
            14,
            16,
            18,
            20,
            22,
            24,
            26,
            28
        ],
        minorTicks: 2,
        strokeTicks: true,
        ticksWidth: 15,
        ticksWidthMinor: 7.5,
        highlights: [
            {
                "from": 14,
                "to": 18,
                "color": "rgba(0,0, 130, .3)"
            },
            {
                "from": 18,
                "to": 26,
                "color": "rgba(0,0, 255, .3)"
            },
            {
                "from": 26,
                "to": 28,
                "color": "rgba(255, 0, 0, .3)"
            }
        ],
        colorMajorTicks: "#004D40",
        colorMinorTicks: "#00796B",
        colorTitle: "#fff",
        colorUnits: "#000",
        colorNumbers: "#eee",
        colorPlate: "#4DB6AC",
        colorPlateEnd: "#00897B",
        borderShadowWidth: 0,
        borders: false,
        borderRadius: 10,
        needleType: "arrow",
        needleWidth: 3,
        animationDuration: 1500,
        animationRule: "linear",
        colorNeedle: "#222",
        colorNeedleEnd: "",
        colorBarProgress: "#327ac0",
        colorBar: "#f5f5f5",
        barStroke: 0,
        barWidth: 8,
        barBeginCircle: false
    }).draw();

    var gTemp = new LinearGauge({
        renderTo: 'temperatura',
        width: 320,
        height: 150,
        title: "Temperatura",
        units: "°C",
        minValue: -15,
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
        colorMajorTicks: "#0D47A1",
        colorMinorTicks: "#1976D2",
        colorTitle: "#fff",
        colorUnits: "#000",
        colorNumbers: "#eee",
        colorPlate: "#64B5F6",
        colorPlateEnd: "#1E88E5",
        borderShadowWidth: 0,
        borders: false,
        borderRadius: 10,
        needleType: "arrow",
        needleWidth: 3,
        animationDuration: 1500,
        animationRule: "linear",
        colorNeedle: "#222",
        colorNeedleEnd: "",
        colorBarProgress: "#327ac0",
        colorBar: "#f5f5f5",
        barStroke: 0,
        barWidth: 8,
        barBeginCircle: false
    }).draw();

    var gHumedad = new LinearGauge({
        renderTo: 'humedad',
        width: 320,
        height: 150,
        units: "RH",
        title: "Humedad",
        minValue: 0,
        maxValue: 100,
        majorTicks: [
            0,
            10,
            20,
            30,
            40,
            50,
            60,
            70,
            80,
            90,
            100
        ],
        minorTicks: 2,
        strokeTicks: true,
        ticksWidth: 15,
        ticksWidthMinor: 7.5,
        highlights: [
            {
                "from": 0,
                "to": 60,
                "color": "rgba(0,0, 255, .3)"
            },
            {
                "from": 60,
                "to": 100,
                "color": "rgba(255, 0, 0, .3)"
            }
        ],
        colorMajorTicks: "#1A237E",
        colorMinorTicks: "#303F9F",
        colorTitle: "#fff",
        colorUnits: "#000",
        colorNumbers: "#eee",
        colorPlate: "#7986CB",
        colorPlateEnd: "#3949AB",
        borderShadowWidth: 0,
        borders: false,
        borderRadius: 10,
        needleType: "arrow",
        needleWidth: 3,
        animationDuration: 1500,
        animationRule: "linear",
        colorNeedle: "#222",
        colorNeedleEnd: "",
        colorBarProgress: "#327ac0",
        colorBar: "#f5f5f5",
        barStroke: 0,
        barWidth: 8,
        barBeginCircle: false
    }).draw();

    var $i = 0;
    var $contador;
    function setContador() {
        $i++;
        $contador = setTimeout(function() {
                $('.contador').html('hace <b class="text-success">' + $i + '</b> segundos');
                setContador();
            }, 1000);
    }

    var $i_graph = 0;
    var $contador_graph;

    function setContadorGraph() {
        $i_graph++;
        $contador_graph = setTimeout(function() {
            $('.contadorGraph').html('hace <b class="text-success">' + $i_graph + '</b> segundos');
            setContadorGraph();
        }, 1000);
    }
    function obtenerGraficas() {
        getGraphRequest();
        setTimeout(function(){
            obtenerGraficas();
        }, 1000*35);
    }
    function getGraphRequest() {
        getChartData("temperatura");
        getChartData("termostato");
        getChartData("humedad");
        clearTimeout($contador_graph);
        setContadorGraph();
    }

    function obtenerValores() {
        getDataRequest();
        setTimeout(function(){
            obtenerValores();
        }, 1000*20);
    }

    function getDataRequest() {
        <?php echo 'var $numeroHabitacion = ' . $args[0] . ';' ?>
        $.ajax({
            type: 'POST',
            url: '/api/iot/' + $numeroHabitacion + '/obtenerDatos',
            data: "",
            success: function(data) {
                var $datos = (JSON.parse(data));
                if($datos.error) {
                    swal("Error IoT", "No se pudieron obtener los datos de la habitación, comprueba el ID de dispositivo", "error");
                    return false;
                }
                $('.contador').html('<span class="text-info">actualizando...</span>');
                $i = 0;
                clearTimeout($contador);
                setContador();
                gTemp.value = $datos[1]["last_value"];
                gTermostato.value = $datos[5]["last_value"];
                gHumedad.value = $datos[2]["last_value"];
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
                if($datos[6]["last_value"] === "1") {
                    $('#btnMiniSplit').html('Apagar');
                    $('#btnMiniSplit').removeClass('btn-success');
                    $('#btnMiniSplit').addClass('btn-danger');
                    $('#btnMiniSplit').attr('data-action', "0");
                } else {
                    $('#btnMiniSplit').html('Encender');
                    $('#btnMiniSplit').removeClass('btn-danger');
                    $('#btnMiniSplit').addClass('btn-success');
                    $('#btnMiniSplit').attr('data-action', "1");
                }
                if($datos[7]["last_value"] === "1") {
                    $('#btnTV').html('Apagar');
                    $('#btnTV').removeClass('btn-success');
                    $('#btnTV').addClass('btn-danger');
                    $('#btnTV').attr('data-action', "0");
                } else {
                    $('#btnTV').html('Encender');
                    $('#btnTV').removeClass('btn-danger');
                    $('#btnTV').addClass('btn-success');
                    $('#btnTV').attr('data-action', "1");
                }
            },
            error: function(xhr, type, exception) {
                swal("Error IoT", "No se pudieron obtener los datos de la habitación, comprueba el ID de dispositivo", "error");
            }
        });
    }

    $('#btnLuces').click(function() {
        var $this = $(this);
        $this.button('loading');
        var $accion = $(this).attr('data-action');
        <?php echo 'var $numeroHabitacion = ' . $args[0] . ';' ?>
            $.ajax({
            type: 'POST',
            url: '/api/iot/' + $numeroHabitacion + '/modificarDato/',
            data: "feed=" + "foco-1" + "&data=" + $accion,
            success: function(data) {
                if($accion === "1") {
                    swal("Foco encendido", "", "success");
                    $('#imgLuces').attr('src', "/public/img/light-on.png");
                    $this.removeClass('disabled').removeAttr('disabled').html('Apagar');
                    $this.removeClass('btn-success');
                    $this.addClass('btn-danger');
                    $this.attr('data-action', "0");
                } else {
                    swal("Foco apagado", "", "success");
                    $('#imgLuces').attr('src', "/public/img/light-off.png");
                    $this.removeClass('disabled').removeAttr('disabled').html('Encender');
                    $this.removeClass('btn-danger');
                    $this.addClass('btn-success');
                    $this.attr('data-action', "1");
                }
            },
            error: function(xhr, type, exception) {
                swal("Error IoT", "No se pudo realizar esta acción", "error");
            }
        });
    });

    $('#btnTV').click(function() {
        var $this = $(this);
        $this.button('loading');
        var $accion = $(this).attr('data-action');
        <?php echo 'var $numeroHabitacion = ' . $args[0] . ';' ?>
        $.ajax({
            type: 'POST',
            url: '/api/iot/' + $numeroHabitacion + '/modificarDato/',
            data: "feed=" + "tv" + "&data=" + $accion,
            success: function(data) {
                if($accion === "1") {
                    swal("TV encendida", "", "success");
                    $this.removeClass('disabled').removeAttr('disabled').html('Apagar');
                    $this.removeClass('btn-success');
                    $this.addClass('btn-danger');
                    $this.attr('data-action', "0");
                } else {
                    swal("TV apagada", "", "success");
                    $this.removeClass('disabled').removeAttr('disabled').html('Encender');
                    $this.removeClass('btn-danger');
                    $this.addClass('btn-success');
                    $this.attr('data-action', "1");
                }
            },
            error: function(xhr, type, exception) {
                swal("Error IoT", "No se pudo realizar esta acción", "error");
            }
        });
    });

    $('#btnMiniSplit').click(function() {
        var $this = $(this);
        $this.button('loading');
        var $accion = $(this).attr('data-action');
        <?php echo 'var $numeroHabitacion = ' . $args[0] . ';' ?>
        $.ajax({
            type: 'POST',
            url: '/api/iot/' + $numeroHabitacion + '/modificarDato/',
            data: "feed=" + "minisplit" + "&data=" + $accion,
            success: function(data) {
                if($accion === "1") {
                    swal("Clima encendido", "", "success");
                    $this.removeClass('disabled').removeAttr('disabled').html('Apagar');
                    $this.removeClass('btn-success');
                    $this.addClass('btn-danger');
                    $this.attr('data-action', "0");
                } else {
                    swal("Clima apagado", "", "success");
                    $this.removeClass('disabled').removeAttr('disabled').html('Encender');
                    $this.removeClass('btn-danger');
                    $this.addClass('btn-success');
                    $this.attr('data-action', "1");
                }
            },
            error: function(xhr, type, exception) {
                swal("Error IoT", "No se pudo realizar esta acción", "error");
            }
        });
    });

    function getChartData($feed) {
        <?php echo 'var $numeroHabitacion = ' . $args[0] . ';' ?>
        $.ajax({
            type: 'POST',
            url: '/api/iot/' + $numeroHabitacion + '/obtenerGrafica/',
            data: "feed=" + $feed,
            success: function(data) {
                if(data.code === 0) {
                    swal("Error IoT", "Error obteniendo gráficas", "error");
                } else {
                    $i_graph = 0;
                    var $datos = JSON.parse(data);
                    var $labels = [];
                    var $series = [];
                    $.each($datos["data"]["data"], function(i, item) {
                        var $fecha = new Date(item[0]);
                        $labels.push($fecha.getHours() + ":" + $fecha.getMinutes());
                       $series.push(item[1]);
                    });
                    construirChart($feed, $labels, $series);
                }
            },
            error: function(xhr, type, exception) {
                swal("Error IoT", "Error de servidor", "error");
            }
        });
    }

    function construirChart($id, $labels, $series) {
        var dataUso = {
            labels: $labels,
            series: [
                $series
            ]
        };
        var opciones = {
            low: 0,
            high: 100,
            showArea: false,
            height: "245px",
            axisX: {
                showGrid: true
            },
            lineSmooth: Chartist.Interpolation.simple({
                divisor: 3
            }),
            showLine: true,
            showPoint: true
        };
        var responsivo = [
            ['screen and (max-width: 640px)', {
                axisX: {
                    labelInterpolationFnc: function (value) {
                        return value[0];
                    }
                }
            }]
        ];
        Chartist.Line("#chart_" + $id, dataUso, opciones, responsivo);
    }
</script>
