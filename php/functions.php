<?php
    if (empty($_POST["FirstName"])||empty($_POST["LastName"])){
            die("Name is required");
    }

    if ( !filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)){
        die("valid email is required");
    }

    if ($_POST["password"] !== $_POST["passwordconfirm"]){
        die("passwords do not match");
    }

    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $mysqli = require __DIR__ . "/Database.php";
    

    $sql = "INSERT INTO guest(FirstName, LastName, Addr, Email, PhoneNumber, DoB, Password)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $mysqli->stmt_init();

    if(!$stmt->prepare($sql)){
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("ssssdss",
                        $_POST["FirstName"],
                        $_POST["LastName"],
                        $_POST["Address"],
                        $_POST["Email"],
                        $_POST["Phone"],
                        $_POST["DateofBirth"],
                        $password_hash);

    $stmt->execute();

    
    echo "Sign-up successful! You can now log in.";


