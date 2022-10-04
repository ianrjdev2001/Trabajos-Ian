<?php 
    include '../app/ProductosController.php';
    $producto_slug = new ProductosController;
    if (isset($_GET['slug'])){
        $slug = $_GET['slug'];
    }
    $detalle_producto = $producto_slug -> getDetail($slug);
    //var_dump($detalle_producto);
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
                </div>
                <div class="col-md-6 col-sm-10 py-4">
                        <h5 class="card-title text-center mt-2"><?php echo $detalle_producto->name ?></h5>
                        <h6 class="mt-2">Descripcion</h6>
                        <p><?php echo $detalle_producto->description ?></p>
                        <p>Marca: <?php echo ($detalle_producto->brand == null ? "No tiene categoria" : $detalle_producto->brand->name) ?></p>
                        <p>Etiquetas:</p>
                        <ul>                            
                            <?php foreach ($detalle_producto->tags as $tag) 
                            {?>
                                <li> <?php echo $tag->name ?> </li>
                            <?php } ?>
                        </ul>
                        <p>Categorias:</p>
                        <ul>                            
                            <?php foreach ($detalle_producto->categories as $category) 
                            {?>
                                <li> <?php echo $category->name ?> </li>
                            <?php 
                            } ?>
                        </ul>
                        <p>Features:</p>
                            <?php echo $detalle_producto->features ?>
                    </div>
            </div>
        </div>
        
    </div>
