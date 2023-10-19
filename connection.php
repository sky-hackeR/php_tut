<?php

$servername = "localhost";
$username = "root";
$dbpassword= "";
$dbname = "kode";


$connection = mysqli_connect($servername, $username, $dbpassword, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}



?>