<?php require_once "controllers/index_controller.php";

$ok = true; // bandera de impresion de cards
?>

<!doctype html>
<html lang="es">

<head>
  <title>Comilones</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <!-- Theme Style -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <header role="banner">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand absolute" href="index.php">Comilones</a>
        <!-- logo -->
        <div>
          <img src="img/comilones_logo.png" alt="logo comilones" style="height: 50px; margin-bottom: 1em;">
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="blog.html">Blog Culinario</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">Sobre nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contacto</a>
            </li>
          </ul>
          <ul class="navbar-nav absolute-right">
            <li>
              <a href="login.html">Empresas</a> / <a href="register.html">Registro</a>
            </li>
          </ul>

        </div>
      </div>
    </nav>
  </header>
  <!-- END header -->

  <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(img/big_image_2.jpg);" alt="Imagen principal del sitio">
    <div class="container">
      <div class="row align-items-center justify-content-center site-hero-inner">
        <div class="col-md-10">

          <div class="mb-5 element-animate">
            <div class="block-17">
              <h2 class="heading text-center mb-4">¿Dónde te gustaría comer?</h2>

              <!-- buscador -->

              <form class="d-block d-lg-flex mb-4">
                <div class="fields d-block d-lg-flex">
                  <div class="textfield-search one-third">

                    <input type="text" name="name" class="form-control" placeholder="Nombre">
                  </div>

                  <div class="textfield-search one-third">

                    <input type="text" name="localidad" class="form-control" placeholder="Localidad"></div>


                  <div class="select-wrap one-third">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="precios" id="" class="form-control">
                      <option>Precios</option>
                      <option>Hasta 20 euros</option>
                      <option>Entre 20 y 50 euros</option>
                      <option>Más de 50 euros</option>
                    </select>
                  </div>

                  <div class="select-wrap one-third">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="tipo_cocina" id="" class="form-control">
                      <option>Cocina</option>
                      <option>Mallorquina</option>
                      <option>Italiana</option>
                      <option>Alta Cocina</option>
                      <option>China</option>
                    </select>
                  </div>

                  <div class="select-wrap one-third">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="valoracion" id="" class="form-control">
                      <option>Estrellas</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div>

                <input type="submit" name="submit" class="search-submit btn btn-primary" value="Buscar">
              </form>

              <p class="text-center mb-5">Más de quinientos restaurantes de Mallorca a tu disposicion</p>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- END section -->





  <div class="site-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 element-animate">
        <div class="col-md-7 text-center section-heading">
          <h2 class="text-primary heading">Restaurantes recomendados</h2>

        </div>
      </div>
    </div>

    <div class="container-fluid block-11 element-animate">
      <div class="nonloop-block-11 owl-carousel">

        <!-- RESTAURANTS ITEMS -->



        <?php while ($value = $result->fetch_array(MYSQLI_ASSOC)) {

          // isprecio activated?
          if (isset($_GET['precios']) && ($_GET['precios'] != "Precios")) {

            if ($_GET['precios'] == "Más de 50 euros") {

              if (intval($value['precios']) > 50) {
                $ok = true;
              } else {
                echo $value['precios'] . " ";
                $value['tipo_cocina'] = 'anulado';
                $value['valoracion'] = 'anulado';
                $ok = false;
              }
            } elseif ($_GET['precios'] == "Hasta 20 euros") {

              if (intval($value['precios']) <= 20) {
                $ok = true;
              } else {
                echo $value['precios'] . " ";
                $value['tipo_cocina'] = 'anulado';
                $value['valoracion'] = 'anulado';
                $ok = false;
              }
            } elseif ($_GET['precios'] == "Entre 20 y 50 euros") {

              if (intval($value['precios']) > 20 && intval($value['precios']) <= 50) {
                $ok = true;
              } else {
                echo $value['precios'] . " ";
                $value['tipo_cocina'] = 'anulado';
                $value['valoracion'] = 'anulado';
                $ok = false;
              }
            }
          }

             // is_cocina activated?
             if (isset($_GET['tipo_cocina']) && ($_GET['tipo_cocina'] != "Cocina")) {

              if ($value['tipo_cocina'] == $_GET['tipo_cocina']) {
                $ok = true;
              } else {
                $ok = false;
              }
            }

          // isvaloracion activated?
          if (isset($_GET['valoracion']) && ($_GET['valoracion'] != "Estrellas")) {

            if ((intval($value['valoracion'])) == (intval($_GET['valoracion']))) {
              $ok = true;
            } else {


              $value['tipo_cocina'] = 'anulado';

              $ok = false;
            }
          }

       
        

          if ($ok) {
        ?>
            <!-- tarjet Restaurant -->
            <div class="item">
              <div class="block-19 ">
                <figure>
                  <img class="img-fluid" src="<?= $value['foto'] ?>" alt="Foto de <?= $value['name'] ?>">
                </figure>
                <div class="text">
                  <h2 class="heading"><a href="res-single.php?id=<?= $value['id'] ?>"><?= $value['name'] ?></a></h2>
                  <p class="mb-4">Localidad: <?= $value['localidad'] ?>.</p>
                  <p>Tipo de cocina: <?= $value['tipo_cocina'] ?>.</p>
                  <div class="meta d-flex align-items-center">
                    <div class="number">
                      <span> Coste por persona: <?= $value['precios'] ?> </span>
                    </div>
                    <div class="price text-right"> Valoracion <span><?= $value['valoracion'] ?></span></div>
                  </div>
                </div>

              </div>

            </div>

        <?php  }
        } // fin del bucle.
        // Close and free result
        $result->close();

        mysqli_close($conn);  ?>



        <!-- FIN RESTAURANTS ITEMS -->




      </div>
      <!-- END section -->



      <footer class="site-footer">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
              <h3>Comilones</h3>
              <p>Comilones no se hacen responsable de lo que opinen los comilones. Sobretodo si escriben con la boca llena</p>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
              <h3 class="heading">Menu rápido</h3>
              <div class="row">
                <div class="col-md-6">
                  <ul class="list-unstyled">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Sobre Nosotros</a></li>
                    <li><a href="#">Blog de cocina</a></li>
                    <li><a href="#">Contacto</a></li>
                  </ul>
                </div>
                <div class="col-md-6">

                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
              <h3 class="heading">Blog de cocina</h3>
              <div class="block-21 d-flex mb-4">
                <div class="text">
                  <h3 class="heading mb-0"><a href="#">Comida sana rápida</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="ion-android-calendar"></span> May 29, 2018</a></div>
                    <div><a href="#"><span class="ion-android-person"></span> Admin</a></div>
                    <div><a href="#"><span class="ion-chatbubble"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 d-flex mb-4">
                <div class="text">
                  <h3 class="heading mb-0"><a href="#">Recetas Post-covid</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="ion-android-calendar"></span> May 29, 2018</a></div>
                    <div><a href="#"><span class="ion-android-person"></span> Admin</a></div>
                    <div><a href="#"><span class="ion-chatbubble"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 d-flex mb-4">
                <div class="text">
                  <h3 class="heading mb-0"><a href="#">Cocina Mallorquina: La Sopa de Nadal</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="ion-android-calendar"></span> May 29, 2018</a></div>
                    <div><a href="#"><span class="ion-android-person"></span> Admin</a></div>
                    <div><a href="#"><span class="ion-chatbubble"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
              <h3 class="heading">Otras vias de contacto</h3>
              <div class="block-23">
                <ul>
                  <li><span class="icon ion-android-pin"></span><span class="text">Calle Manacor nº 43 1º B, Palma de Mallorca, Islas Baleares, España</span></li>
                  <li><a href="#"><span class="icon ion-ios-telephone"></span><span class="text">+34 622 646 626</span></a></li>
                  <li><a href="#"><span class="icon ion-android-mail"></span><span class="text">flopez@cifpfbmoll.eu</span></a></li>

                </ul>
              </div>
            </div>
          </div>
          <div class="row pt-5">
            <div class="col-md-12 text-center copyright">

              <p class="float-md-left">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                  document.write(new Date().getFullYear());
                </script> Diseñado y programado por <strong>Superloper Developer</strong> | Template original de <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
              <p class="float-md-right">
                <a href="#" class="fa fa-facebook p-2"></a>
                <a href="#" class="fa fa-twitter p-2"></a>
                <a href="#" class="fa fa-linkedin p-2"></a>
                <a href="#" class="fa fa-instagram p-2"></a>

              </p>
            </div>
          </div>
        </div>
      </footer>
      <!-- END footer -->

      <!-- loader -->
      <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
          <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
          <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214" /></svg></div>

      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/jquery-migrate-3.0.0.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/jquery.waypoints.min.js"></script>
      <script src="js/jquery.stellar.min.js"></script>
      <script src="js/jquery.animateNumber.min.js"></script>

      <script src="js/jquery.magnific-popup.min.js"></script>

      <script src="js/main.js"></script>
</body>

</html>