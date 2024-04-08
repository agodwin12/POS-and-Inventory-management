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


if(isset($_POST['prod'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $filename = $_FILES["file"]["name"];
    $tmpName = $_FILES["file"]["tmp_name"];
    $newfilename =uniqid(). "-" . $filename;

    move_uploaded_file($tmpName, 'images/'. $newfilename);

    $query ="INSERT INTO products VALUES('','$name','$qty','$price','$newfilename')";
    $check =  mysqli_query($conn, $query);
    if ($check){
        echo '';
        header("location:adminAvailaibleProducts.php");
    }else{
        echo '';
    }

    if (empty($name) || empty($position) || empty($address) || empty($date) || empty($user) || empty($password) || empty($phone) || empty($newfilename) || empty($salary)){
        $errorMessage = "All fields Required";

    }



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
    <style>
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <link rel="stylesheet" href="css/adminproducts.css">
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

    <!-- NAVBAR -->
    <div class="topic">
        <h1 style="text-align: center; text-decoration: underline">AVAILAIBLE PRODUCTS</h1>
    </div>

    <main>
        <button id="myBtn" class="btn btn-primary mb-5">ADD PRODUCT</button>


        <div id="myModal" class="modal">


            <div class="modal-content">
                <span class="close">&times;</span>
                <p class="mb-3" style="text-align: center; text-decoration: underline">Add to inventory</p>


                <form class="form-horizontal" method="post" >
                    <div class="form-group mb-3">

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Product Name">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="price" id="price" placeholder="Enter Product Price">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="qty" id="qty" placeholder="Enter Quantity">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="file" id="file" placeholder="Select product image">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success" name="prod">Add Products</button>
                        </div>
                    </div>


                </form>
            </div>

        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>PRODUCT</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>IMAGE</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if (!$result) {
                die("no queries:" . $conn->error);

            }
            while ($row=$result->fetch_assoc()){
                echo "            <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                  <td>$row[price]</td>
                  <td>$row[quantity]</td>
                   <td><img src='images/".$row['picture']."' width='100px'></td>
            </tr>
";
            }
            ?>

            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>PRODUCT</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>IMAGE</th>
            </tr>
            </tfoot>
        </table>
    </main>


</section>
<!-- CONTENT -->


<script>
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


</script>

</body>
</html>