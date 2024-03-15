<?php
include('connect.php');
session_start();

if (isset($_POST['submit'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password']; 

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql_insert = "INSERT INTO users (fullname, email, username, password_hash, active) VALUES (?, ?, ?, ?, 1)";

    $stmt = mysqli_prepare($conn, $sql_insert);
    mysqli_stmt_bind_param($stmt, 'ssss', $fullname, $email, $username, $hashedPassword);

    if (mysqli_stmt_execute($stmt)) {
        ?>
        <script>
            alert('Successfully Create a New User');
            window.location.href='index.php';
        </script>
        <?php
    } else {
   
        die('Unsuccessful addition: ' . mysqli_error($conn));
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>