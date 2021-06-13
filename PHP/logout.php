<?php
    session_start();
    unset($_SESSION['username']);
    $_SESSION['level'] = 0;
    header("Location: ../index.php");
    die();
?>