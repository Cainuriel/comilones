<?php

$host = 'db-comilones';
$usuario = 'user';
$password =  'password';
$db = "comilones";

// Connection to DB
$conn = mysqli_connect($host, $usuario , $password, $db );


$query = 'SELECT id, name From restaurantes';
$result = mysqli_query($conn, $query);


?>