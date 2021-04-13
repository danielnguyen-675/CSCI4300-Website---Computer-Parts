<?php
require_once("./includes/connection.php");
$productsID = $_GET['productID'];
$query = "SELECT * FROM products WHERE productID=$productsID";
$products = $db->query($query);
//reading from the database from the PDO object named $products

?>

<!DOCTYPE html>

<html lang="en">
<script src="/scripts/productView.js"></script>

<head>
    <style>
        .productView {
            border: 1px solid black;
            padding: 20px 50px 100px;
        }

        .button {
            font: bold 11px Arial;
            text-decoration: none;
            background-color: #EEEEEE;
            color: #333333;
            padding: 2px 6px 2px 6px;
            border-top: 1px solid #CCCCCC;
            border-right: 1px solid #333333;
            border-bottom: 1px solid #333333;
            border-left: 1px solid #CCCCCC;
        }

        #productImg {
            width: 70%;
            margin-bottom: 5px;
            margin-right: 15px;
        }
    </style>

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
        <a href="#">Contact</a>
        <a href="editaccount.php">Account</a>
        <a href="#">Cart</a>
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
            <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
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
        <?php
        echo "<a href=\"javascript:history.go(-1)\" class='button'>GO BACK</a>";
        ?>
        <h3>
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
                <p>Price: $<?php echo $price ?></p>
                <p>Stock: <?php echo $stock ?> </p>
                <p>Manufacturer: <?php echo $manufacturer ?> </p>
                <p>Item Description: <?php echo $description ?></p>
                <div id="input_div">
                    <input type="text" size="5" value="1" id="count">
                    <input type="button" value="-" id="mins" onclick="minus()">
                    <input type="button" value="+" id="plus" onclick="plus()">
                </div>
                <h3>Amount: $<?php echo $price ?></h3>
                <input type="button" value="Add to cart" method="post" class="button">
            </div>
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
        <p>&copy; INSERT NAME OF SHOP HERE</p>
    </footer>



</body>


<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> main
