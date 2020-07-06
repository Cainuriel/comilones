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

$id = $_GET['id'] ;

$query = "SELECT * From restaurantes WHERE id='$id' LIMIT 1";
$result = mysqli_query($conn, $query);

$restaurante = mysqli_fetch_array($result);
