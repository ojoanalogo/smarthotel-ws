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
                    <li style="cursor:pointer; margin-top:5px;"><div class="input-group">
                            <span class="input-group-addon">Fecha &nbsp;</span>
                            <input type="text" name="bed_date" id="datepicker" value="<?php echo date("Y-m-d")?>" class="form-control text-info" autocomplete="off">
                        </div>
                        <button name="show_data" class="btn btn-default "><i class="fa fa-search"></i> Buscar</button></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </div>
</form>
<div class="panel panel-default">
    <div class="panel-heading">
        Piso 1
    </div>
    <div class="panel-body">
        <div class="col-md-3"><div class="panel habitacion-disponible">
                <div class="panel-heading">103<span class="pull-right"><span class="label label-default">Cama doble</span></span></div>
                <div class="table-responsive">
                    <table width="100%" border="0" class="table">
                        <tr>
                            <td><i class="fa fa-user" title="Huesped"></i>&nbsp;<strong>-</strong></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-clock-o" title="Hora"></i>&nbsp;<strong>-</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="btn btn-fill btn-success"
                                   style="color:#FFF; background-color: #5cb85c;" title="Check-In">
                                    <i class="fa fa-bookmark-o"></i> Check-In</a>
                                <a href="/dashboard/habitaciones/detalle/103" class="btn btn-fill"
                                   style="color:#FFF; background-color: #009688;" title="Detalles">
                                    <i class="fa fa-dashboard"></i> Detalles habitación</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-3"><div class="panel habitacion-disponible">
                <div class="panel-heading">104<span class="pull-right"><span class="label label-default">Cama doble</span></span></div>
                <div class="table-responsive">
                    <table width="100%" border="0" class="table">
                        <tr>
                            <td><i class="fa fa-user" title="Huesped"></i>&nbsp;<strong>-</strong></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-clock-o" title="Hora"></i>&nbsp;<strong>-</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="btn btn-fill btn-success"
                                   style="color:#FFF; background-color: #5cb85c;" title="Check-In">
                                    <i class="fa fa-bookmark-o"></i> Check-In</a>
                                <a href="#" class="btn btn-fill"
                                   style="color:#FFF; background-color: #009688;" title="Detalles">
                                    <i class="fa fa-dashboard"></i> Detalles habitación</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-3"><div class="panel habitacion-disponible">
                <div class="panel-heading">105<span class="pull-right"><span class="label label-default">Cama doble</span></span></div>
                <div class="table-responsive">
                    <table width="100%" border="0" class="table">
                        <tr>
                            <td><i class="fa fa-user" title="Huesped"></i>&nbsp;<strong>-</strong></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-clock-o" title="Hora"></i>&nbsp;<strong>-</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="btn btn-fill btn-success"
                                   style="color:#FFF; background-color: #5cb85c;" title="Check-In">
                                    <i class="fa fa-bookmark-o"></i> Check-In</a>
                                <a href="#" class="btn btn-fill"
                                   style="color:#FFF; background-color: #009688;" title="Detalles">
                                    <i class="fa fa-dashboard"></i> Detalles habitación</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        Piso 2
    </div>
    <div class="panel-body">

        <div class="col-md-3"><div class="panel habitacion-ocupada">
                <div class="panel-heading">220<span class="pull-right"><span class="label label-default">Cama sencilla</span></span></div>
                <div class="table-responsive">
                    <table width="100%" border="0" class="table">
                        <tr>
                            <td><i class="fa fa-user" title="Huesped"></i>&nbsp;<strong>Alfonso Reyes</strong></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-clock-o" title="Hora"></i>&nbsp;<strong>2 días</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="btn btn-fill btn-danger"
                                   style="color:#FFF; background-color: #ff7200;" title="Check-Out">
                                    <i class="fa fa-bookmark-o"></i> Check-Out</a>
                                <a href="#" class="btn btn-fill"
                                   style="color:#FFF; background-color: #009688;" title="Detalles">
                                    <i class="fa fa-dashboard"></i> Detalles habitación</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-3"><div class="panel habitacion-disponible">
                <div class="panel-heading">221<span class="pull-right"><span class="label label-default">Cama doble</span></span></div>
                <div class="table-responsive">
                    <table width="100%" border="0" class="table">
                        <tr>
                            <td><i class="fa fa-user" title="Huesped"></i>&nbsp;<strong>-</strong></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-clock-o" title="Hora"></i>&nbsp;<strong>-</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="btn btn-fill btn-success"
                                   style="color:#FFF; background-color: #5cb85c;" title="Check-In">
                                    <i class="fa fa-bookmark-o"></i> Check-In</a>
                                <a href="#" class="btn btn-fill"
                                   style="color:#FFF; background-color: #009688;" title="Detalles">
                                    <i class="fa fa-dashboard"></i> Detalles habitación</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<table width="50%" border="0" align="center">
    <tr>
        <td>
            <div class="row">
                <div class="col-md-4" style="color:#5cb85c"><i class="fa fa-circle"></i>&nbsp;Disponible</div>
                <div class="col-md-4" style="color:#d9534f"><i class="fa fa-circle"></i>&nbsp;Ocupada</div>
                <div class="col-md-4" style="color:#ff7200"><i class="fa fa-circle"></i>&nbsp;Reservada</div>
            </div>
        </td>
    </tr>
</table>
<?php include "includes/footer.php" ?>
<script>
    $('#datepicker').datepicker({
        format: "yyyy-mm-dd"
    });
</script>