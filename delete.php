<?php
session_start();
$servername = 'localhost';
$usernames = 'root';
$password = '';
$db = 'favourite';
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql= "DELETE FROM staff WHERE id='".$_GET["id"]."'";

if (mysqli_query($conn,$sql)){
    header("location:Staff.php");
}else{
    echo "Error deleting record" . mysqli_error($conn);
}

mysqli_close($conn);
?>
