<?php

$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $mysqli = require __DIR__ . "\php\Database.php";

    $sql = sprintf("SELECT * FROM staff 
                    WHERE Email = '%s'",
                    $mysqli->real_escape_string($_POST["Email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if($user){      
        if($user["Password"]=== NULL){
            session_start();
            $_SESSION["user_id"] = $user["EmployeeID"];
            header("Location: staffpcreate.php");
            
        }else if(password_verify($_POST["password"], $user["Password"])){
            session_start();
            $_SESSION["user_id"] = $user["EmployeeID"];
            header("Location: StaffDashboard.php");

        }   
            } $is_invalid = true;
    }
   
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Staff Login</title>
        <link rel="stylesheet" href="styles.css">
    </head>
        <div class="topnav">
            <a href="HTML Front page.html">Home</a>
            <a href="Booking.html">Book</a>
            <a href="about_us.html">About Us</a>
            <a href="Contact Us.html">Contact</a>
            <a href="Locations.html">Locations</a>
            <a class="active" href="login.php">Login</a>
        </div>

        <div class="login">
            <h2>Login</h2>
            <br>
            <?php if($is_invalid): ?>
                <em>Invalid login</em>
            <?php endif; ?>
            <form method="post">
                <Label for="Email">Email</Label>
                <input type="email" name="Email" placeholder="Email" required value="<?=  htmlspecialchars($_POST["Email"] ?? "" )?>">
                <br><br>
                <Label for="password">Password</Label>
                <input type="password" name="password" placeholder="Password" <?= $_POST["password"] ?? "" ?>>
                <button>Login</button>
            </form>
        </div>
    </html>
