<?php require 'controllers/usuarios_controller.php';

if (isset($_GET['comilon'])) {
    $mensaje = 'Registro de críticos culinarios';
} else {
    $mensaje = 'Acceso para restaurantes';
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cartas QR - Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- Theme style -->
    <link rel="stylesheet" href="./admin/css/adminlte.min.css">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="./admin/css/estilos.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Sweet Alert 2 -->
    <script src="./admin/plugins/sweetalert2/sweetalert2.all.js"></script>
</head>




<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="admin/img/comilones_logo.png" alt="logo de comilones">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg"><?= $mensaje ?></p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="pass">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col">
                            <button data-toggle="modal" data-target="#staticBackdrop" class="btn btn-primary btn-block">Acceder</button>
                        </div>

                        <!-- /.col -->
                    </div>

                </form>
                <!-- Desabilitado el acceso al Back -->
                <?php
                // $login = new UsuariosController();
                // $login->loginUsuarioCtr();
                ?>

                <p class="mb-1 text-center mt-3"><a href="#" data-toggle="modal" data-target="#staticBackdrop">¿Ha olvidado la contraseña?</a></p>
                <p class="mb-1 text-center mt-3"><a href="#" data-toggle="modal" data-target="#staticBackdrop">¿No tiene cuenta? Registrese</a></p>


                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">No está habilitado al ser el proyecto de mi módulo de prácticas </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Si desea contactar conmigo <a href="mailto:cainuriel@gmail.com"> cainuriel@gmail.com </a>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <a href="quiensoy.php" class="btn btn-danger">Quien soy </a>
                            </div>
                        </div>
                    </div>

                    </a>
                    </nav>
                </div>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


    <?php if (isset($_GET['comilon'])) { ?>

        <div class="login-box">

            <!-- warning -->
            <div class="card">
                <div class="card-body login-card-body">
                    <h3>Para poder criticar a un restaurante <strong>se ha de añadir la clave que aparece en el ticket.</strong></h3>
                    <h4> No sería honesto críticar sin haber comido ¿Verdad?</h4>

                </div>

            </div>
        </div>
        <!-- /warning -->

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <?php } // no cerramos el php para que no se introduzca posible codigo malicioso
