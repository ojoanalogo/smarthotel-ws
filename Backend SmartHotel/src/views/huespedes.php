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
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
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
    <tr id="u1">
        <td align="center">1</td>
        <td>&nbsp;<span data-toggle="tooltip" data-placement="right" title="Nombre">Alfonso</span></td>
        <td>Reyes</td>
        <td align="center" valign="middle">6677749291</td>
        <td align="center" valign="middle">
            <a href="#" class="btn btn-xs btn-fill btn-primary"><i class="fa fa-list"></i> Historial</a>
            <a data-toggle="modal" data-target="#editar_usuario" data-id="1" class="btn btn-xs btn-fill btn-primary" style="color:#FFF;"><i class="fa fa-edit fa-fw"></i> Edit</a>
            <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Eliminar</button></td>
    </tr>
    </tbody>
</table>

<?php include "includes/footer.php" ?>
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>