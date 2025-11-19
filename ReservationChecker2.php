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

if(isset($_GET['ReservationID'])) {
    $a_id= $_GET['ReservationID'];

    $del_sql = "DELETE FROM RESERVATION WHERE ReservationID ='$a_id' ";

    $data = mysqli_query($conn,$del_sql);
}

$name = isset($_POST['name']) ? $_POST['name'] : 'not registered';

$sql = "SELECT * FROM RESERVATION WHERE FirstName = '$name' ";

$result = mysqli_query($conn,$sql);



?>
        <p>Your Reservation is for</p>
        <table>
            <tr>
                <th>Reservation ID</th>
                <th>Name   &nbsp &nbsp </th>
                <th>Check in Date  &nbsp &nbsp </th>
                <th>Check out Date  &nbsp &nbsp</th>
                <th>Hotel  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</th> 
                <!--Weirdly necessary for formatting-->
                <th>Room Type  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </th>
                <th>Edit Reservation &nbsp &nbsp</th>
                <th>Delete Reservation?</th>
            </tr>


            <?php

            while($row = mysqli_fetch_assoc($result))
            {


            ?>

            <tr>
                 <td>
                    <?php echo $row['ReservationID'] ?>
                </td>
                <td>
                    <?php echo $row['FirstName'], " ", $row['LastName'] ?>
                </td>
                <td>
                    <?php echo $row['CheckInDate'] ?>
                </td>
                <td>
                    <?php echo $row['CheckOutDate'] ?>
                </td>
                <td>
                    <?php echo $row['HotelName'] ?>
                </td>
                <td>
                    <?php echo $row['RType'] ?>
                </td>
                <td>
                    <a href="ReservationEdit.php?ReservationID=<?php echo $row['ReservationID']?>">Edit</a>
                </td>
                 <td>
                    <a href="ReservationChecker2.php?ReservationID=<?php echo $row['ReservationID']?>">Delete</a>
                </td>
            </tr>

            <?php

            }
            ?>
        </table>
    </body>
   
</html>
