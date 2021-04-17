<?php
session_start();
require_once("./includes/connection.php");
$productsID = $_GET['productID'];
$query = "SELECT * FROM products WHERE productID=$productsID";
$products = $db->query($query);
//reading from the database from the PDO object named $products

?>

<!DOCTYPE html>

<html lang="en">
<script src="scripts/productView.js"></script>

<head>
    <meta charset="UTF-8">
    <title>Neweregg</title>
    <link rel="stylesheet" href="stylesheets/productView.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
          <h1 id="verticalMenuH1">Shop PC Parts & Accessories</h1>
          <a href="./displayCategories.php?categoryName=GPU"><button type="button" class="sideMenuButton">Graphics Cards</button></a>
          <a href="./displayCategories.php?categoryName=CPU"><button type="button" class="sideMenuButton">CPUs</button></a>
          <a href="./displayCategories.php?categoryName=Keyboard and Mouse"><button type="button" class="sideMenuButton">Mouse & Keyboard</button></a>
          <a href="./displayCategories.php?categoryName=RAM"><button type="button" class="sideMenuButton">RAM</button></a>
          <a href="./displayCategories.php?categoryName=Power Supply"><button type="button" class="sideMenuButton">Power Supplies</button></a>
          <a href="./displayCategories.php?categoryName=Storage"><button type="button" class="sideMenuButton">Storage</button></a>
          <a href="./displayCategories.php?categoryName=Monitors"><button type="button" class="sideMenuButton">Monitors</button></a>
          <a href="./displayCategories.php?categoryName=Headsets and Speakers"><button type="button" class="sideMenuButton">Headsets & Speakers</button></a>
        </div>
    </aside>

    <main id="mainMain">
        <?php
        echo "<a href=\"javascript:history.go(-1)\" class='backbutton'>GO BACK</a>";
        ?>

            <div class="productView">
            <?php
            while ($row = $products->fetch(PDO::FETCH_ASSOC)) {
                $name = $row['prodName'];
                $image = $row['productImage'];
                $description = $row['productDescription'];
                $manufacturer = $row['manufacturerName'];
                $stock = $row['prodStock'];
                $price = $row['prodPrice'];
            }
            ?>
            <h2><?php echo $name ?></h2>
            <img src=<?php echo $image ?> id="productImg" />
            <p id="price"><b>Price: </b>$<?php echo $price ?></p>
            <!--
            <p><b>Stock: </b><?php //echo $stock?> </p>
            -->
            <p><b>Manufacturer: </b><?php echo $manufacturer ?> </p>
            <p id="itemDesc"><b>Item Description: </b><?php echo $description ?></p>
            <form action="includes/addtocart.inc.php" method="post">
                <div id="input_div">
                    <input type="number" name="productQuantity" size="2" value="1" maxlength="2" id="count" min="1" max="99">
                    <input type="button" value="-" id="mins" onclick="decrement()">
                    <input type="button" value="+" id="plus" onclick="increment()">
                </div>
                <p id="amount"><b>Amount: $<?php echo $price ?></b>
                </p>
                <input type="hidden" name="productID" value="<?php echo $productsID; ?>" />
                <button class="addtocartbtn" type="submit" name="addtocart-submit"> Add to Cart </button>
            </form>
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
