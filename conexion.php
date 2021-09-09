<?php

$host     = "aa1llz728vlwd3f.ce5vsxuc96is.us-west-1.rds.amazonaws.com";
$port     = 3306;
$socket   = "";
$user     = "frankadmin";
$password = "frank123admin";
$dbname   = "academiadb";

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('No se puede conectar a la base de datos' . mysqli_connect_error());

?>