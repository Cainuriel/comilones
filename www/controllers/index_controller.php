<?php

$host = 'db-comilones';
$restaurante = 'user';
$password =  'password';
$db = "comilones";

// Connection to DB
$conn = mysqli_connect($host, $restaurante , $password, $db );


    // funcion para el formulario de filtrado
    function filtrado_restaurantes($campo, $conn) { 


        $query = 'SELECT * From restaurantes';
        $result = mysqli_query($conn, $query);
        
        while($restaurante = $result->fetch_object()) {

            echo  $restaurante->nombre." - ". $restaurante->localidad." - ".$restaurante->tipo_cocina." - <br>";

        }


    }

if(isset($_GET['submit']))  {

echo "Mira el GET QUE ESTA EL SUBMITTTTT...";

} else {   

    
$query = 'SELECT * From restaurantes';
$result = mysqli_query($conn, $query);



}

    
 
  

?>