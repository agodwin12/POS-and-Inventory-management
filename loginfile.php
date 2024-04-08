<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'favourite');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM staff WHERE username = '$username' AND password = '$password'";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) {
        $logged_in_user = mysqli_fetch_assoc($results);

        if ($logged_in_user['position'] == 'manager') {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in as a manager.";
            header('location: admin.php');
        } elseif ($logged_in_user['position'] == 'staff') {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in as a staff member.";
            header('location: userHome.php');

        } else {

            header('location: loginfile.php');
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Authentification</title>
    <link rel="icon" href="images/picture.jpg">
    <link rel="stylesheet" type="text/css" href="css/loginfile.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="container">
    <div class="img">
        <img src="images/black-woman-with-braids-working-as-manager-retail-boutique-smiling-doing-phone-gesture-with-hand-fingers-like-talking-telephone-communicating-concepts_839833-7329.jpg">
    </div>
    <div class="login-content">
        <form action="" method="post">
            <img src="images/picture.jpg">
            <h2 class="title">Welcome</h2>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>Username</h5>
                    <input type="text" class="input" placeholder="" name="username">
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Password</h5>
                    <input type="password" class="input" name="password">
                </div>
            </div>
            <a href="#">Forgot Password?</a>
            <input type="submit" class="btn" value="Login" name="login">
            <input type="submit" class="btn" value="USE FACE RECOGNITION" name="login">
        </form>
    </div>
</div>
<script type="text/javascript" src="./js/style.js"></script>
</body>
</html>