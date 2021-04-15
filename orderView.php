<?php
   session_start();
   require 'includes/dbh.inc.php';

   //if user is not logged in, accessing this page redirects to login
   if (!isset($_SESSION['customerID'])) {
       header("Location: login.php");
       exit();
   }

   //fill shipping address form with customer info and address - personal info
   $customerID = $_SESSION['customerID'];

   //get POST variables
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $zipcode = $_POST['zipcode'];
   $country = $_POST['country'];
   $orderID = $_POST['orderID'];

   //fill shipping address form with customer info and address - personal info
   $sql = "SELECT * FROM customer WHERE customerID=?";
   $stmt = $connection->prepare($sql); // prepare
   if (!mysqli_stmt_prepare($stmt, $sql)) {
       header("Location: checkout.php?error=sqlerror1");
       exit();
   } else {
       mysqli_stmt_bind_param($stmt, "s", $customerID);
       mysqli_stmt_execute($stmt);
       $result = mysqli_stmt_get_result($stmt);
       $row = mysqli_fetch_assoc($result);
   }

   $firstName = trim($row['firstName']);
   $lastName = trim($row['lastName']);
   $phoneNumber = trim($row['phoneNumber']);
   ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>INSERT NAME OF SHOP</title>
        <link rel="stylesheet" href="stylesheets/orderView.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="scripts/editaccount.js"></script>
    </head>

    <body>
        <a href="homepage.php"><img src="uga.png" alt="University of Georgia"></a>

        <header>
            <h1 id="storeName">Neweregg</h1>
            <h3>Find exclusive, high-quality products!</h3>
        </header>

        <div class="mainNavigation">
            <a href="homepage.php">Home</a>
            <a href="#">About</a>
            <a href="contact.php">Contact</a>
            <a href="account.php" class="active">Account</a>
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
            <h1>Order View</h1>
            <h2>Order # <?php echo $orderID ?></h2>

            <div id="shippingDetails">
              <h2 id="shippingh2">Shipping Details</h2>
              <label class="shippinginfolabel">First Name: </label>
              <p class="shippinginfop"><?php echo $firstName; ?></p>
              <label class="shippinginfolabel">Last Name: </label>
              <p class="shippinginfop"><?php echo $lastName; ?></p>
              <label class="shippinginfolabel">Phone Number: </label>
              <p class="shippinginfop"><?php echo $phoneNumber; ?></p>
              <label class="shippinginfolabel">Street Address: </label>
              <p class="shippinginfop"><?php echo $street; ?></p>
              <label class="shippinginfolabel">City: </label>
              <p class="shippinginfop"><?php echo $city; ?></p>
              <label class="shippinginfolabel">State: </label>
              <p class="shippinginfop"><?php echo $state; ?></p>
              <label class="shippinginfolabel">Postal Code: </label>
              <p class="shippinginfop"><?php echo $zipcode; ?></p>
              <label class="shippinginfolabel" id="countryLabel">Country: </label>
              <p class="shippinginfop"><?php echo $country; ?></p>
            </div>
            <br>
            <br>
            <br>

            <?php

              //SELECT all orderIDs from orderdetails
              $sql = "SELECT * FROM orderdetails WHERE orderID=?";
              $stmt = mysqli_stmt_init($connection);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                  header("Location: orderView.php?error=SELECT-sqlerror='$stmt->error'");
                  exit();
              } else {
                  mysqli_stmt_bind_param($stmt, "s", $orderID);
                  if (!mysqli_stmt_execute($stmt)) {
                      header("Location: orderView.php?error=SELECT-sqlerror='$stmt->error'");
                      exit();
                  } else {
                      $result = mysqli_stmt_get_result($stmt);
                  }
              }
              ?>

              <table>
                <tr>
                <?php
                  $totalprice = 0;
              while ($row = mysqli_fetch_assoc($result)) {
                  $productID = $row['productID'];
                  $productQuantity = $row['productQuantity'];

                  //SELECT product from products table to get product info
                  $sql2 = "SELECT * FROM products WHERE productID=?";
                  $stmt2 = mysqli_stmt_init($connection);
                  if (!mysqli_stmt_prepare($stmt2, $sql2)) {
                      header("Location: orderView.php?error=SELECT-sqlerror='$stmt->error'");
                      exit();
                  } else {
                      mysqli_stmt_bind_param($stmt2, "s", $productID);
                      if (!mysqli_stmt_execute($stmt2)) {
                          header("Location: orderView.php?error=SELECT-sqlerror='$stmt->error'");
                          exit();
                      } else {
                          $result2 = mysqli_stmt_get_result($stmt2);
                      }
                  }
                  $products = mysqli_fetch_assoc($result2);
                  $img = $products['productImage'];
                  $prodName = $products['prodName'];
                  $prodPrice = $products['prodPrice']; ?>
                  <th></th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  </tr>
                  <tr>
                    <td>
                      <a href="productView.php?productID=<?php echo $row['productID'] ?>"><img class="prodImg" src="<?php echo $img ?>"/></a>
                    </td>
                    <td class="tdborder" id="tdprodName">
                      <p class="productName"><?php echo $prodName ?></p>
                    </td>
                    <td class="tdborder">
                      <p class="productPrice">$<?php echo $prodPrice ?></p>
                    </td>
                    <td class="tdborder">
                      <p id="quantity" class="productQuantity"><?php echo $productQuantity ?></p>
                    </td>
                  </tr>
                  <?php $totalprice += $prodPrice * $productQuantity; ?>

              <?php
              }
               ?>
                  <tr>
                    <td></td>
                    <td>
                      <p id="totalprice"><b>Total Price: $<?php echo $totalprice; ?> </b></p>
                    </td>
                  </tr>
                </table>


        </main>

        <footer>
            <p>&copy; Neweregg</p>
        </footer>
    </body>
</html>
