<?php
session_start();

if (isset($_POST['addtocart-submit'])) {
    if ($_SESSION['userStatus'] == 0) {
        header("Location: ../homepage.php?user=activationrequired");
        exit();
    }
    require "dbh.inc.php";

    $productID = trim($_POST['productID']);

    //if isset, called from productView.php
    if (isset($_POST['productQuantity'])) {
        $productQuantity = $_POST['productQuantity'];
    }

    if (empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (empty($_SESSION['cartQuantity'])) {
        $_SESSION['cartQuantity'] = array();
    }

    /*
    if (!array_push($_SESSION['cart'], $productID)) {
        header("Location: ../cart.php?cart=addtocartSESSIONFailed");
        exit();
    }
    */

    if (!isset($_POST['productQuantity'])) {
        //if not adding to cart from productView, do below block
        $key = array_search($productID, $_SESSION['cart']);
        //if item doesnt exist in cart, do below (first time entry of item)
        if ($key === false) {
            array_push($_SESSION['cart'], $productID);
            array_push($_SESSION['cartQuantity'], 1);
            header("Location: ../cart.php?cart=itemaddedQ1-KEYNOTFOUND&=keyIS='$key'");
            exit();
        } else {
            //item was found in SESSION cart, add 1 to quantity
            //because not called from productView but elsewhere
            $_SESSION['cartQuantity'][$key] += 1;
            header("Location: ../cart.php?cart=itemaddedQ1-KEYFOUND");
            exit();
        }
    } else {
        //this file was called from productView with possible user desired quantity
        //this else only executes when called from productView
        $key = array_search($productID, $_SESSION['cart']);
        if ($key === false) {
            //item was not found in SESSION cart, add to cart with user quantity
            array_push($_SESSION['cart'], $productID);
            array_push($_SESSION['cartQuantity'], $productQuantity);
            header("Location: ../cart.php?cart=itemadded(n='$productQuantity')");
            exit();
        } else {
            //item was found in SESSION cart, add to cart with user quantity and add to existing item
            $_SESSION['cartQuantity'][$key] += $productQuantity;
            header("Location: ../cart.php?cart=itemadded('$productQuantity')items");
            exit();
        }
    }
} else {
    header("Location: ../homepage.php?checkout=badlink");
    exit();
}
