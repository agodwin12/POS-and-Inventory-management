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




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/picture.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/admin.css">

    <title>Total Sales</title>
</head>
<body>

<div class="btn">
    <button class="btn btn-success"><a href="userHome.php">HOME</a></button>
</div> <!-- NAVBAR -->
    <div class="topic">
        <h1 style="text-align: center">Sales Records</h1>
    </div>
    <!-- MAIN -->
    <main>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>AGENT</th>
                <th>DATE</th>
                <th>PRODUCT</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
            </tr>
            </thead>
            <tbody>
            <?php

            if (isset($_SESSION['username'])) {


                $agent = $_SESSION['username'];


                $sql = "SELECT * FROM sales WHERE agent = '$agent'";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Error executing query: " . $conn->error);
                }
            }


            while ($row=$result->fetch_assoc()){
                echo "            <tr>
                <td>$row[id]</td>
                  <td>$row[agent]</td>
                  <td>$row[date]</td>
                  <td>$row[product]</td>
                  <td>$row[price]</td>
                  <td>$row[quantity]</td>
            </tr>
";
            }
            ?>

            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>AGENT</th>
                <th>DATE</th>
                <th>PRODUCT</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
            </tr>
            </tfoot>
        </table>



    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->


<script src="js/adminscript.js"></script>
<script>
    new DataTable('#example');

</script>

</body>
</html>