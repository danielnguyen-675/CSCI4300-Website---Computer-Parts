<?php
require("./includes/connection.php");
session_start();

$query = "SELECT * FROM products WHERE categoryName='Keyboard and Mouse'";
$products = $db->query($query);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <style>
        .MouseAndKeyImg {
            max-width: 1000%;
            max-height: 1000%;
            display: block;
        }
    </style>

    <meta charset="UTF-8">
    <title>Neweregg</title>
    <link rel="stylesheet" href="stylesheets/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <a href="homepage.php" id="toTopPicture"><img src="uga.png" alt="University of Georgia"></a>
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
            <h1 id="verticalMenuH1">Shop PC Parts & Accessories</h1>
            <a href="./displayGPU.php"><button type="button" class="sideMenuButton">Graphics Cards</button></a>
            <a href="./displayCPU.php"><button type="button" class="sideMenuButton">CPUs</button></a>
            <a href="./displayMouseAndKey.php" class="active"><button type="button" class="sideMenuButton">Mouse & Keyboard</button></a>
            <a href="./displayRAM.php"><button type="button" class="sideMenuButton">RAM</button></a>
            <a href="./displayPowerSupplies.php"><button type="button" class="sideMenuButton">Power Supplies</button></a>
            <a href="./displayStorage.php"><button type="button" class="sideMenuButton">Storage</button></a>
            <a href="./displayMonitors.php"><button type="button" class="sideMenuButton">Monitors</button></a>
            <a href="./displayHeadsetsAndSpeakers.php"><button type="button" class="sideMenuButton">Headsets & Speakers</button></a>
        </div>


    </aside>
    <main id="mainMain">

    <div class="cell">
        <h2 class="shoppingViewTitlesALL">Our Selection</h2>
        <div class="row">
            <?php foreach ($products as $product) { ?>
            <div class="column">
                <img
                        src="<?php echo $product['productImage'] ?> "
                        class="GPUImg"
                        alt="Picture Unavaiable"
                />
                <h4><?php echo $product['prodName'] ?></h4>
                <p><?php echo '$' . $product['prodPrice'] ?></p>
                <p><?php echo 'Stock: ' . $product['prodStock'] ?></p>
                <button type="button" class="addToCart" onclick="alert('Successully added to cart!')">Add To Cart</button>
            </div>
            <?php } ?>
    </div>

    </main>

    <footer>
        <a href="#toTopPicture" id="toTop"><button type="button" class="sideMenuButton">Return to Top</button></a>
        <p>&copy; INSERT NAME OF SHOP HERE</p>
    </footer>

</body>

</html>