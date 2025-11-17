<?php

session_start();

?>

<!DOCTYPE html>
<html>
         <head>
        <link rel="stylesheet" href="styles.css">
        <meta charset="UTF-8">
        <title>Dashboard Home</title>
    </head>

    <div class="topnav">
        <a href="HTML Front page.html">Home</a>
        <a href="Booking.html">Book</a>
        <a href="about_us.html">About Us</a>
        <a href="Contact Us.html">Contact Us</a>
        <a href="Locations.html">Locations</a>
        <a href="login.php">Login</a>
        <a class="active" href="index.php">Dashboard</a>
    </div>

    <body>
        <h1>Welcome to your Dashboard</h1>
        <?php if (isset($_SESSION["user_id"])): ?>
            <p>you are logged in.</p> 
            <p><a href="logout.php">Log Out</a></p>
        <?php else: ?>
                <p>Please <a href="login.php">Login</a> or <a href="Guest Sign-up.html">Sign-up</a></p>
        <?php endif; ?>
    </body>
</html>