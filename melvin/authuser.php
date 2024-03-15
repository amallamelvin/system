<?php
session_start();

include('connect.php');

if (isset($_POST['submit'])) {
    $myusername = $_POST['email'];
    $mypassword = $_POST['password'];

    
    $sql = "SELECT * FROM users WHERE email = '$myusername'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password_hash'];

      
        if (password_verify($mypassword, $hashedPassword)) {
            $_SESSION['email'] = $myusername;
            ?>

            <script>
                alert("Login Successful");
                window.location.href = 'user.php';
            </script>

            <?php
        } else {
            ?>

            <script>
                alert("Your password is incorrect");
                window.location.href = 'index.php';
            </script>

            <?php
        }
    } else {
       
        die('Error: ' . mysqli_error($conn));
    }
} else {
    ?>

    <script>
        alert("Your username and password are empty");
        window.location.href = 'index.php';
    </script>

    <?php
}

mysqli_close($conn);
?>
