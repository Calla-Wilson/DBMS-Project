<?php

session_start();

if(isset($_SESSION["user_id"])){

    $mysqli = require __DIR__ ."\php\Database.php";
    
    $sql = "SELECT * FROM guest WHERE GuestID = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    $sql2 = "SELECT * FROM reservation WHERE GuestID = {$_SESSION["user_id"]}";

    $result2 = $mysqli->query($sql2);

    $reservations = $result2->fetch_assoc();
}

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
        <h1>Welcome</h1>
        <?php if (isset($user)): ?>
            <p>Hello <?= $user["FirstName"] ?> </p> 
            <h2>Current Reservations</h2>
            <?php if ($reservations): ?>
                <ul>
                    <li>Hotel: <?= htmlspecialchars($reservations["HotelName"]) ?></li>
                    <li>Room Type: <?= htmlspecialchars($reservations["Rtype"]) ?></li>
                    <li>Number of Guests: <?= htmlspecialchars($reservations["numGuests"]) ?></li>
                    <li>Check-In Date: <?= htmlspecialchars($reservations["CheckInDate"]) ?></li>
                    <li>Check-Out Date: <?= htmlspecialchars($reservations["CheckOutDate"]) ?></li>
            </ul>
                <?php else: ?>
                    <p>No current reservations.</p>
                    <p>Would you like to book one? <a href="Booking.html">Click Here</a></p>
                <?php endif?>     

            <p><a href="logout.php">Log Out</a></p>
        <?php else: ?>
                <p>Please <a href="login.php">Login</a> or <a href="Guest Sign-up.html">Sign-up to view this page</a></p>
        <?php endif; ?>
    </body>
</html>