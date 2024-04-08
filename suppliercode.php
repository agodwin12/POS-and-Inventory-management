<?php
$servername = 'localhost';
$usernames = 'root';
$password = '';
$db = 'favourite';
$conn = mysqli_connect('localhost','root','','favourite');
if ($conn){
    echo 'done';
}else{
    echo 'failed';
}
session_start();

if(isset($_POST['update'])){
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $product = $_POST['product'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];


    $query = "UPDATE suppliers SET name='$name',product='$product',address='$address',phone='$phone',email='$mail'
                WHERE id='$user_id' ";
    $query_run = mysqli_query($conn,$query);
    if($query_run)
    {
        $_SESSION['update'] = "Supplier Data Updated With Success ";
        header('location:adminSupplier.php');
        exit(0);
    }


}
?>