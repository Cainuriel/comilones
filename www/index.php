<?php require_once "controllers/index_controller.php"; ?>




<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles/index_styles.css">
    <!-- <link rel="stylesheet" href="styles\index_responsive.css"> -->

    <title>Comilones</title>
</head>

<body>

    <div class="container mb-3">

        <!-- Menu navegacion -->

        <header class="header_content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="logo">
                    <img src="img/comilones_logo.png" alt="">
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item main_nav_item active">
                            <a class="nav-link " href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item main_nav_item">
                            <a class="nav-link" href="#">Guia</a>
                        </li>

                        <li class="nav-item main_nav_item">
                            <a class="nav-link" href="#">Formulario</a>
                        </li>

                        <li class="nav-item main_nav_item">
                            <a class="nav-link" href="#">Quienes somos</a>
                        </li>

                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>

        </header>

        <!-- fin  Menu navegacion -->
    </div>

    <div class="container my-5">

        <!-- Formulario filtrado -->

        <section class="header_content">
            <form>
                <div class="row form-group">
                    <div class="col-3 form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId2" placeholder="">
                        <small id="helpId2" class="form-text text-muted">Busqueda por nombre</small>
                    </div>

                    <div class="col-3 form-group">
                        <label for="localidad">Localidad:</label>
                        <input type="text" class="form-control" name="localidad" id="localidad" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">Solo islas Baleares</small>
                    </div>

                    <label class="my-1 mx-2" for="precios">Precio medio por persona:</label>
                    <select class=" col-3 form-control" name="precios" id="precios">
                        <option>Indiferente</option>
                        <option>hasta 20 euros</option>
                        <option>entre 50 y 100 euros</option>
                        <option>más de 100 euros</option>
                    </select>


                    <label class="my-1 mx-5" for="valoracion">Valoración: </label>
                    <select class="col-3 form-control" name="valoracion" id="valoracion">
                        <option>Indiferente</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>

                    <label class="my-1 mx-5" for="tipo_cocina">Tipo de cocina</label>
                    <select class="col-3 form-control" name="tipo_cocina" id="tipo_cocina">
                        <option>Indiferente</option>
                        <option>Mallorquina</option>
                        <option>Francesa</option>
                        <option>Italiana</option>
                        <option>Francesa</option>
                        <option>Casera</option>
                    </select>



                    <div class="col-3 form-group">
                        <button name="submit" type="submit" class="btn btn-primary">Buscar</button>
                    </div>

                </div>
            </form>
        </section>
    </div>

    <main class="container my-5">

        <!-- Tarjetas restaurantes -->

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

            <?php while ($value = $result->fetch_array(MYSQLI_ASSOC)) { ?>

                <div class="col mb-4 header_content">
                    <div class="card h-100">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $value['name'] ?></h5>
                            <p class="card-text">Localidad: <?= $value['localidad'] ?>.</p>
                            <p class="card-text">Coste por persona: <?= $value['precios'] ?>.</p>
                            <p class="card-text">Tipo de cocina: <?= $value['tipo_cocina'] ?>.</p>
                            <p class="card-text">Valoración: <?= $value['valoracion'] ?>.</p>
                        </div>
                    </div>
                </div>


            <?php  }
            // Close and free result
            $result->close();

            mysqli_close($conn);  ?>

        </div>

        <!--  fin Tarjetas restaurantes -->
    </main>

    <div class="container">

        <div class="row">

            <!-- Footer page-footer font-small blue footer -->
            <footer class="col">

                <!-- Copyright -->
                <div class="footer-copyright text-center py-3">© 2020 Copyright:
                    <a href="https://github.com/Cainuriel"> Superloper Developer</a>
                </div>
                <!-- Copyright -->

            </footer>
            <!-- Footer -->
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>