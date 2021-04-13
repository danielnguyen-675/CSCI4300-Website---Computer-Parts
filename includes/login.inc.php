<?php
  if (isset($_POST['login-submit'])) {
      require "dbh.inc.php";

      $email = trim($_POST['email']);
      $password = trim($_POST['password']);

      if (empty($email) || empty($password)) {
          header("Location: ../login.php?error=emptyfields");
          exit();
      } else {
          $sql = "SELECT * FROM customer WHERE email=?; ";
          $stmt = mysqli_stmt_init($connection);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../login.php?error=sqlerror");
              exit();
          } else {
              mysqli_stmt_bind_param($stmt, "s", $email);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              //user found - begin
              if ($row = mysqli_fetch_assoc($result)) {
                  $pwdCheck = password_verify($password, $row['password']);
                  if ($pwdCheck == false) {
                      header("Location: ../login.php?error=wrongpass");
                      exit();
                  } else {
                      session_start();
                      $_SESSION['email'] = $row['email'];
                      $_SESSION['customerID'] = $row['customerID'];
                      $_SESSION['userStatus'] = $row['userStatus'];
                      header("Location: ../homepage.php?login=success");
                      exit();
                  }
              } else {
                  header("Location: ../login.php?error=wrongcredentials");
                  exit();
              }
          }
      }
      mysqli_stmt_close($stmt);
      mysqli_close($connection);
  } else {
      header("Location: ../login.php?login=badlink");
      exit();
  }
