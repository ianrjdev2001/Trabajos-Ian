<?php 
    include '../app/ProductosController.php';
    $producto = new ProductosController;
    $productos = $producto->listaProductos();
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
                <?php foreach($productos as $lista):?> 
                    <div class="col-md-3 p-2">
                        <div class="card mb-1" style="width: 18rem;">
                        <img src="<?php echo $lista->cover ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $lista->id ?></h5>
                            <h5 class="card-title text-center"><?php echo $lista->name ?></h5>
                            <p class="card-text"><?php echo $lista->description ?></p>
                            <div class="row">
                                <a class="btn btn-warning col-6" data-bs-toggle="modal" data-bs-target="#editarModal">Editar</a>
                                <a href="#" class="btn btn-danger col-6" onclick="remove(this)">Eliminar</a>
                                <a href="detalles.php" class="btn btn-info col-12">Detalles</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?> 
                </div>
                
            </div>
        </div>
    </div>
    
    <?php include "../layouts/scripts.template.php" ?>
    <script>
        function remove (target) {
            swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                });
            } else {
                swal("Your imaginary file is safe!");
            }
            });
        }
    </script>
</body>
</html>