<?php

$host = 'db-comilones';
$restaurante = 'user';
$password =  'password';
$db = "comilones";

// Connection to DB
$conn = mysqli_connect($host, $restaurante , $password, $db );

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


    // funcion para el formulario de filtrado
    function filtrado_restaurantes($conn) { 

        global $conn;

        $select ="SELECT * FROM restaurantes";
        if (isset($_GET['name']) && !empty($_GET['name'])) {

            $select = $select. " WHERE name like '%".$_GET['name']."%'";
        }

         return  mysqli_query($conn, $select);
     

    }

if(isset($_GET['submit']))  {

    $result = filtrado_restaurantes($conn);



} else {   

    
$query = 'SELECT * From restaurantes';
$result = mysqli_query($conn, $query);



}

    
 
  

?>