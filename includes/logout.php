<?php 
    session_start();
    $_SESSION['username'] = null;
    $_SESSION['user_id'] = null;
    $_SESSION['user_roll'] = null;

    header("Location: ../index.php");
?>