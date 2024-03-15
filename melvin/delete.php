<?php
if (isset($_GET['id'])) {
include("connect.php");
$id = $_GET['id'];
$sql = "DELETE FROM foods WHERE food_id='$id'";
if(mysqli_query($conn,$sql)){
    session_start();
    $_SESSION["delete"] = "Recipe Deleted Successfully!";
    header("Location:admintable.php");
}else{
    die("Something went wrong");
}
}else{
    echo "Book does not exist";
}
?>