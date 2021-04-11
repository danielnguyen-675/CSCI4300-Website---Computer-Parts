<?php
  if (isset($_POST['editaccount-pw-submit'])) {
      require 'dbh.inc.php';
      session_start();

      //for updating password
      $currentPassword = trim($_POST['currentPassword']);
      $newPassword = trim($_POST['newPassword']);
      $confirmNewPassword = trim($_POST['confirmNewPassword']);
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
          //if user found, begin pwd check
          if ($row = mysqli_fetch_assoc($result)) {
              $pwdCheck = password_verify($currentPassword, $row['password']);
              if ($pwdCheck == false) {
                  header("Location: ../editaccount.php?error=wrongpass");
                  exit();
              //password verified, begin update
              } elseif ($pwdCheck == true) {
                  if ($newPassword !== $confirmNewPassword) {
                      header("Location: ../editaccount.php?error=passmismatch");
                  } else {
                      $sql = "UPDATE customer SET password = ? WHERE customerID = ?";
                      $stmt = mysqli_stmt_init($connection);
                      if (!mysqli_stmt_prepare($stmt, $sql)) {
                          header("Location: ../editaccount.php?error=sqlerror-pwd");
                          exit();
                      } else {
                          $hashedPwd = password_hash($newPassword, PASSWORD_DEFAULT);
                          mysqli_stmt_bind_param($stmt, "ss", $hashedPwd, $customerID);
                          mysqli_stmt_execute($stmt);
                          header("Location: ../editaccount.php?edit=success");
                          exit();
                      }
                  }
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
