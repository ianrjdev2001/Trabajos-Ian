<?php
    include_once "app/config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al panel</title>
    <!--script src="https://cdn.tailwindcss.com"></script-->
    <!--link rel="stylesheet" href="public/css/main.css"-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /*.login {
            background-color: blue; 
        }*/
        .row {
            height: 500px;
        }
    </style>
</head>
<body>
    <div class="container">
        <section>
            <div class="row justify-content-md-center align-items-center">
                <div class="col-md-6 col-lg-6 col-sm-12 login border">
                    <h1 class="text-center mt-3">Acceso al panel</h1>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus, fugiat. Obcaecati enim laborum, quod minus illum at dolore repudiandae asperiores distinctio quo dolorum veritatis animi excepturi expedita praesentium quaerat illo.
                    </p>
                    <!--form action="products/index.php" class="form"-->
                    <form method="post" action="app/AuthController.php" class="form">
                        <div>
                            <label for="">Correo electrónico</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input name="email" type="text" class="form-control" placeholder="username@fakemail.com" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div>
                            <label for="">Contraseña</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input name="password"  type="text" class="form-control" placeholder="* * * * *" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary col-12 mb-4">Acceder</button>
                        <input type="hidden" value="access" name="action">
                        <input type="hidden" name="global_token" value="<?=$_SESSION['global_token'] ?>">
                    </form>
                </div>
            </div>
        </section>
    
        <!-- Login anterior
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-4 card">
                <form>
                    <fieldset>
                        <div class="text-center mt-4">
                            <h1>Login</h1>
                            <legend >Datos de acceso</legend>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Email:</label>
                                <input type="text" name="" placeholder="write here" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Password:</label>
                                <input type="password" name="" placeholder="* * * * *" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit">Acceder</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>