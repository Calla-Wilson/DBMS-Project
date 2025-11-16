<?PHP

$FName = $_POST["FName"];
$LName = $_POST["LName"];
$Email = $_POST["Email"];
$Address = $_POST["Address"];
$PhoneNumber = $_POST["PNumber"];
$Password = $_POST["Password"];

if(empty($FName) || empty($LName) || empty($Email) || empty($Address) || empty($PhoneNumber) || empty($Password)) {
    echo "All fields are required.";
    exit();
}

var_dump($FName, $LName, $Email, $Address, $PhoneNumber, $Password);