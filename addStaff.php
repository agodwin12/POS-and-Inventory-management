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


$errorMessage = "";
$successMessage = "";

if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $position = $_POST['position'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $salary = $_POST['salary'];
    $filename = $_FILES["file"]["name"];
    $tmpName = $_FILES["file"]["tmp_name"];
    $newfilename =uniqid(). "-" . $filename;

    move_uploaded_file($tmpName, 'images/'. $newfilename);

    $query ="INSERT INTO staff VALUES('','$name','$position','$address','$date','$user','$password','$phone','$newfilename','$salary')";
   $check =  mysqli_query($conn, $query);
    if ($check){
        echo '';
        header("location:Staff.php");
    }else{
        echo '';
    }

        if (empty($name) || empty($position) || empty($address) || empty($date) || empty($user) || empty($password) || empty($phone) || empty($newfilename) || empty($salary)){
            $errorMessage = "All fields Required";

        }



}


?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="jquery-3.7.1.min.js"></script>
    <link rel="icon" href="images/picture.jpg">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/style.css">
    <title>ACCESS</title>
</head>
<body>
<section class="wrapper">
    <div class="container">
        <h2>Admin Login</h2>
        <?php
        if (!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='aler' aria-label='Close'></button>
                    </div>
            ";

        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-field">
                <input type="text" placeholder="Names" name="name" required>
                    <select name="position" >
                        <option value="">--ROLE--</option>
                        <option value="staff">STAFF</option>
                        <option value="manager">MANAGER</option>
                    </select>
                <input type="text" placeholder="Address" name="address" required>
                <input type="date" placeholder="date" name="date" required>
                <input type="text" placeholder="username"  name="user" required>
                <input type="password" placeholder="password" name="password" required>
                <input type="text" placeholder="Phone Number" name="phone" required>
                <input type="text" placeholder="Salary" name="salary" required>
                <input type="file" name="file" required>

            </div>
            <button type="submit" value="ENROLL" name="signup">ENROLL</button>
        </form>
    </div>
    <?php
    if (!empty($successMessage)){
        echo "
        <div class='row mb-3'>
       <div class='offset-sm-3 col-sm-6'>
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>$successMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='aler' aria-label='Close'></button>
         </div>
         </div>
          </div>
        ";
    }

    ?>

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