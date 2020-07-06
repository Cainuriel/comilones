<?php require_once "controllers/index_controller.php";

$ok = true; // bandera de impresion de cards
?>

<!doctype html>
<html lang="es">

<head>
  <title>Free Education Template by Colorlib</title>
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
        <a class="navbar-brand absolute" href="index.html">Comilones</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link active" href="index.html">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="courses.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Courses</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="courses.html">HTML</a>
                <a class="dropdown-item" href="courses.html">WordPress</a>
                <a class="dropdown-item" href="courses.html">Laravel</a>
                <a class="dropdown-item" href="courses.html">JavaScript</a>
                <a class="dropdown-item" href="courses.html">Python</a>
              </div>

            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
              <div class="dropdown-menu" aria-labelledby="dropdown05">
                <a class="dropdown-item" href="#">HTML</a>
                <a class="dropdown-item" href="#">WordPress</a>
                <a class="dropdown-item" href="#">Laravel</a>
                <a class="dropdown-item" href="#">JavaScript</a>
                <a class="dropdown-item" href="#">Python</a>
              </div>

            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
          </ul>
          <ul class="navbar-nav absolute-right">
            <li>
              <a href="login.html">Login</a> / <a href="register.html">Register</a>
            </li>
          </ul>

        </div>
      </div>
    </nav>
  </header>
  <!-- END header -->

  <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(img/big_image_2.jpg);">
    <div class="container">
      <div class="row align-items-center justify-content-center site-hero-inner">
        <div class="col-md-10">

          <div class="mb-5 element-animate">
            <div class="block-17">
              <h2 class="heading text-center mb-4">¿Dónde te gustaría comer?</h2>
              <form action="" method="post" class="d-block d-lg-flex mb-4">
                <div class="fields d-block d-lg-flex">
                  <div class="textfield-search one-third"><input type="text" class="form-control" placeholder="Keyword search..."></div>
                  <div class="select-wrap one-third">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="" id="" class="form-control">
                      <option value="">Category Course</option>
                      <option value="">Laravel</option>
                      <option value="">PHP</option>
                      <option value="">JavaScript</option>
                      <option value="">Python</option>
                    </select>
                  </div>
                  <div class="select-wrap one-third">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="" id="" class="form-control">
                      <option value="">Difficulty</option>
                      <option value="">Beginner</option>
                      <option value="">Intermediate</option>
                      <option value="">Advance</option>
                    </select>
                  </div>
                </div>
                <input type="submit" class="search-submit btn btn-primary" value="Search">
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
          if (isset($_GET['precios']) && ($_GET['precios'] != "Indiferente")) {

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

          // isvaloracion activated?
          if (isset($_GET['valoracion']) && ($_GET['valoracion'] != "Indiferente")) {

            if ((intval($value['valoracion'])) == (intval($_GET['valoracion']))) {
              $ok = true;
            } else {


              $value['tipo_cocina'] = 'anulado';

              $ok = false;
            }
          }

          // is_cocina activated?
          if (isset($_GET['tipo_cocina']) && ($_GET['tipo_cocina'] != "Indiferente")) {

            if ($value['tipo_cocina'] == $_GET['tipo_cocina']) {
              $ok = true;
            } else {
              $ok = false;
            }
          }


          if ($ok) {
        ?>

            <div class="item">
              <div class="block-19">
                <figure>
                  <img class="img-fluid" src="<?= $value['foto'] ?>" alt="Foto de <?= $value['name'] ?>">
                </figure>
                <div class="text">
                  <h2 class="heading"><a href="#"><?= $value['name'] ?></a></h2>
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
              <h3>University</h3>
              <p>Perferendis eum illum voluptatibus dolore tempora consequatur minus asperiores temporibus.</p>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
              <h3 class="heading">Quick Link</h3>
              <div class="row">
                <div class="col-md-6">
                  <ul class="list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">Pages</a></li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul class="list-unstyled">
                    <li><a href="#">News</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Privacy</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
              <h3 class="heading">Blog</h3>
              <div class="block-21 d-flex mb-4">
                <div class="text">
                  <h3 class="heading mb-0"><a href="#">Consectetur Adipisicing Elit</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="ion-android-calendar"></span> May 29, 2018</a></div>
                    <div><a href="#"><span class="ion-android-person"></span> Admin</a></div>
                    <div><a href="#"><span class="ion-chatbubble"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 d-flex mb-4">
                <div class="text">
                  <h3 class="heading mb-0"><a href="#">Dolore Tempora Consequatur</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="ion-android-calendar"></span> May 29, 2018</a></div>
                    <div><a href="#"><span class="ion-android-person"></span> Admin</a></div>
                    <div><a href="#"><span class="ion-chatbubble"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 d-flex mb-4">
                <div class="text">
                  <h3 class="heading mb-0"><a href="#">Perferendis eum illum</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="ion-android-calendar"></span> May 29, 2018</a></div>
                    <div><a href="#"><span class="ion-android-person"></span> Admin</a></div>
                    <div><a href="#"><span class="ion-chatbubble"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
              <h3 class="heading">Contact Information</h3>
              <div class="block-23">
                <ul>
                  <li><span class="icon ion-android-pin"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                  <li><a href="#"><span class="icon ion-ios-telephone"></span><span class="text">+2 392 3929 210</span></a></li>
                  <li><a href="#"><span class="icon ion-android-mail"></span><span class="text">info@yourdomain.com</span></a></li>
                  <li><span class="icon ion-android-time"></span><span class="text">Monday &mdash; Friday 8:00am - 5:00pm</span></li>
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
                </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
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