<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>INSERT NAME OF SHOP</title>
    <link rel="stylesheet" href="stylesheets/submission.css">
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
        <a href="editaccount.php">Account</a>
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
        <h1>Thank you! Your order has been received.</h1>
    </main>

    <a href="./homepage.php" class='homepagebutton'>Take me back to homepage.</a>;


    <footer>
        <p>&copy; Neweregg</p>
    </footer>
</body>

</html>