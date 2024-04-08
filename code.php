<?php
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
    session_start();

    if(isset($_POST['update'])){
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        $address = $_POST['address'];
        $date = $_POST['date'];
        $user = $_POST['user'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $salary = $_POST['salary'];


        $query = "UPDATE staff SET name='$name',address='$address',date_employed='$date',username='$user',password='$password',phoneNumber='$phone',salary='$salary'
                WHERE id='$user_id' ";
        $query_run = mysqli_query($conn, $query);
        if($query_run)
        {
            $_SESSION['update'] = "Staff Data Updated With Success ";
            header("location:Staff.php");
            exit(0);
        }
        

    }
?>