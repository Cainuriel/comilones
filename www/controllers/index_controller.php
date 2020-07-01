<?php

$host = 'db-comilones';
$restaurante = 'user';
$password =  'password';
$db = "comilones";

// Connection to DB
$conn = mysqli_connect($host, $restaurante , $password, $db );


$query = 'SELECT * From restaurantes';
$result = mysqli_query($conn, $query);




    
    function filtrado_restaurantes($campo, $conn) { 


        $query = 'SELECT * From restaurantes';
        $result = mysqli_query($conn, $query);
        
        while($restaurante = $result->fetch_object()) {

            echo  $restaurante->nombre." - ". $restaurante->localidad." - ".$restaurante->tipo_cocina." - <br>";

        }

    }

?>