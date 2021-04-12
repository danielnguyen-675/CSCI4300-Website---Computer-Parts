<?php
require("./includes/connection.php");
session_start();

$query = "SELECT * FROM products WHERE categoryName='Storage'";
$products = $db->query($query);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <style>
        .StorageImg {
            max-width: 1000%;
            max-height: 1000%;
            display: block;
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

        <table>
            <tr>
                <th>Storage for Sale</th>
            </tr>
            <?php foreach ($products as $product) { ?>
                <tr>
                    <td><?php echo $product['prodName'] ?></td>
                </tr>
                <tr>
                    <td>
                        <?php echo '$' . $product['prodPrice'] ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo 'Stock: ' . $product['prodStock'] ?> </td>
                </tr>
                <tr>
                    <td><img src="<?php echo $product['productImage'] ?> " class="StorageImg"></td>
                </tr>
            <?php } ?>
        </table>

    </main>

    <footer>
        <p>&copy; INSERT NAME OF SHOP HERE</p>
    </footer>

</body>

</html>