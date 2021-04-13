<?php
  require 'dbh.inc.php';
  session_start();

  if (isset($_POST['confirmorder-submit'])) {

      //adding new card info
      $fullName = trim($_POST['fullName']);
      $cardNumber = trim($_POST['cardNumber']);
      $expiry = trim($_POST['expiry']);
      $cvc = trim($_POST['cvc']);

      //session user info
      $customerID = $_SESSION['customerID'];

      //select user from db
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
                  //clear cart and cartQuantity session array variables after order success
                  unset($_SESSION['cart']);
                  unset($_SESSION['cartQuantity']);
                  exit();
              }
          } else {
              header("Location: ../checkout.php?error=sql-user");
              exit();
          }
      }
  } else {
      header("Location: ../homepage.php?checkout=badlink");
      exit();
  }
