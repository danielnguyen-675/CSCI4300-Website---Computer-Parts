<?php
require("./includes/dbh.inc.php");
session_start();

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>INSERT NAME OF SHOP</title>
    <link rel="stylesheet" href="stylesheets/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


        <div class="search-container">
            <form action="searchresults.php" method="post">
                <input type="text" placeholder="Search.." name="search">
                <button name="search-submit" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

    <aside id="leftSide">
        <div class="vertical-menu">
            <a href="./displayGPU.php" class="active">Graphics Cards</a>
            <a href="./displayCPU.php">CPUs</a>
            <a href="./displayMouseAndKey.php">Mouse & Keyboard</a>
            <a href="./displayRAM.php">RAM</a>
            <a href="./displayPowerSupplies.php">Power Supplies</a>
            <a href="./displayStorage.php">Storage</a>
            <a href="./displayMonitors.php">Monitors</a>
            <a href="./displayHeadsetsAndSpeakers.php">Headsets & Speakers</a>
        </div>
    </aside>

    <main id="mainMain">

        <h2>HOMEPAGE
        </h2>
        <h3>
            DISPLAY FEATURED ITEMS & DISCOUNTED ITEMS
        </h3>
        <?php
        if (isset($_GET['newPwd'])) {
            if ($_GET['newPwd'] == "success") {
                echo '<h2 style="text-align:center;"> Your password was updated! </h2>';
                echo '<p style="text-align:center;"> Please login with your new password. </p>';
            }
        }
        if (isset($_GET['activate'])) {
            if ($_GET['activate'] == "success") {
                echo '<h2 style="text-align:center;"> Your account was activated! </h2>';
            }
        }
        if (isset($_GET['user'])) {
            if ($_GET['user'] == "activationrequired") {
                echo '<h2 style="text-align:center;"> You need to activate your account. Check your email! </h2>';
            }
        }

        ?>

        <br>
        <br>
        <br>
        <br>
    </main>



    <footer>
        <p>&copy; Neweregg</p>
    </footer>

</body>

</html>
