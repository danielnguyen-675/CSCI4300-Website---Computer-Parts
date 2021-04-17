<?php
session_start();
require "includes/dbh.inc.php";

//if user is not logged in, going to this page will redirect to login page
/*if (!isset($_SESSION['userID'])) {
      header("Location: login.php");
      exit();
  }
*/
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Neweregg</title>
        <link rel="stylesheet" href="stylesheets/activate.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="scripts/register.js"></script>
    </head>

    <body>
        <a href="homepage.php"><img src="uga.png" alt="University of Georgia"></a>

        <header>
            <h1 id="storeName">Neweregg</h1>
            <h3>Find exclusive, high-quality products!</h3>
        </header>

        <div class="mainNavigation">
            <a class="active" href="homepage.php">Home</a>
            <a href="contact.php">Contact</a>
            <a href="account.php">Account</a>
            <a href="cart.php">Cart</a>
            <form action="includes/logout.inc.php" method="post">
                <?php
                if (isset($_SESSION['customerID'])) {
                    echo '<a id="logoutbutton" href="includes/logout.inc.php" name="logout-submit"> Logout </a>';
                //echo "<p> You are logged in </p>";
                } else {
                    //echo "<p> You are logged out </p>";
                }
                ?>
            </form>
        </div>

        <main>
          <?php
          try {
              $selector = trim($_GET['selector']);
              $validator = trim($_GET['validator']);
              $currentDate = date("U");
          } catch (Exception $e) {
              echo "<p>Your request could not be validated.</p>";
              exit();
          }


          if (empty($selector) || empty($validator)) {
              echo "<p>Your request could not be validated.</p>";
              exit();
          } else {
              //echo '<h1> Your account has been activated! </h1>';
              if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                  //$sql = "SELECT * FROM useractivate WHERE userActivateSelector = ? AND userActivateExpires >= ?; ";
                  $sql = "SELECT * FROM useractivate WHERE userActivateSelector = ?; ";
                  $stmt = mysqli_stmt_init($connection);
                  if (!mysqli_stmt_prepare($stmt, $sql)) {
                      header("Location: account-activate.php?error=sqlerror-findToken");
                      exit();
                  } else {
                      //mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
                      mysqli_stmt_bind_param($stmt, "s", $selector);
                      mysqli_stmt_execute($stmt);

                      $result = mysqli_stmt_get_result($stmt);
                      if (!$row = mysqli_fetch_assoc($result)) {
                          echo 'fetch_assoc failed';
                          header("Location: account-activate.php?error=invalidRequest1&selector=" . $selector . "&validator=" . $validator);
                          exit();
                      } else {
                          $tokenBin = hex2bin($validator);
                          $tokenCheck = password_verify($tokenBin, $row['userActivateToken']);
                          if ($tokenCheck == false) {
                              header("Location: account-activate.php?error=invalidRequest2");
                              exit();
                          } elseif ($tokenCheck == true) {
                              $tokenEmail = $row['userActivateEmail'];

                              $sql = "SELECT * FROM customer WHERE email = ?; ";
                              $stmt = mysqli_stmt_init($connection);
                              if (!mysqli_stmt_prepare($stmt, $sql)) {
                                  header("Location: account-activate.php?error=sqlerror-findEmail");
                                  exit();
                              } else {
                                  mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                  mysqli_stmt_execute($stmt);

                                  $result = mysqli_stmt_get_result($stmt);
                                  if (!$row = mysqli_fetch_assoc($result)) {
                                      header("Location: account-activate.php?error=invalidRequest3&selector=" . $selector . "&validator=" . $validator);
                                      exit();
                                  } else {
                                      $sql = "UPDATE customer SET userStatus = '1' WHERE email = ?; ";
                                      $stmt = mysqli_stmt_init($connection);
                                      if (!mysqli_stmt_prepare($stmt, $sql)) {
                                          header("Location: account-activate.php?error=invalidRequest4&selector=" . $selector . "&validator=" . $validator);
                                          exit();
                                      } else {
                                          mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                          mysqli_stmt_execute($stmt);

                                          echo "<p>STATUS UPDATED.</p>";

                                          $sql = "DELETE FROM useractivate WHERE userActivateEmail = ?; ";
                                          $stmt = mysqli_stmt_init($connection);
                                          if (!mysqli_stmt_prepare($stmt, $sql)) {
                                              header("Location: account-activate.php?error=sqlerror-actDel");
                                              exit();
                                          } else {
                                              mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                              mysqli_stmt_execute($stmt);
                                              //header("Location: account-activate.php?activate=success&selector=" . $selector . "&validator=" . $validator);
                                              $sql = "SELECT * FROM customer WHERE email=?; ";
                                              $stmt = mysqli_stmt_init($connection);
                                              if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                  header("Location: ../login.php?error=sqlerror");
                                                  exit();
                                              } else {
                                                  mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                                  mysqli_stmt_execute($stmt);
                                                  $result = mysqli_stmt_get_result($stmt);
                                                  $row = mysqli_fetch_assoc($result);
                                                  if (isset($_SESSION['customerID'])) {
                                                      $_SESSION['userStatus'] = $row['userStatus'];
                                                      header("Location: homepage.php?activate=success");
                                                      echo '<h1> Your account has been activated! </h1>';
                                                  } else {
                                                      header("Location: homepage.php?activate=success");
                                                      echo '<h1> Your account has been activated! </h1>';
                                                  }
                                                  //exit();
                                              }
                                          }
                                      }
                                  }
                              }
                          }
                      }
                  }
              }
              mysqli_stmt_close($stmt);
              mysqli_close($connection);
          }
          ?>
        </main>

        <footer>
            <p>&copy; Neweregg</p>
        </footer>
    </body>
</html>
