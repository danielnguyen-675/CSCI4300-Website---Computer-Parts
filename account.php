<?php
   session_start();
   require 'includes/dbh.inc.php';

   //if user is not logged in, accessing this page redirects to login
   if (!isset($_SESSION['customerID'])) {
       header("Location: login.php");
       exit();
   }

   //fill shipping address form with customer info and address - personal info
   $customerID = $_SESSION['customerID'];

   ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>INSERT NAME OF SHOP</title>
        <link rel="stylesheet" href="stylesheets/account.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="scripts/editaccount.js"></script>
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
            <h1>Account Features</h1>
            <form action="editaccount.php">
              <input class="accountbuttons" type="submit" value="Edit Your Info" />
            </form>
            <form action="viewOrders.php">
              <input class="accountbuttons" type="submit" value="View Orders" />
            </form>
        </main>

        <footer>
            <p>&copy; Neweregg</p>
        </footer>
    </body>
</html>
