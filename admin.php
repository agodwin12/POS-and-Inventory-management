<?php

session_start();


$servername = 'localhost';
$usernames = 'root';
$password = '';
$db = 'favourite';
$conn = mysqli_connect('localhost', 'root', '', 'favourite');
if ($conn) {
    echo 'done';
} else {
    echo 'failed';
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("Location: loginfile.php");
    exit;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="icon" href="images/picture.jpg">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="css/admin.css">
    <style>
        #clockdate {
            text-align: center;
            font-family: 'Digital-7', sans-serif;
            font-size: 60px;
            color: black;
            text-shadow: 0px 0px 1px #fff;
        }
        #date {
            font-size: 14px;
            font-family: Arial, sans-serif;
            color: #fff;
        }
    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/admin.css">

    <title>MANAGEMENT</title>
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
            <i class='bx bxs-bell' ></i>
            <span class="num">8</span>
        </a>
        <a href="#" class="profile">
            <img src="img/people.png">
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="#">Home</a>
                    </li>
                </ul>
            </div>

                <div id="clockdate">
                    <div id="clock"></div>
                    <div id="date"></div>
                </div>

        </div>

        <ul class="box-info">
            <li>
                <?php

                $sql = "SELECT COUNT(*) AS supplier_count FROM suppliers";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    $row = $result->fetch_assoc();
                    $supplierCount = $row["supplier_count"];
                } else {
                    $supplierCount = 0;
                }


                ?>
                <i class='bx bxs-calendar-check' ></i>
                <span class="text">
						<h3><?php echo $supplierCount; ?></h3>
						<p>suppliers</p>
					</span>
            </li>
            <li>
                <?php

                $sql = "SELECT COUNT(*) AS row_count FROM sales";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $rowCount = $row["row_count"];
                } else {
                    $rowCount = 0;
                }
                ?>
                <span class="text">

					</span>
                <i class='bx bxs-group' ></i>
                <span class="text">
						<h3><?php echo $rowCount; ?> </h3>
						<p>Quantity Sold</p>
					</span>
            </li>
            <li>
                <i class='bx bxs-dollar-circle' ></i>
                <?php

                $sql = "SELECT SUM(quantity) AS total_sales FROM sales";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $totalSales = $row['total_sales'];
                ?>
                <span class="text">
						<h3><?php echo $totalSales; ?> </h3>
						<p>Quantity Sold</p>
					</span>
            </li>
        </ul>


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Recent Orders</h3>
                    <i class='bx bx-search' ></i>
                    <i class='bx bx-filter' ></i>
                </div>


                <table>

                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>AGENT</th>
                        <th>QUANTITY</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT * FROM sales  ORDER BY date DESC LIMIT 7";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("no queries:" . $conn->error);

                    }
                    while ($row=$result->fetch_assoc()){
                        echo "            <tr>
                <td>$row[date]</td>
                  <td>$row[agent]</td>
                  <td>$row[quantity]</td>
                  
                 
                    </td>
            </tr>
";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="todo">
                <div class="head">
                    <h3>Suppliers</h3>
                    <i class='bx bx-plus'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                    <tr>
                        <th>image</th>
                        <th>Supplier Name </th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $sql = "SELECT * FROM suppliers";
                    $res = $conn->query($sql);
                    if (!$res){
                        echo 'invalid';
                    }
                    while ($row = $res->fetch_assoc()){
                        echo "<tr><td><img src='images/".$row['picture']."' width='40px' style='border-radius: 70%'></td> <td>".$row["name"]."</td> </tr>";
                    }

                    ?>


                    </tbody>

                </table>

            </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->



<script>
    function startTime() {
        const today = new Date();
        let hr = today.getHours();
        const min = today.getMinutes();
        const sec = today.getSeconds();
        const ap = hr < 12 ? 'AM' : 'PM';
        hr = hr === 0 ? 12 : hr > 12 ? hr - 12 : hr;

        // Add leading zeros to single-digit numbers
        hr = checkTime(hr);
        const formattedMin = checkTime(min);
        const formattedSec = checkTime(sec);

        document.getElementById('clock').innerHTML = `${hr}:${formattedMin}:${formattedSec} ${ap}`;

        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        const curWeekDay = days[today.getDay()];
        const curDay = today.getDate();
        const curMonth = months[today.getMonth()];
        const curYear = today.getFullYear();
        const date = `${curWeekDay}, ${curDay} ${curMonth} ${curYear}`;
        document.getElementById('date').innerHTML = date;

        setTimeout(startTime, 1000); // Update every second
    }

    function checkTime(i) {
        return i < 10 ? '0' + i : i;
    }

    // Start the clock
    startTime();
</script>
<script src="js/adminscript.js"></script>

</body>
</html>