<?php 
    session_start();

    $_SESSION['email'] = '';
    $_SESSION['password'] = '';

    session_destroy();

    header('Location: ../index.php');
?>