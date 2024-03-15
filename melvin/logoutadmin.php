<?php
session_start();

if(session_destroy())
{
    ?>

        <script>
            alert("Successfully Logout!");
            window.location.href='login.php';
        </script>

        <?php


}
?>