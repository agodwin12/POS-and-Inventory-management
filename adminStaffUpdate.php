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
    echo 'failed';
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("Location: loginfile.php");
    exit;
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
    <link rel="stylesheet" href="/css/updatesupplier.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Update Staff</title>
</head>
<body>
<div class="container-fluid bg-dark text-light py-3">
    <header class="text-center">
        <h1 class="display-6">   UPDATE STAFF DATA    </h1>
    </header>
</div>
<?php

if (isset($_GET['id']))
{
$user_id = $_GET['id'];
$users = "SELECT * FROM staff where id='$user_id' ";
$user_run = mysqli_query($conn, $users);

if(mysqli_num_rows($user_run)>0)
{
foreach($user_run as $user)
{

?>
<section class="container my-2 bg-dark w-50 text-light p-2">
    <form class="row g-3 p-3" method="post" action="code.php">
        <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
        <div class="col-md-6">
            <label for="inputName" class="form-label">NAMES</label>
            <input type="text" class="form-control" id="name" name="name"  value="<?= $user['name']; ?>">
        </div>
        <div class="col-md-6">
            <label for="role">ROLE</label>
            <select name="position" class="form-control">
                <option value="">--ROLE--</option>
                <option value="staff">STAFF</option>
                <option value="manager">MANAGER</option>
            </select>
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"  value="<?= $user['address']; ?>">
        </div>
        <div class="col-md-6">
            <label for="date" class="form-label">Date Employed</label>
            <input type="date" class="form-control" id="date" name="date"  value="<?= $user['date_employed']; ?>">
        </div>
        <div class="col-md-4">
            <label for="user" class="form-label">Username</label>
            <input type="text" class="form-control" id="user" name="user"  value="<?= $user['username']; ?>">

        </div>
        <div class="col-md-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password"  value="<?= $user['password']; ?>">

        </div>
        <div class="col-md-4">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="number" class="form-control" id="phone" name="phone"  value="<?= $user['phoneNumber']; ?>">

        </div>

        <div class="col-md-4">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" class="form-control" id="salary" name="salary"  value="<?= $user['salary']; ?>">

        </div>


        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </div>
    </form>
    <?php
    }

    }
    else
    {
        ?>
        <h4>No Record found</h4>
        <?php
    }
    }

    ?>
</section>
</body>
</html>