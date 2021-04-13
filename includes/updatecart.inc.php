<?php
session_start();

if (isset($_POST['updatecart-submit'])) {
    if (isset($_POST['quantity'])) {
        $updatedQuantity = $_POST['quantity'];
        $productID = $_POST['productID'];
        //echo "<p>UPDATED QUANTITY: '.$updatedQuantity.'</p>";
        $key2 = array_search($productID, $_SESSION['cart']);
        $_SESSION['cartQuantity'][$key2] = $updatedQuantity;

        header("Location: ../cart.php?cart=updatedcart");
        exit();
    }
} else {
    header("Location: ../homepage.php?checkout=badlink");
    exit();
}
