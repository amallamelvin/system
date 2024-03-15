<?php
session_start();

if(session_destroy())
{
    ?>

        <script>
            alert("Successfully Logout!");
            window.location.href='index.php';
        </script>

        <?php


}
?>