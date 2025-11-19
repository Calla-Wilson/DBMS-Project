<?php

session_start();

if(isset($_SESSION["user_id"])){

    $mysqli = require __DIR__ ."\php\Database.php";
    
    $sql = "SELECT * FROM staff WHERE StaffID = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    $sql2 = "SELECT * FROM staff";

    $result2 = $mysqli->query($sql2);

    $user2 = $result2->fetch_assoc();

}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <meta charset="UTF-8">
        <title>Staff Dashboard Home</title>

<script>
/*function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}*/
</script>

    </head>
    <div class="topnav">
        <a href="HTML Front page.html">Home</a>
        <a href="">Staff</a> 
        <a href="">Bookings</a>  
        <a href="">Guests</a>
        <a href="">Rooms</a>
        <a href="">Hotels</a>    
        <a class="active" href="StaffDashboard.php">Staff Dashboard</a>
    </div>

    <body>
        <h1>Welcome</h1>
        <?php if (isset($user)): ?>
            <p>Hello </p> 
            <p><a href="logout.php">Log Out</a></p>

        <?php else:  ?>
                <p>Please <a href="Staff_Login.php">Login</a></p>
        <?php endif; ?>
    </body>


</html>