<?php
session_start();
include 'db/dbConnect.php';
if (isset($_SESSION['username'])) {


} else {
    header("Location: loginfile.php");
    exit;
}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/picture.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <style>
        #clockdate {
            text-align: center;
            font-family: 'Digital-7', sans-serif;
            font-size: 60px;
            color: #fff;
            text-shadow: 0px 0px 1px #fff;
        }
        #date {
            font-size: 14px;
            font-family: Arial, sans-serif;
            color: #fff;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>OUR SERVICES</title>
    <link rel="stylesheet" href="css/userHomes.css">
</head>
<body>
<div class="container">
    <h1 style="text-align: center; font-family: 'Roboto Light'; color: white; margin-bottom: 5px">WELCOME <?php echo $_SESSION["username"]?></h1>
    <div id="clockdate">
        <div id="clock"></div>
        <div id="date"></div>
    </div>
    <h1 class="heading">HOME</h1>
    <div class="box-container">
        <div class="box">
            <img src="images/sell.png" alt="">
            <h3><a href="sell.php" class="btn">SELL</a></h3>

        </div>
        <div class="box">
            <img src="images/review.png" alt="">
            <h3><a href="review.php" class="btn">TAKE A REVIEW</a></h3>

        </div>
        <div class="box">
            <img src="images/salesrecord.jpg" alt="">
            <h3><a href="userSale.php" class="btn">VIEW SALES</a></h3>

        </div>
        <div class="box">
            <img src="images/store.png" alt="">
            <h3><a href="availaibleProducts.php" class="btn">AVAILAIBLE PRODUCTS</a></h3>

        </div>
        <div class="box">
            <img src="images/settings.png" alt="">
            <h3><a href="userUpdate.php" class="btn">UPDATE PROFILE</a></h3>

        </div>
        <div class="box">
            <img src="images/logout.jpg" alt="">
            <h3> <a href="logout.php" class="btn">LOGOUT</a></h3>

        </div>
    </div>




    <script>
        function startTime() {
            const today = new Date();
            let hr = today.getHours();
            const min = today.getMinutes();
            const sec = today.getSeconds();
            const ap = hr < 12 ? 'AM' : 'PM';
            hr = hr === 0 ? 12 : hr > 12 ? hr - 12 : hr;

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

            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            return i < 10 ? '0' + i : i;
        }

        startTime();
    </script>
</div>
</body>
</html>