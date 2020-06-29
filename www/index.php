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
    <link rel="stylesheet" href="styles\index_responsive.css">

    <title>Comilones</title>
</head>

<body>

    <div class="super_container">

        <header class="header d-flex flex-row">
            <div class="header_content d-flex flex-row align-items-center">
                <!-- Logo -->
                <div class="logo_container">
                    <div class="logo">
                        <img src="img/comilones_logo.png" alt="">
                        <span>COMILONES</span>
                    </div>
                </div>

                <!-- Main Navigation -->
                <nav class="main_nav_container">
                    <div class="main_nav">
                        <ul class="main_nav_list">
                            <li class="main_nav_item"><a href="#">home</a></li>
                            <li class="main_nav_item"><a href="#">Quienes somos</a></li>
                            <li class="main_nav_item"><a href="#">Empresas</a></li>
                            <li class="main_nav_item"><a href="contact.html">contacto</a></li>
                        </ul>
                    </div>
                </nav>
            </div>


            <!-- Hamburger -->
            <div class="hamburger_container">
                <i class="fas fa-bars trans_200"></i>
            </div>

        </header>

        <!-- Menu -->
        <div class="menu_container menu_mm">

            <!-- Menu Close Button -->
            <div class="menu_close_container">
                <div class="menu_close"></div>
            </div>

            <!-- Menu Items -->
            <div class="menu_inner menu_mm">
                <div class="menu menu_mm">
                    <ul class="menu_list menu_mm">
                        <li class="menu_item menu_mm"><a href="#">Home</a></li>
                        <li class="menu_item menu_mm"><a href="#">Quienes somos</a></li>
                        <li class="menu_item menu_mm"><a href="#">Empresas</a></li>
                        <li class="menu_item menu_mm"><a href="contact.html">contacto</a></li>
                    </ul>

                    <!-- Menu Social -->

                    <div class="menu_social_container menu_mm">
                        <ul class="menu_social menu_mm">
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>

                    <div class="menu_copyright menu_mm">Practicas SOIB 2019/20</div>
                </div>

            </div>

        </div>

        <div class="home">
            <?php echo "<h1>¿Dónde comemos? </h1>"; ?>

            <?php

            // Connection to DB
            $conn = mysqli_connect('db-comilones', 'user', 'password', "comilones");


            $query = 'SELECT id, name From restaurantes';
            $result = mysqli_query($conn, $query);

            echo '<table class="table table-striped">';
            echo '<thead><tr><th>id</th><th>name</th></tr></thead>';
            while ($value = $result->fetch_array(MYSQLI_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $value['id'] . '</td>';
                echo '<td>' . $value['name'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';

            // Close and free result
            $result->close();

            mysqli_close($conn);

            ?>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>