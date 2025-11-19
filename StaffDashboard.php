<?php

session_start();

if(isset($_SESSION["user_id"])){

    $mysqli = require __DIR__ ."\php\Database.php";
    
    $sql = "SELECT * FROM staff WHERE EmployeeID = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <meta charset="UTF-8">
        <title>Staff Dashboard Home</title>

    </head>
    <div class="topnav">
        <a href="HTML Front page.html">Home</a>
        <a href="">Staff</a> 
        <a href="">Bookings</a>  
        <a href="">Guests</a>
        <a href="">Rooms</a>
        <a href="">Hotels</a>    
        <a class="active" href="StaffDashboard.php">Staff Dashboard</a>
    </div>

    <body>
        <h1>Welcome</h1>
        <?php if (isset($user)): ?>
            <p>Hello </p> 
            <p><a href="logout.php">Log Out</a></p>

        <?php else:  ?>
                <p>Please <a href="Staff_Login.php">Login</a></p>
        <?php endif; ?>
    </body>


</html>