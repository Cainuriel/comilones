<?php require_once "controllers/res_single_controller.php";


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

  <!-- Theme Style -->
  <link rel="stylesheet" href="css/style.css">

   <!-- css y js  mapa -->

     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-extra-markers@1.0.6/dist/css/leaflet.extra-markers.min.css">
        <link rel="stylesheet" href="css/map.css">
    


</head>

<body>

  <header role="banner">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand absolute" href="index.html">Comilones</a>
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
              <a class="nav-link active" href="index.html">Home</a>
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

  <section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(<?= $restaurante['foto']; ?>);">
    <div class="container">
      <div class="row align-items-center justify-content-center site-hero-sm-inner">
        <div class="col-md-7 text-center">

          <div class="mb-5 element-animate">
            <h1 class="mb-2"><?= $restaurante['name']; ?></h1>
            <p class="bcrumb"><a href="index.php">Home</a> <span class="sep ion-android-arrow-dropright px-2"></span> <a href="res-single.php?id=<?= $value['id'] ?>">Restaurante</a> <span class="sep ion-android-arrow-dropright px-2"></span> <span class="current"><?= $restaurante['name']; ?></span></p>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- END section -->

  <div class="site-section bg-light element-animate">
    <div class="container">

      <div class="row">

        <div class="col-md-6 col-lg-8 order-md-2 mb-5">
          <div class="row">
            <div class="col-md-12">
              <img src="<?= $restaurante['foto']; ?>" alt="" class="img-fluid">
            </div>
          </div>

          <section class="episodes">
            <div class="container">
              <div class="row mb-5">
                <div class="col-md-12 pt-5">
                  <h2>Descripción</h2>
                  <p>Los inicios de El Celler Sa Premsa se remontan a mayo de 1958 cuando Antonio Mayol, banquero de formación, apostó por convertir un antiguo almacén en el centro de Palma de Mallorca en un acogedor restaurante. Sin conocimiento de restauración ni hostelería, decidió crear un espacio donde quien quisiera pudiera disfrutar de la comida mallorquina, sin importar su procedencia, sus gustos o inquietudes.

                    El boca oreja durante los primeros años propició el éxito del restaurante e hizo que fueran muchos los mallorquines que hicieran una parada en el Celler Sa Premsa. Una tradición que fue también transmitida a los turistas de la isla logrando que, tanto para locales como para visitantes, degustar una comida en el Celler Sa Premsa se convirtiera en una visita obligada.

                    Más de medio siglo después, el sueño de Antonio sigue siendo una realidad y el restaurante una parada obligada. De la mano de la tercera generación familiar, El Celler Sa Premsa no ha perdido su esencia: el precio, la calidad y el servicio. La fórmula del éxito del negocio desde sus inicios.</p>
                </div>
              </div>
            </div>

          </section>
        </div>
        <!-- END content -->
        <div class="col-md-6 col-lg-4 order-md-1">

          <div class="block-29 mb-5">
            <h2 class="heading">Detalles del Restaurante</h2>
            <ul>
              <li><span class="text-1">Valoracion:</span> <span class="text-2"><?= $restaurante['valoracion']; ?></span></li>
              <li><span class="text-1">Telefono:</span> <span class="text-2"><?= $restaurante['telefono']; ?></span></li>
              <li><span class="text-1">Localidad:</span> <span class="text-2"><?= $restaurante['localidad']; ?></span></li>
              <li><span class="text-1">Tipo de cocina:</span> <span class="text-2"><?= $restaurante['tipo_cocina']; ?></span></li>
              <li><span class="text-1">Precios</span> <span class="text-2">€<?= $restaurante['precios']; ?> por persona.</span></li>
            </ul>
          </div>

          <div class="block-28 text-center mb-5">
            <figure>
              <img src="img/antonio_mayol.jpg" alt="" class="img-fluid">
            </figure>
            <h2 class="heading">Antonio Mayol</h2>
            <h3 class="subheading">Propietario</h3>
            <p>
              <a href="#" class="fa fa-twitter p-2"></a>
              <a href="#" class="fa fa-facebook p-2"></a>
              <a href="#" class="fa fa-linkedin p-2"></a>
            </p>
            <p>Benvinguts a nuestro Celler. Esperemos que la experiencia sea tan satisfactoria como lo es para nosotros servirle</p>



          </div>
        </div>
      </div>

       <!-- mapa container -->

    <div class="container">

<div class="row">
<div id="map"></div>    
</div>
    </div>


    <!-- AQUI ACABA EL MAPA -->

      <div class="container site-section element-animate">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center section-heading">
            <h2 class="text-primary heading">Comentarios Clientes</h2>
            <p>Para poder dejar comentarios tiene que darse de alta como usuario</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="block-2">
              <div class="flipper">
                <div class="front" style="background-image: url(../img/person_3.jpg);">
                  <div class="box">
                    <h2>Fernando López</h2>
                    <p>Desarrollador Web y Coach</p>
                  </div>
                </div>
                <div class="back">
                  <!-- back content -->
                  <blockquote>
                    <p>&ldquo;Una de las cosas que m'as me gustan es que nada m'as llegar te sirven un pan torrado con un buen alioli casero. El servicio es extraordinario de principio a fin. Volveré sin duda. Los precios asequibles y la calidad extraordinaria&rdquo;</p>
                  </blockquote>
                  <div class="author d-flex">
                    <div class="image mr-3 align-self-center">
                      <img src="img/person_3.jpg" alt="">
                    </div>
                    <div class="name align-self-center">Fernando López <span class="position">Desarrollador Web y Coach</span></div>
                  </div>
                </div>
              </div>
            </div> <!-- .flip-container -->
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="block-2 ">
              <div class="flipper">
                <div class="front" style="background-image: url(../img/person_1.jpg);">
                  <div class="box">
                    <h2>Marta Ferrer</h2>
                    <p>Frit y trampó a muerte</p>
                  </div>
                </div>
                <div class="back">
                  <!-- back content -->
                  <blockquote>
                    <p>&ldquo;Comida para gordos&rdquo;</p>
                  </blockquote>
                  <div class="author d-flex">
                    <div class="image mr-3 align-self-center">
                      <img src="img/person_1.jpg" alt="">
                    </div>
                    <div class="name align-self-center">Marta Ferrer <span class="position">Frit y trampó a muerte</span></div>
                  </div>
                </div>
              </div>
            </div> <!-- .flip-container -->
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="block-2">
              <div class="flipper">
                <div class="front" style="background-image: url(../img/person_2.jpg);">
                  <div class="box">
                    <h2>Enrique Quejada</h2>
                    <p>Crítico Culinario</p>
                  </div>
                </div>
                <div class="back">
                  <!-- back content -->
                  <blockquote>
                    <p>&ldquo;El servicio fue extraordinario de principio a fin. Volveré sin duda. Los precios asequibles y la calidad extraordinaria&rdquo;</p>
                  </blockquote>
                  <div class="author d-flex">
                    <div class="image mr-3 align-self-center">
                      <img src="img/person_2.jpg" alt="">
                    </div>
                    <div class="name align-self-center">Enrique Quejada <span class="position">Crítico Culinario</span></div>
                  </div>
                </div>
              </div>
            </div> <!-- .flip-container -->
          </div>
        </div>
      </div>
      <!-- END .block-2 -->



      <div class="py-5 block-22">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0 pr-md-5">
              <h2 class="heading">¿Quiere registrarse como comilón?</h2>
              <p>Envíe un email y le enviaremos el enlace de registro.</p>
            </div>
            <div class="col-md-6">
              <form action="#" class="subscribe">
                <div class="form-group">
                  <input type="email" class="form-control email" placeholder="Introduzca su email">
                  <input type="submit" class="btn btn-primary submit" value="Enviar">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

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
                    <li><a href="#">Home</a></li>
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
                </script> Diseñado y <i class="fa fa-keyboard" aria-hidden="true"></i> por <strong>Fernando López López</strong> | Template original de <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
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

          
   <!-- #JS -->
   <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/leaflet-extra-markers@1.0.6/src/assets/js/leaflet.extra-markers.min.js"></script>
        <script>

//Ubicación que mostrará el mapa
// let map = L.map('map');
let map = L.map('map').setView([39.56966,2.64235], 13);

//añade el mapa de fondo
L.tileLayer('https://dev.{s}.tile.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
maxZoom: 20,
attribution: '<a href="https://github.com/cyclosm/cyclosm-cartocss-style/releases" title="CyclOSM - Open Bicycle render">CyclOSM</a> | Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'  
}).addTo(map)

//Marcador (chincheta) de ubicación en el mapa
var marker = L.marker([<?= $restaurante['latitud']; ?>,<?= $restaurante['longitud']; ?>]).addTo(map);

marker.bindPopup('<?= $restaurante['name']; ?>');

//Creamos una clase de icono para agregarsela al marcador
let casalMarker = L.ExtraMarkers.icon({
  icon: 'fa-home',
  markerColor: 'pink',
  shape: 'square',
  prefix: 'fa'
});

//Agregamos el icono al marcador
marker.setIcon(casalMarker);

// Geolocation
map.locate({enableHighAccuracy: true}) // creo que activa la geolocalizacion
map.on('locationfound', (e) => {
  const coords = [e.latlng.lat, e.latlng.lng];
  const newMarker = L.marker(coords);
  newMarker.bindPopup('Estás aqui...');
  map.addLayer(newMarker);

});

//Encuadra la posición dada
map.fitbounds(marker);

        </script>
        <!-- See http://leaflet-extras.github.io/leaflet-providers/preview/ for more TileLayers -->

      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/jquery-migrate-3.0.0.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/jquery.waypoints.min.js"></script>
      <script src="js/jquery.stellar.min.js"></script>
      <script src="js/jquery.animateNumber.min.js"></script>

      <script src="js/main.js"></script>
</body>

</html>