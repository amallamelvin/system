<?php
session_start();

include('connect.php');


if(isset($_POST['submit'])){

    $myusername = $_POST['email'];
    $mypassword = $_POST['password'];

    $sql = "SELECT * FROM adminlogin WHERE email = '$myusername' and password = '$mypassword' ";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    

    if($count > 0){
        

        $_SESSION['email'] = $myusername;
        ?>

        <script>
            alert("Login Successful");
            window.location.href='admintable.php';
        </script>

        <?php
       
    }
    
else {
        ?>
    
        <script>
            alert("Your username and password is incorrect");
            window.location.href='login.php';
        </script>

        <?php

        



        if(!$result) {die('Unsuccessfull added'. mysql_error()); } 

    
    }
} else {

    ?>

    <script>
    alert("Your username and password is empty");
    </script>

    <?php

    if(!$result) {die('Unsuccessfull added'. mysql_error()); } 

    header("location:login.php");
}

mysqli_close($conn);