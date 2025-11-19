<!DOCTYPE html>
<html>
    <head>
        <title>Success</title>
        <link rel="stylesheet" href="styles.css">
    </head>
     <div class="topnav">
         <a href="HTML Front page.html">Home</a>
        <a href="Booking.html">Book</a>
        <a href="about_us.html">About Us</a>
        <a href="Contact Us.html">Contact</a>
        <a href="Locations.html">Locations</a>
        <a href="login.php">Login</a>
        <a href="index.php">Dashboard</a>
        <a href="ReservationChecker.php">Check Reservation</a>
    </div>
    <body>
        <h2>Check Reservation</h2>
        <h3>Enter Name on Reservation</h3>
         <form action ="ReservationChecker2.php" method="post">
            <input type="text" name="name">
            <input type="submit">
        </form>
<?php

$conn = mysqli_connect("localhost", "root", "", "hotel_dbms");

$name = isset($_POST['name']) ? $_POST['name'] : 'not registered';
$sql = "SELECT * FROM RESERVATION WHERE FirstName = '$name' ";

$result = mysqli_query($conn,$sql);

?>
 
    </body>
   


</html>
