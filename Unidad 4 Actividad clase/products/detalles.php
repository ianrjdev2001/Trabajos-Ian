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

                <!-- BREAD -->
                <div class="border-bottom">
                    <div class="row m-2">
                        <div class="col">
                            <h4>Productos</h4>
                        </div>
                        <div class="col">
                            <button class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#añadirModal">Añadir producto</button>
                        </div>
                    </div>
                </div>

                <!-- CARD -->
                <div class="row">
                    <div class="col-md-4 p-2">
                        <div class="card mb-1" style="width: 18rem;">
                            <img src="../public/img/marca-de-la-senal.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">Card title</h5>
                                <h6 class="card-subtitle text-center">Botanas</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>