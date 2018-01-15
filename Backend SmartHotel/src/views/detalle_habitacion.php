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
<?php include "includes/footer.php" ?>