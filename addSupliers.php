<?php
session_start();

$servername = 'localhost';
$usernames = 'root';
$password = '';
$db = 'favourite';
$conn = mysqli_connect('localhost','root','','favourite');
if ($conn){
    echo '';
}else{
    echo '';
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("Location: loginfile.php");
    exit;
}



if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $product = $_POST['product'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $filename = $_FILES["file"]["name"];
    $tmpName = $_FILES["file"]["tmp_name"];
    $newfilename =uniqid(). "-" . $filename;

    move_uploaded_file($tmpName, 'images/'. $newfilename);

    $query ="INSERT INTO suppliers VALUES('','$name','$product','$address','$phone','$mail','$newfilename')";
    $check =  mysqli_query($conn, $query);
    if ($check){
        echo '';
        header("location: adminSupplier.php");
    }else{
        echo '';
    }




}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/picture.jpg">
    <link rel="stylesheet" href="css/style.css">
    <title>ADD SUPPLIER</title>
</head>
<body>
<section class="wrapper">
    <div class="container">
        <h2>New Supplier</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-field">
                <input type="text" placeholder="Names" name="name" required>
                <input type="text" placeholder="product" name="product" required>
                <input type="text" placeholder="Address" name="address" required>
                <input type="text" placeholder="Phone Number" name="phone" required>
                <input type="text" placeholder="mail" name="mail" required>
                <input type="file" name="file" required>
            </div>
            <button type="submit" value="SUBMIT" name="signup">SUBMIT</button>
        </form>
    </div>


</section>


<script>
    const wrapper = document.querySelector(".wrapper"),
        signupHeader=document.querySelector(".signup header"),
        loginHeader=document.querySelector(".login header");

    loginHeader.addEventListener("click", ()=>{
        wrapper.classList.add("active");
    } )
    signupHeader.addEventListener("click", ()=>{
        wrapper.classList.remove("active");
    } )


</script>
</body>
</html>