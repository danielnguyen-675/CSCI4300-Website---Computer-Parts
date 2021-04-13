<?php
session_start();

if (isset($_POST['removeitem-cart-submit'])) {
    if ($_SESSION['userStatus'] == 0) {
        header("Location: ../homepage.php?user=activationrequired");
        exit();
    }
    require "dbh.inc.php";

    $productID = trim($_POST['productID']);

    $key = array_search($productID, $_SESSION['cart']);

    if ($key !== false) {
        unset($_SESSION['cart'][$key]);
        unset($_SESSION['cartQuantity'][$key]);
    }

    $_SESSION["cart"] = array_values($_SESSION["cart"]);
    $_SESSION["cartQuantity"] = array_values($_SESSION["cartQuantity"]);

    header("Location: ../cart.php?cart=itemremoved");
    exit();
} else {
    header("Location: ../homepage.php?checkout=badlink");
    exit();
}
