
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

            <div class="Pass">
                <h2>Please Create a password</h2>
                <form method="post">
                    <Label for="password">Password</Label>
                    <input type="password" name="password" placeholder="Password" required><br><br>
                    <label for="password_confirm">Confirm Password</label>
                    <input type="password" name="password_confirm" placeholder="Confirm Password" required>
            
                    <button>Create Password</button>
                </form>
            </div>

</html>

<?php 
session_start();

if(!isset($_SESSION["user_id"])){
    

        if (empty($_POST["password"]) || empty($_POST["password_confirm"])){
        die("Password and confirmation are required");
    }
        if("password" !== "password_confirm"){
        die("Passwords do not match");
    }

     $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $mysqli = require __DIR__ . "\php\Database.php";

    $sql = "SELECT * FROM staff WHERE StaffID = {$_SESSION["user_id"]}";

    print($sql);

    $sql2 = "UPDATE staff SET Password = (?) WHERE StaffID = (?)";

    $stmt = $mysqli->stmt_init();

    if(!$stmt->prepare($sql2)){
            die("SQL error: " . $mysqli->error);
        }

    $stmt->bind_param("si",
                        $password_hash,
                        $_SESSION["user_id"]);


    if($stmt->execute()){
            header("Location: .. /StaffDashboard.php");
        } else{
            
            if($mysqli->errno === 1062){
                die("already taken");
            } else {
            die($mysqli->error . " " . $mysqli->errno);
        }
    }
} else {
    header("Location: StaffDashboard.php");
}   






?>