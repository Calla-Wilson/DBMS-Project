<?php

$host = "localhost";
$dbname = "hotel_dbms";
$username = "root";
$password = "";

$mysql = new mysqli(hostname: $host, 
                    username: $username, 
                    password: $password, 
                    database: $dbname);

if ($mysql->connect_error){
    die("Connection Error". $mysql->connect_error);
}

return $mysql;
