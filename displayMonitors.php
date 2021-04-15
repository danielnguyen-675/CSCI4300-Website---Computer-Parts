<?php
require("./includes/connection.php");
session_start();

$query = "SELECT * FROM products WHERE categoryName='Monitors'";
$products = $db->query($query);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <style>
        .MonitorsImg {
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
        <a href="homepage.php">Home</a>
        <a href="about.php">About</a>
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
            <a href="./displayGPU.php"><button type="button" class="sideMenuButton">Graphics Cards</button></a>
            <a href="./displayCPU.php"><button type="button" class="sideMenuButton">CPUs</button></a>
            <a href="./displayMouseAndKey.php"><button type="button" class="sideMenuButton">Mouse & Keyboard</button></a>
            <a href="./displayRAM.php"><button type="button" class="sideMenuButton">RAM</button></a>
            <a href="./displayPowerSupplies.php"><button type="button" class="sideMenuButton">Power Supplies</button></a>
            <a href="./displayStorage.php"><button type="button" class="sideMenuButton">Storage</button></a>
            <a href="./displayMonitors.php" class="active"><button type="button" class="sideMenuButton">Monitors</button></a>
            <a href="./displayHeadsetsAndSpeakers.php"><button type="button" class="sideMenuButton">Headsets & Speakers</button></a>
        </div>


    </aside>
    <main id="mainMain">

    <div class="cell">
        <h2 class="shoppingViewTitlesALL">Our Selection</h2>
        <div class="row">
            <?php foreach ($products as $product) { ?>
            <div class="column">
                <form action="includes/addtocart.inc.php" method="post">
                  <a href="productView.php?productID=<?php echo $product['productID'] ?>">
                    <img
                            src="<?php echo $product['productImage'] ?> "
                            class="GPUImg"
                            alt="Picture Unavailable"
                    />
                  </a>
                  <a href="productView.php?productID=<?php echo $product['productID']?>" id="productViewLink"><?php echo $product['prodName']?></a>
                  <p><?php echo '$' . $product['prodPrice'] ?></p>
                  <p><?php echo 'Stock: ' . $product['prodStock'] ?></p>
                  <input type="hidden" name="productID" value="<?php echo $product['productID']; ?>" />
                  <button type="submit" class="addToCart" name="addtocart-submit"
                  <?php
                  if (isset($_SESSION['customerID'])) {
                      ?>
                      onclick="alert('Successfully added to cart!')">
                      <?php
                  } else {
                      ?>
                      onclick="location.href = localhost/computerparts/login.php">
                      <?php
                  }
                  ?>
                  Add To Cart</button>
                </form>
            </div>
            <?php } ?>
    </div>

    </main>

    <footer>
        <a href="#toTopPicture" id="toTop"><button type="button" class="sideMenuButton">Return to Top</button></a>
        <p>&copy; Neweregg</p>
    </footer>

</body>

</html>
