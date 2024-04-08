<?php
session_start();

$servername = 'localhost';
$usernames = 'root';
$password = '';
$db = 'favourite';
$conn = mysqli_connect('localhost','root','','favourite');
if (!$conn){
    echo 'failed';
}
$username = $_SESSION['username'];

if (isset($_SESSION['username'])) {


} else {
    header("Location: loginfile.php");
    exit;
}

if (isset($_POST['submit'])){
    $agent = $_POST['agent'];
    $rev = $_POST['rev'];
    $sql = "INSERT INTO review VALUES('','$agent','$rev')";
    $res = mysqli_query($conn,$sql);
    if ($res){
        echo 'good';
       header('location:userHome.php');
    }else{
        echo 'failed';
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="images/picture.jpg">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/reviews.css">
    <title>Review</title>
</head>
<body>
<div class="wrapper">
    <h2>Your review helps us grow</h2>
    <form action="" method="post">
        <div class="input">
            <input type="text" placeholder="Agent" name="agent" value="<?php echo $username; ?>">
        </div>
        <textarea name="rev" id="" cols="30" rows="5" placeholder="write review....." dirname=""></textarea>
        <div class="btn-group">
            <button type="submit" class="btn btn-success" name="submit">SUBMIT</button>
            <button type="reset" class="btn btn-primary"><a href="userHome.php">HOME</a></button>

        </div>
    </form>
</div>


<script>
    const allStar = document.querySelector('.rating .star')

    allStar.forEach((item, idx)=>{

        item.addEventListener('click', function () {
            let click=0
            allStar.forEach(i=>{
                i.classList.replace('bxs-star','bx-star')
                i.classList.remove('active')
            })
            for (let i=0; i<allStar.length;i++){
                if (i<= idx){
                    allStar[i].classList.replace('bx-star', 'bxs-star')
                    allStar[i].classList.add('active')
                }else {
                    allStar[i+1].style.setProperty('--i',click)
                    click++
                }
            }
        })
    })
</script>
</body>
</html>
