<?php
session_start();
include('connect.php');

if(isset($_SESSION['email'])){

    $user_check = $_SESSION['email'];

    $ses_sqli = mysqli_query($conn,"SELECT * from adminlogin where email = '$user_check'");

    $row = mysqli_fetch_array($ses_sqli,MYSQLI_ASSOC);



    if(!isset($_SESSION['email'])){
        header("Location: index.php");
   
}
} else {
        header("Location: index.php");
}
?>
