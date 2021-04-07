<?php
session_start();

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
        <title>INSERT NAME OF SHOP</title>
        <link rel="stylesheet" href="forgotpw.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="register.js"></script>
    </head>

    <body>
        <a href="shoppingView.html"><img src="uga.png" alt="University of Georgia"></a>

        <header>
            <h1 id="storeName">Neweregg</h1>
            <h3>Find exclusive, high-quality products!</h3>
        </header>

        <main>
          <form action="includes/forgotpw.inc.php" method="post">
            <h1>Reset Your Password</h1>
            <p> Enter your email to get a link in your inbox with instructions to reset your email. </p>
            <label for="email"><b> Email: </b></label>
            <input type="email" placeholder="Enter email here" name="email" required><br>

            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "notfound") {
                    echo '<p style="color:red">The email you entered was not found.</p>';
                }
            }
            if (isset($_GET['sentmail'])) {
                if ($_GET['sentmail'] == "success") {
                    echo '<p style="color:blue">Email has been sent. Check your email!</p>';
                }
                /*
                              elseif ($_GET['sentmail'] == "failed") {
                                  echo '<p style="color:red">Email has not been sent.</p>';
                              }
                */
            }
            if (isset($_GET['mailError'])) {
                echo '<p style="color:red"> Email has not been sent.  Mail system error - check header.</p>' . $_GET[$msg];
            }
            ?>

            <button id="forgotpwsubmit" type="submit" name="forgotpwd-submit"> Send email </button>
           </form>
        </main>

        <footer>
            <p>&copy; INSERT NAME OF SHOP HERE</p>
        </footer>
    </body>
</html>
