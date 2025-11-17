<?php

$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $mysqli = require __DIR__ . "php/Database.php";

    $sql = sprintf("SELECT * FROM guest 
                    WHERE Email = '%s'",
                    $mysqli->real_escape_string($_POST["Email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if($user){
        if(password_verify($_POST["password"], $user["password_hash"])){
            die("Login successful");
        }
    }
    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="styles.css">
    </head>
        <div class="topnav">
            <a href="HTML Front page.html">Home</a>
            <a href="Booking.html">Book</a>
            <a href="about_us.html">About Us</a>
            <a href="Contact Us.html">Contact</a>
            <a href="Locations.html">Locations</a>
            <a class="active" href="Login.php">Login</a>
        </div>

        <div class="login">
            <h2>Login</h2>
            <br>
            <?php if($is_invalid): ?>
                <em>Invalid login</em>
            <?php endif; ?>
            <form action="Login Process.php" method="post">
                <Label>Email</Label>
                <input type="email" name="Email" placeholder="Email" required value="<?=  htmlspecialchars($_POST["Email"] ?? "" )?>">
                <br><br>
                <Label>Password</Label>
                <input type="password" name="password" placeholder="Password" required><br><br>
                <input type="submit" value="Login">
            
        </div>

        <div class="signup">
            <h2>New User?</h2>
            <a href="Guest Sign-up.html">Sign-up Here</a>
        </div>
</html>