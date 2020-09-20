<?php


require_once 'db-connect.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


    // funcion para el formulario de filtrado
    function filtrado_restaurantes($conn) { 

        global $conn;

        $select ="SELECT * FROM restaurantes";

        // search by name
        if (isset($_GET['name']) && !empty($_GET['name'])) {

            $select = $select. " WHERE name like '%".$_GET['name']."%'";

        // search by localidad
        } elseif (isset($_GET['localidad']) && !empty($_GET['localidad'])) { 


            $select = $select. " WHERE localidad like '%".$_GET['localidad']."%'";

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