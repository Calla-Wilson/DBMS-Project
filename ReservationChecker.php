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

$result = mysqli_query($conn,$sql)

?>
 
    </body>
   
<style>
body{
    background-color: rgb(73, 99, 77);
    font-family: verdana, sans-serif;
    border-radius: 8px;
}

h1{
    background-color: rgb(119, 151, 125);
    font-size: 400%;
    border-radius: 8px;
    color: rgb(29, 39, 30) 
}

h2{
    background-color: rgb(119, 151, 125);
    font-size: 200%;
    border-radius: 4px;
    color: rgb(29, 39, 30) 

}

p{
    background-color: rgb(119, 151, 125);
    font-size: 150%;
    color: rgb(29, 39, 30)
}

.topnav{
    background-color: rgb(26, 47, 28);
    overflow: hidden;
    border-bottom: 8px solid rgb(18, 31, 19);
    border-radius: 4px;
}

.topnav a{
    float: left;
    color: rgb(119, 151, 125);
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.topnav a:hover {
  background-color: rgb(63, 102, 70);
  color: black;
}

</style>

</html>
