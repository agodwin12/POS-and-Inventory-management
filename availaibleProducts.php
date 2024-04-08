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


} else {
    header("Location: loginfile.php");
    exit;
}

$sql = "SELECT * FROM products";
$prod = $conn->query($sql);



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/availproduct.css">
    <title>PRODUCTS</title>
</head>
<body>

<div class="btn">
    <button class="btn btn-success"><a href="userHome.php">HOME</a></button>
</div>
 <?php


 ?>

<main>
    <?php
    while($row = mysqli_fetch_assoc($prod)){
    ?>
    <div class="card">
        <div class="image">
            <img src="<?php echo $row["picture"]; ?>" alt="">
        </div>
        <div class="caption">
            <p class="productName">Product: <?php echo $row["name"]; ?></p>
            <p class="price">Price : <?php echo $row["price"]; ?></p>
            <p class="qty">Quantity : <?php echo $row["quantity"]; ?></p>

        </div>
    </div>

    <?php
    }
    ?>
</main>
</body>
</html>
