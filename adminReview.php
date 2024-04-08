<?php
session_start();

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


if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("Location: loginfile.php");
    exit;
}


$sql = "SELECT * FROM sales";
$result = $conn->query($sql);

if (!$result) {
    die("no queries:" . $conn->error);

}
while ($row=$result->fetch_assoc()){

}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="icon" href="images/picture.jpg">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/admin.css">
    <script>new DataTable('#example');</script>

    <title>Staff</title>
</head>
<body>


<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">FAVOURITE</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="admin.php">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="totalSales.php">
                <i class='bx bx-store-alt'></i>
                <span class="text">Total sales</span>
            </a>
        </li>
        <li>
            <a href="adminanalysis.php">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">Analytics</span>
            </a>
        </li>
        <li>
            <a href="adminAvailaibleProducts.php">
                <i class='bx bxs-group' ></i>
                <span class="text">Availaible Products</span>
            </a>
        </li>
        <li>
            <a href="adminReview.php">
                <i class='bx bxs-message-dots' ></i>
                <span class="text">Reviews</span>
            </a>
        </li>
        <li>
            <a href="Staff.php">
                <i class='bx bxs-group' ></i>
                <span class="text">Staff</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="adminSupplier.php">
                <i class='bx bxs-cog' ></i>
                <span class="text">Suppliers</span>
            </a>
        </li>
        <li>
            <a href="logout.php" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>
<!-- SIDEBAR -->



<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu' ></i>
        <a href="#" class="nav-link">Categories</a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search...">
                <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
            </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="notification">
            <i class='bx bxs-bell'></i>
            <span class="num">8</span>
        </a>
        <a href="#" class="profile">
            <img src="img/people.png">
        </a>
    </nav>
    <!-- NAVBAR -->
    <div class="topic">
        <h1 style="text-align: center; text-decoration: underline">REVIEWS</h1>
    </div>

    <!-- MAIN -->
    <main>

        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>DATE</th>
                <th>AGENT</th>
                <th>REVIEW</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM review";
            $result = $conn->query($sql);

            if (!$result) {
                die("no queries:" . $conn->error);

            }
            while ($row=$result->fetch_assoc()){
                echo "            <tr>
                <td>$row[id]</td>
                <td>$row[date]</td>
                  <td>$row[agent]</td>
                  <td>$row[review]</td>
                 
            </tr>
";
            }
            ?>

            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>DATE</th>
                <th>AGENT</th>
                <th>REVIEW</th>

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