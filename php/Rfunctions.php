<?php

$FName = $_POST["FName"];
$LName = $_POST["LName"];
$hotel = $_POST["hotel"];
$room = $_POST["room"];
$numPeople = $_POST["numPeople"];
$Start = $_POST["Start"];
$End = $_POST["End"];

if(empty($FName) || empty($LName) || empty($hotel) || empty($room) || empty($numPeople) || empty($Start) || empty($End)) {
    echo "All fields are required.";
    exit();
}

$mysqli = require __DIR__ . "/Database.php";

 $sql = "INSERT INTO reservation(FirstName, LastName, HotelName, Rtype, numGuests, CheckInDate, CheckOutDate)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $mysqli->stmt_init();

    if(!$stmt->prepare($sql)){
        die("SQL error: " . $mysqli->error);
    }

       $stmt->bind_param("ssssiss",
                        $_POST["FName"],
                        $_POST["LName"],
                        $_POST["hotel"],
                        $_POST["room"],
                        $_POST["numPeople"],
                        $_POST["Start"],
                        $_POST["End"]);

  if($stmt->execute()){
          header("Location: ../ReservationSuccess.php");
         exit;
    }
