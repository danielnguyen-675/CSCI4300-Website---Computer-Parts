<?php
require 'includes/dbh.inc.php';
session_start();

//session user info
$customerID = $_SESSION['customerID'];

echo $customerID."<br>";

$sql = "SELECT * FROM customer WHERE customerID = ?";
$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../checkout.php?error=sqlerror");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "s", $customerID);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    //user found, begin
    $numrows = mysqli_num_rows($result);
    echo $numrows;
    $row = mysqli_fetch_assoc($result);
    echo $row['customerID'];


    /*
    if ($row = mysqli_fetch_assoc($result)) {

        //insert into paymentinfo table in DB with customerID foreign key
        $sql = "INSERT INTO paymentinfo (customerID) SELECT customerID FROM customer WHERE customerID=?; ";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../checkout.php?error=customerIDinsert-sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $customerID);
            mysqli_stmt_execute($stmt);
        }
        //update address record with fields from address form
        $sql = "UPDATE paymentinfo
                      SET cardholderName=?,
                          cardNumber=?,
                          expiryDate=?,
                          cvc=?
                      WHERE
                          customerID = (SELECT customerID FROM customer WHERE customerID=?);";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../confirmOrder.php?error=paymentinfoupdate");
            exit();
        } else {
            $hashedCC = password_hash($cardNumber, PASSWORD_DEFAULT);
            $hashedCVC = password_hash($cvc, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "sssss", $fullName, $hashedCC, $expiry, $hashedCVC, $customerID);
            mysqli_stmt_execute($stmt);
            header("Location: ../orderSuccess.php?order=success");
            exit();
        }

    } else {
        header("Location: ../checkout.php?error=sql-userQRESULT='$queryResult'");
        exit();
    }*/
}
