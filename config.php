<?php

//*********************************************************
//****************** BANCO DE DADOS ***********************
//*********************************************************

// $servername = "localhost";
// $database = "temporario";
// $username = "root";
// $password = "";

 $servername = "localhost";
 $database = "temporario";
 $username = "temporario";
 $password = "WW@!FQu1wR#";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
}

?>