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
        <h2>Edit Reservation</h2>
<form action="UpdateReservation.php" method="post">
<?php

$conn = mysqli_connect("localhost", "root", "", "hotel_dbms");

$a_id = isset($_POST['ReservationID']) ? $_POST['ReservationID'] : 'not registered';
$name = isset($_POST['name']) ? $_POST['name'] : 'not registered';

$a_id = $_GET['ReservationID'];
$sql = "SELECT * FROM RESERVATION WHERE ReservationID = '$a_id' ";

$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result)){
      echo '<input type="text" value="'.$row['ReservationID'].'"name="ReservationID" readonly><br>';
    echo '<h5>First Name</h5>';
    echo '<input type="text" value="'.$row['FirstName'].'"name="FirstName"><br>';
    echo '<h5>Last Name</h5>';
    echo '<input type="text" value="'.$row['LastName'].'"name="LastName">';
}

?>

<input type="submit" value="Update Reservation">

</form>

    </body>

</html>