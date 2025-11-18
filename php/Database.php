<?php

$host = "localhost";
$dbname = "hotel_dbms";
$username = "root";
$password = "DataMan0314!!";

$mysql = new mysqli( $host, $username, $password, $dbname);

if ($mysql->connect_error){
    die("Connection Error". $mysql->connect_error);
}

return $mysql;
