<?php
    require("./includes/dbh.inc.php");
    session_start();

    //do some queries rather than display products statically
    $ids = array(1002, 1003, 1004, 1016);
    $names = array();
    $prices = array();
    $images = array();
    foreach ( $ids as $i ) {
        $query = "SELECT prodName, prodPrice, productImage FROM products WHERE productID=$i";

        $row = $connection->query($query);
        foreach ( $row as $r ) {
            array_push($names, $r['prodName']);
            array_push($prices, $r['prodPrice']);
            array_push($images, $r['productImage']);
        }
    }

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Neweregg</title>
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


        <div class="search-container">
            <form action="searchresults.php" method="post">
                <input type="text" placeholder="Search.." name="search">
                <button name="search-submit" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

    <aside id="leftSide">
        <div class="vertical-menu">
            <a href="./displayGPU.php" >Graphics Cards</a>
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

        <div id="welcome">
            <br><br>
            <h1>Welcome to Neweregg!</h1>

            <p>Neweregg is the only place to buy computer parts for the best price.<br>
            For prices like these, you'll never set foot outside again!</p>
            <br><br>
        </div>

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

        <h2>Have a look at our current deals!</h2>

        <?php 
            for( $i = 0; $i < count($ids); $i++ ) {
                $id = $ids[$i];
                $name = $names[$i];
                $price = $prices[$i];
                $img = $images[$i];

                echo '<div class="productRow">';
                    echo '<a href="productView.php?productID='.$id.'">';
                        echo '<div class="productTile">';
                            echo '<img src="'.$img.'"><br>';
                            echo $name.'<br><br>';
                            echo '$'.$price;
                        echo '</div>';
                    echo '</a>';
                echo '</div>';

                echo '<div class="cf"><br></div>';
            }
        ?>
    </main>



    <footer>
        <p>&copy; Neweregg</p>
    </footer>

</body>

</html>
