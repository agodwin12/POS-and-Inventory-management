<?php
$servername = 'localhost';
$usernames = 'root';
$password = '';
$db = 'favourite';
$conn = mysqli_connect('localhost','root','','favourite');
if ($conn){
    echo '';
}else {
    echo 'failed';
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/picture.jpg">
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/adminanalysis.css">
    <style type="text/css">
        #barChart{
            width: 700px;
            height: 500px;
        }
        #pieChart{
            width: 300px;
            height: 300px;
        }
    </style>
    <title>BUSINESS ANALYSIS</title>
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
    <div >
        <h2>Agent Sales</h2>
        <canvas id="barChart"></canvas>
    </div>
    <div >
        <h2>Top Selling Products</h2>
        <canvas id="pieChart"></canvas>
    </div>


    <?php

    $conn = mysqli_connect('localhost', 'root', '', 'favourite');
    if (!$conn) {
        echo "Problem in database connection! Contact administrator: " . mysqli_error();
    } else {

        $sql = "SELECT agent, product, quantity FROM sales";
        $result = mysqli_query($conn, $sql);

        $agentSales = [];
        $productSales = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $agent = $row['agent'];
            $product = $row['product'];
            $quantity = $row['quantity'];


            if (!isset($agentSales[$agent])) {
                $agentSales[$agent] = 0;
            }
            $agentSales[$agent] += $quantity;


            if (!isset($productSales[$product])) {
                $productSales[$product] = 0;
            }
            $productSales[$product] += $quantity;
        }


        $highestAgent = array_search(max($agentSales), $agentSales);

        $highestProduct = array_search(max($productSales), $productSales);

        $agentNames = json_encode(array_keys($agentSales));
        $agentSalesData = json_encode(array_values($agentSales));
        $productNames = json_encode(array_keys($productSales));
        $productSalesData = json_encode(array_values($productSales));
    }
    ?>

    <script>
        var ctxBar = document.getElementById('barChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: <?php echo $agentNames; ?>,
                datasets: [{
                    label: 'Agent Sales',
                    backgroundColor: '#3498db',
                    data: <?php echo $agentSalesData; ?>
                }]
            },
            options: {
                responsive: true,
                legend: { display: false },
                title: { display: true, text: 'Agent Sales' }
            }
        });

        var ctxPie = document.getElementById('pieChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: <?php echo $productNames; ?>,
                datasets: [{
                    data: <?php echo $productSalesData; ?>,
                    backgroundColor: ['#e74c3c', '#2ecc71', '#f1c40f', '#9b59b6', '#34495e']
                }]
            },
            options: {
                responsive: true,
                title: { display: true, text: 'Top Selling Products' }
            }
        });
    </script>

</section>
<!-- CONTENT -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/adminanalysis.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>



</body>
</html>