<?php
session_start();

if (isset($_SESSION['customerID'])) {
    header("Location: shoppingview.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>INSERT NAME OF SHOP</title>
        <link rel="stylesheet" href="stylesheets/forgotpw.css">
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
            <a href="#">About</a>
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
            <p>&copy; Neweregg</p>
        </footer>
    </body>
</html>
