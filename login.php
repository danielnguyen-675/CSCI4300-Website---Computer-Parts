<?php
session_start();

if (isset($_SESSION['customerID'])) {
    header("Location: account.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Neweregg</title>
        <link rel="stylesheet" href="stylesheets/login.css">
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
            <a href="homepage.php">Home</a>
            <a href="contact.php">Contact</a>
            <a href="account.php" class="active">Account</a>
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
          <form action="includes/login.inc.php" method="post">
            <h1 id="loginh1">Login</h1>

            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "notfound") {
                    echo '<p style="color:red; margin-left: 3em;">The email you entered was not found.</p>';
                }
                if ($_GET['error'] == "wrongcredentials") {
                    echo '<p style="color:red; margin-left: 3em;">The email or password you entered was not found.</p>';
                }
            }
            if (isset($_GET['sentmail'])) {
                if ($_GET['sentmail'] == "success") {
                    echo '<p style="color:blue">Email has been sent. Check your email!</p>';
                }
            }
            if (isset($_GET['mailError'])) {
                echo '<p style="color:red"> Email has not been sent.  Mail system error - check header.</p>' . $_GET[$msg];
            }
            ?>

            <label for="email"><b> Email: </b></label>
            <input type="email" placeholder="Enter email here" name="email" required><br>
            <label for="password"><b> Password: </b></label>
            <input type="password" placeholder="Password" name="password" required><br>

            <button id="loginsubmit" type="submit" name="login-submit"> Login </button><br>
          </form>
          <form>
            <a href="register.php"> <button type="button" name="register-submit" value="ignore" formnovalidate> Register </button> </a>
          </form>
          <a id="forgotpwlink" href="forgotpw.php"> Forgot your password? </a>
        </main>

        <footer>
            <p>&copy; Neweregg</p>
        </footer>
    </body>
</html>
