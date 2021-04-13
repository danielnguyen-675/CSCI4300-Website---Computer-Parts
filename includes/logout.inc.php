<?php
    session_start();
    if (isset($_SESSION['customerID'])) {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../homepage.php");
        exit();
    } else {
        header("Location: ../homepage.php?error=badlink");
        exit();
    }
