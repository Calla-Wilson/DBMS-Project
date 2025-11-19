<?php

$host = "localhost";
$dbname = "hotel_project";
$username = "root";
$password = "";

$mysql = new mysqli( $host, $username, $password, $dbname);

if ($mysql->connect_error){
    die("Connection Error". $mysql->connect_error);
}

return $mysql;
