<?php
require("includes/dbh.inc.php");
session_start();

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>INSERT NAME OF SHOP</title>
    <link rel="stylesheet" href="stylesheets/searchresults.css">
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

        <h2>Search Results</h2>
        <?php

          //stuff will only show if search field is submitted
          if (isset($_POST['search-submit'])) {
              $search = mysqli_real_escape_string($connection, $_POST['search']);
              $type;
              $sql = "SELECT * FROM products WHERE prodName LIKE '%$search%' OR productDescription LIKE '%$search%' OR manufacturerName LIKE '%$search%' OR categoryName LIKE '%$search%'";
              $result = mysqli_query($connection, $sql);
              //queryResult is
              $queryResult = mysqli_num_rows($result);

              //empty field entered
              if ($search == '') {
                  echo '<p> Please enter something to search.</p>';
              } elseif ($queryResult > 0) {
                  $itemsRemaining = $queryResult;
                  echo '<p style="font-size: 25px;"> You searched for <b>'.$search.'</b></p>'; ?>
                  <table>
                  <?php
                  //get how many rows to render based on amount of products
                  //intdivision of #ofProducts and 5(or products per row) then add 1 row if required (ex: 12 products = 3 rows)
                  $rowCount = intdiv($queryResult, 5) + 1;
                  //first loop for rows
                  for ($r = 0; $r < $rowCount; $r++) {
                      echo "<tr>";
                      //second loop for columns
                      for ($c = 0; $c < 5; $c++) {
                          //check if there are any more items to iterate through
                          if ($itemsRemaining > 0) {
                              ?>
                          <td>
                            <?php
                            $row = mysqli_fetch_assoc($result);
                              $img = $row['productImage']; ?>
                            <div class="prodContainer">
                              <form action="includes/addtocart.inc.php" method="post">
                                <img class="prodImg" src="<?php echo $img ?>" height="500" width="500"/>
                                <p class="prodInfo"><b>Product: <br></b><?php echo $row['prodName']?></p>
                                <p class="prodInfo"><b>Manufacturer: </b><?php echo $row['manufacturerName'] ?></p>
                                <p class="prodInfo"><b>Price: </b><?php echo $row['prodPrice'] ?></p>
                                <input type="hidden" name="productID" value="<?php echo $row['productID']; ?>"/>
                                <button class="addtocartbtn" type="submit" name="addtocart-submit"> Add to Cart </button><br><br><br>
                              </form>
                            </div>
                          </td>
                        <?php
                            //inside if statement
                            $itemsRemaining--;
                          } ?>
                      <?php
                      //2nd for loop closing bracket
                      }
                      echo "</tr>";
                      //1st for loop closing bracket
                  } ?>
                  </table>
            <?php
              } else {
                  echo '<p> There are no results matching your search.</p>';
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

</html>
