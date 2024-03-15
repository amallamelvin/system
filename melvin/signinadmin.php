<?php
include('connect.php');
session_start();


if(isset($_POST['submit'])){

    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $sql_insert = "INSERT into tbl_user SET
    fullname = '$fullname',
    email = '$email',
    username = '$username',
    password = '$password',
    active = 1"; 
    if($result_insert = mysqli_query($conn, $sql_insert)){
        ?>
        
        <script>
            alert('Successfully Create a New User');
            window.location.href='index.php';
        </script>

        <?php
    } else{

        if(!$result_insert) {die('Unsucessful added'. mysqli_error()); }
    }

    mysqli_close($conn);

    }
    ?>
