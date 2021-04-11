<?php
  if (isset($_POST['editaccount-info-submit'])) {
      require 'dbh.inc.php';
      session_start();

      //updating personal info
      $firstName = trim($_POST['fName']);
      $lastName = trim($_POST['lName']);
      $address = trim($_POST['address']);
      $city = trim($_POST['city']);
      $state = trim($_POST['state']);
      $zipcode = trim($_POST['zipcode']);
      $phone = trim($_POST['phone']);
      $country = trim($_POST['country']);
      //session user info
      $customerID = $_SESSION['customerID'];

      //select user from db
      $sql = "SELECT * FROM customer WHERE customerID=?";
      $stmt = mysqli_stmt_init($connection);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../editaccount.php?error=sqlerror");
          exit();
      } else {
          mysqli_stmt_bind_param($stmt, "s", $customerID);
          mysqli_stmt_execute($stmt);
          //mysqli_stmt_store_result($stmt);
          $result = mysqli_stmt_get_result($stmt);
          //user found, begin
          if ($row = mysqli_fetch_assoc($result)) {
              //update address record with fields from address form
              $sql = "UPDATE address
                            SET street=?,
                                city=?,
                                state=?,
                                zipcode=?,
                                country=?
                            WHERE
                                customerID = (SELECT customerID FROM customer WHERE customerID=?);";
              $stmt = mysqli_stmt_init($connection);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                  header("Location: ../editaccount.php?error=address-sqlerror");
                  exit();
              } else {
                  mysqli_stmt_bind_param($stmt, "ssssss", $address, $city, $state, $zipcode, $country, $customerID);
                  mysqli_stmt_execute($stmt);
              }
              //update user name records with fields from address form
              $sql = "UPDATE customer
                            SET firstName=?,
                                lastName=?,
                                phoneNumber=?
                            WHERE
                                customerID = (SELECT customerID FROM customer WHERE customerID=?);";
              $stmt = mysqli_stmt_init($connection);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                  header("Location: ../editaccount.php?error=user-sqlerror");
                  exit();
              } else {
                  mysqli_stmt_bind_param($stmt, "ssss", $firstName, $lastName, $phone, $customerID);
                  mysqli_stmt_execute($stmt);
                  header("Location: ../editaccount.php?edit=success");
                  exit();
              }
          } else {
              header("Location: ../editaccount.php?error=sql-user");
              exit();
          }
      }
      mysqli_stmt_close($stmt);
      mysqli_close($connection);
  } else {
      header("Location: ../editaccount.php?error=badlink");
      exit();
  }
