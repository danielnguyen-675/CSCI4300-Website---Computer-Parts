<?php
session_start();

if (isset($_POST['addtocart-submit'])) {
    if ($_SESSION['userStatus'] == 0) {
        header("Location: ../homepage.php?user=activationrequired");
        exit();
    }
    require "dbh.inc.php";

    $productID = trim($_POST['productID']);
    if (isset($_POST['productQuantity'])) {
        $productQuantity = $_POST['productQuantity'];
    }

    if (empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (empty($_SESSION['cartQuantity'])) {
        $_SESSION['cartQuantity'] = array();
    }

    if (!array_push($_SESSION['cart'], $productID)) {
        header("Location: ../cart.php?cart=addtocartSESSIONFailed");
        exit();
    }

    if (!isset($_POST['productQuantity'])) {
        array_push($_SESSION['cartQuantity'], 1);
        header("Location: ../cart.php?cart=itemaddedQ1");
        exit();
    } else {
        array_push($_SESSION['cartQuantity'], $productQuantity);
        header("Location: ../cart.php?cart=itemaddedQn");
        exit();
    }

    header("Location: ../cart.php?cart=itemadded");
    exit();
} else {
    header("Location: ../homepage.php?checkout=badlink");
    exit();
}
