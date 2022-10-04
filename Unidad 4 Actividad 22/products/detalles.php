<?php 
    include '../app/ProductosController.php';
    $producto_slug = new ProductosController;
    $detalle_producto = $producto_slug -> getDetail(isset($_GET['slug']));
    var_dump($detalle_producto);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../layouts/head.template.php" ?>
</head>
<body>
    <!-- NAVBAR -->
    <?php include "../layouts/nav.template.php" ?>

    <!-- CONTAINER -->
    <div class="container-fluid">

        <div class="row">
            <!-- SIDEBAR -->
            <?php include "../layouts/sidebar.template.php" ?>

            <!-- CONTENT -->
            <div class="col-lg-10 col-sm-12 bg-white">

                <!-- CARD -->
                <div class="col-md-3 p-2">
                    <img src="<?php echo $detalle_producto->cover?>" class="card-img-top"  alt="...">
                    <label class="card-title text-center"><?php echo $detalle_producto->name ?></label>
                </div>
            </div>
        </div>
        
    </div>
