<?php 
    include '../app/ProductosController.php';
    $producto = new ProductosController;
    $productos = $producto->listaProductos();
    $brands = $producto->getBrands();
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
                            <h5 class="card-title text-center"><?php echo $lista->name ?></h5>
                            <h6 class="card-title text-center"><?php echo ($lista->brand == null ? "No selecciono categoria" : $lista->brand->name) ?></h6>
                            <p class="card-text"><?php echo $lista->description ?></p>
                            <div class="row">
                                <a class="btn btn-warning col-6" data-bs-toggle="modal" data-bs-target="#editarModal">Editar</a>
                                <a class="btn btn-danger col-6" onclick="remove(<?php echo $lista->id ?>)">Eliminar</a>
                                <a href="detalles.php?slug=<?php echo $lista->slug ?>" class="btn btn-info col-12">Detalles</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?> 
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: "AÑADIR" -->
    <div class="modal fade" id="añadirModal" tabindex="-1" aria-labelledby="añadirModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="añadirModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method ="post" action="../app/ProductosController.php" enctype ="multipart/form-data">
                <div class="modal-body">        

                        <div class="input-group mb-3">
                            <input type="file" name="img_producto">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Product name">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input id="slug" type="text" name="slug" class="form-control" placeholder="Product slug">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input id="description" type="text" name="description" class="form-control" placeholder="Product description">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input id="features" type="text" name="features" class="form-control" placeholder="Product features">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <select name="brand_id" class="form-control">
                                <?php foreach ($brands as $brand) 
                                { ?>
                                    <option value="<?php echo $brand->id; ?>"><?php echo $brand->name; ?></option>
                                <?php 
                            }?>
                            </select>
                        </div>
                </div>
                <input id="inputOculto" type="hidden" name="action" value="">
                <input type="hidden" id="id" name="id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Modal: "EDITAR" -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php for ($i=0; $i < 6; $i++) {?> 
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="* * * * *" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                <?php } ?> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <?php include "../layouts/scripts.template.php" ?>
    <script>
        function remove (id) {
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
            var bodyFormData = new FormData();
            bodyFormData.append('id', id);
            bodyFormData.append('action', 'delete');
            axios.post('../app/ProductosController.php', bodyFormData)
            .then(function (response) {
                console.log(response);
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
            });
        } else {
            swal("Your imaginary file is safe!");
        }
        });
    }
    </script>
</body>
</html>