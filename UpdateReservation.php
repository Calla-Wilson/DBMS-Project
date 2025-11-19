<!DOCTYPE html>
<html>
    <head>
        <title>Success</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h2>Edit Reservation</h2>
 
    </body>
<?php
	$conn = mysqli_connect("localhost", "root", "", "hotel_dbms");

		$FirstName=$_POST['FirstName'];
		$LastName=$_POST['LastName'];
		$a_id=$_POST['ReservationID'];

	$sql_update="UPDATE RESERVATION SET FirstName='$FirstName', LastName='$LastName' WHERE ReservationID = '$a_id' ";

	if(mysqli_query($conn,$sql_update)){
		echo 'The Reservation Name has been Successfully Changed';
	} 

?>

</html>