<?php
  require 'dbh.inc.php';
  require '../phpmailer/Exception.php';
  require '../phpmailer/PHPMailer.php';
  require '../phpmailer/SMTP.php';

  session_start();

  if (isset($_POST['confirmorder-submit'])) {

      //adding new card info
      $fullName = trim($_POST['fullName']);
      $cardNumber = trim($_POST['cardNumber']);
      $expiry = trim($_POST['expiry']);
      $cvc = $_POST['cvc'];

      //info for confirmation email
      $email = $_SESSION['email'];
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $phoneNumber = $_POST['phoneNumber'];
      $street = $_POST['street'];
      $city = $_POST['city'];
      $state = $_POST['state'];
      $zipcode = $_POST['zipcode'];
      $country = $_POST['country'];

      //session user info
      $customerID = $_SESSION['customerID'];

      //PHPMailer setup
      $mail = new PHPMailer\PHPMailer\PHPMailer();
      $mail->isSMTP();
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'tls';
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = '587';
      $mail->Username = 'txl.workspace@gmail.com';
      $mail->Password = '#txlwork';
      $mail->SetFrom('no-reply@neweregg.com');
      $mail->From = ('no-reply@neweregg.com');
      $mail->FromName = ('no-reply@neweregg.com');
      $mail->Subject = 'Your Order Confirmation';

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
                  if (!$hashedCVC) {
                      header("Location: ../checkout.php?error=hashedCVCfalse");
                      exit();
                  }
                  mysqli_stmt_bind_param($stmt, "sssss", $fullName, $hashedCC, $expiry, $hashedCVC, $customerID);
                  mysqli_stmt_execute($stmt);
                  header("Location: ../orderSuccess.php?order=success");
                  //clear cart and cartQuantity session array variables after order success
                  // unset($_SESSION['cart']);
                  // unset($_SESSION['cartQuantity']);
                  // exit();
              }
          } else {
              header("Location: ../checkout.php?error=sql-user");
              exit();
          }
      }



      //send order summary email
      $message = '<h2> Thank you for your order! </h2><br>
                  <h3>Shipping Details</h3><br>';
      $message .= "<label style='text-align:right; float:left; clear: both; width: 10em; margin-left: -3em'><b>Street Address:   </b></label>";
      $message .= "<p style='margin-left: 2em; float: left;'>".$street."</p><br>";
      $message .= "<label style='text-align:right; float:left; clear: both; width: 10em; margin-left: -3em'><b>City:   </b></label>";
      $message .= "<p style='margin-left: 2em; float: left;'>".$city."</p><br>";
      $message .= "<label style='text-align:right; float:left; clear: both; width: 10em; margin-left: -3em'><b>State:   </b></label>";
      $message .= "<p style='margin-left: 2em; float: left;'>".$state."</p><br>";
      $message .= "<label style='text-align:right; float:left; clear: both; width: 10em; margin-left: -3em'><b>Postal Code:   </b></label>";
      $message .= "<p style='margin-left: 2em; float: left;'>".$zipcode."</p><br>";
      $message .= "<label style='text-align:right; float:left; clear: both; width: 10em; margin-left: -3em'><b>Country:   </b></label>";
      $message .= "<p style='margin-left: 2em; float: left;'>".$country."</p><br><br>";
      $message .= "<h3 style='clear: both;'>Items in Your Order</h3><br>";

      //select all products in cart based on session cart array of productIDs
      if (isset($_SESSION['cart'])) {
          $cartContent = $_SESSION['cart'];
          $in = str_repeat('?,', count($cartContent) - 1) . '?'; // placeholders
          //select all products in cart based on session cart array of productIDs
          $sql = "SELECT * FROM products WHERE productID IN ($in); ";
          $stmt = $connection->prepare($sql); // prepare
          $types = str_repeat('s', count($cartContent)); //types
          $stmt->bind_param($types, ...$cartContent); // bind array at once
          $stmt->execute();
          $result = $stmt->get_result(); // get the mysqli result
      }

      $numRows = mysqli_num_rows($result);

      while ($row = mysqli_fetch_assoc($result)) {
          //append product name and quantity to email message body
          $message .= "<p><b>Product:</b>  ".$row['prodName']."</p><br>";
          $key = array_search($row['productID'], $_SESSION['cart']);

          $message .= "<p><b>Quantity:</b>  ".$_SESSION['cartQuantity'][$key]."</p><br>";
      }

      $mail->Body = $message;
      $mail->isHTML(true);
      $mail->AddAddress($email);

      if (!$mail->Send()) {
          $msg = "Mailer Error: " . $mail->ErrorInfo;
          header("Location: ../homepage.php?mailError=$msg");
          exit();
      }

      // unset($_SESSION['cart']);
      // unset($_SESSION['cartQuantity']);
      header("Location: ../orderSuccess.php");
      exit();
  } else {
      header("Location: ../homepage.php?checkout=badlink");
      exit();
  }