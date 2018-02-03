<?php include "includes/header.php" ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-home fa-fw"></i> Inicio</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="card card-user">
            <div class="image">
                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
            </div>
            <div class="content">
                <div class="author">
                    <a href="#">
                        <img class="avatar border-gray" src="/public/img/logo.png" alt="..."/>
                        <h4 class="title"><?php echo $args["data"][0]["nombre_hotel"];?> <br />
                        </h4>
                        <p class="text-muted"><?php echo $args["data"][0]["correo"]; ?></p>
                    </a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Mandar aviso rápido</h4>
                <p class="category">Aviso</p>
            </div>
            <div class="content">
                <div class="form-group">
                    <label for="mensajeGSM">Escribir Mensaje</label>
                    <textarea style="resize: none;" class="form-control" id="mensajeGSM" rows="3" draggable="false"></textarea>
                </div>
                <a href="#" class="btn btn-fill btn-warning" id="enviarMensajeGSM"> <i class="fa fa-paper-plane fa-lg"></i>&nbsp; Mandar aviso</a>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="row">

            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="card-icon">
                                    🛌
                                </div>
                            </div>
                            <div class="col-sm-7">
                                    <h4 class="title">Habitaciones libres</h4>
                                    <h2 class="title text-success">4</h2>
                            </div>
                        </div>
                        <div class="footer">
                            <div class="stats">
                                <a href="/dashboard/habitaciones" class="btn btn-success btn-xs">
                                    <i class="fa fa-link fa-fw"></i> Ver habitaciones</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="card-icon">
                                    📝
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <h4 class="title">Solicitudes de limpieza</h4>
                                <h2 class="title text-warning">1</h2>
                            </div>
                        </div>
                        <div class="footer">
                            <div class="stats">
                                <a href="/dashboard/limpieza" class="btn btn-warning btn-xs">
                                    <i class="fa fa-link fa-fw"></i> Ver solicitudes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="card-icon">
                                    👨‍👩‍👧‍👦
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <h4 class="title">Huespedes hospedados</h4>
                                <h2 class="title text-primary">5</h2>
                            </div>
                        </div>
                        <div class="footer">
                            <div class="stats">
                                <a href="/dashboard/huespedes" class="btn btn-primary btn-xs">
                                    <i class="fa fa-link fa-fw"></i> Administrar huespedes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="card-icon">
                                    📬
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <h4 class="title">Mensajes recibidos</h4>
                                <h2 class="title text-info">2</h2>
                            </div>
                        </div>
                        <div class="footer">
                            <div class="stats">
                                <a href="/dashboard/mensajes" class="btn btn-info btn-xs">
                                    <i class="fa fa-envelope-open fa-fw"></i> Ver mensajes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Comportamiento de usuarios</h4>
                        <p class="category">24 Horas</p>
                    </div>
                    <div class="content">
                        <div id="chartHours" class="ct-chart"></div>
                        <div class="footer">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> Uso de la app
                                <i class="fa fa-circle text-danger"></i> Solicitud Transporte
                                <i class="fa fa-circle text-warning"></i> Solicitud Limpieza
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i> Actualizado hace (1) min
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<?php include "includes/footer.php" ?>
    <script type="text/javascript">
    var dataUso = {
        labels: ['7:00AM', '8:00AM', '9:00AM', '10:00AM', '11:00AM', '12:00PM', '1:00PM', '2:00PM'],
        series: [
            [10, 6, 9, 6, 4, 3, 2, 25, 32],
            [2, 1, 2, 0, 1, 1, 2, 10, 16],
            [5, 2, 3, 1, 2, 1, 0, 0, 0]
        ]
    };
    var opciones = {
        lineSmooth: true,
        low: 0,
        high: 35,
        showArea: true,
        height: "245px",
        axisX: {
            showGrid: false,
        },
        lineSmooth: Chartist.Interpolation.simple({
            divisor: 3
        }),
        showLine: true,
        showPoint: true,
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

    Chartist.Line('#chartHours', dataUso, opciones, responsivo);
</script>