<?php
require("includes/dbh.inc.php");
session_start();

$sql = "SELECT * FROM products WHERE categoryName='Storage'";
$result = mysqli_query($connection, $sql);
$queryResult = mysqli_num_rows($result);

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <style>
        .prodImg {
            width: 120%;
        }

        .prodContainer {
            padding-left: 5px;
            padding-bottom: 25px;
            padding-right: 40px;
            padding-top: 10px;
        }
    </style>
    <meta charset="UTF-8">
    <title>INSERT NAME OF SHOP</title>
    <link rel="stylesheet" href="stylesheets/display.css">
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
            <a href="./displayGPU.php">Graphics Cards</a>
            <a href="./displayCPU.php">CPUs</a>
            <a href="./displayMouseAndKey.php">Mouse & Keyboard</a>
            <a href="./displayRAM.php">RAM</a>
            <a href="./displayPowerSupplies.php">Power Supplies</a>
            <a href="./displayStorage.php" class="active">Storage</a>
            <a href="./displayMonitors.php">Monitors</a>
            <a href="./displayHeadsetsAndSpeakers.php">Headsets & Speakers</a>
        </div>
    </aside>
    <main id="mainMain">
        <table>
            <?php
            $itemsRemaining = $queryResult;

            $rowCount = intdiv($queryResult, 5) + 1;

            for ($r = 0; $r < $rowCount; $r++) {
                echo "<tr>";
                for ($c = 0; $c < 5; $c++) {
                    if ($itemsRemaining > 0) {
                        ?>
                        <td>
                            <?php
                            $row = mysqli_fetch_assoc($result);
                        $img = $row['productImage'];
                        $prodName = $row['prodName'];
                        $prodID = $row['productID']; ?>
                            <div class="prodContainer">
                                <form action="includes/addtocart.inc.php" method="post">
                                    <img class="prodImg" src="<?php echo $img ?>" />
                                    <p class="prodInfo"><b>Product: <br></b><?php echo "<a href=productView.php?productID=$prodID>$prodName</a>" ?></p>
                                    <p class="prodInfo"><b>Manufacturer: </b><?php echo $row['manufacturerName'] ?></p>
                                    <p class="prodInfo"><b>Price: </b>$<?php echo $row['prodPrice'] ?></p>
                                    <input type="hidden" name="productID" value="<?php echo $row['productID']; ?>" />
                                    <button class="addtocartbtn" type="submit" name="addtocart-submit"> Add to Cart </button><br><br><br>
                                </form>
                            </div>
                        </td>
                    <?php
                        $itemsRemaining--;
                    } ?>
            <?php
                }
                echo "</tr>";
            } ?>
        </table>

    </main>

    <footer>
        <p>&copy; Neweregg</p>
    </footer>

</body>

</html>
