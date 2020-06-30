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

    <div class="container">

        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="logo">
                    <img src="img/comilones_logo.png" alt="">
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link " href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">Link</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="#">Link</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="#">Link</a>
                        </li>

                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>

        </header>
    </div>

    <main class="container">



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
    </main>

    <div class="container">



        <!-- Footer -->
        <footer class="page-footer font-small blue footer">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
                <a href="https://github.com/Cainuriel"> Superloper Developer</a>
            </div>
            <!-- Copyright -->

        </footer>
    </div>
    <!-- Footer -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>