<?php
   session_start();
   require 'includes/dbh.inc.php';

   //if user is not logged in, accessing this page redirects to login
   if (!isset($_SESSION['customerID'])) {
       header("Location: login.php");
       exit();
   }
   if ($_SESSION['userStatus'] == 0) {
       header("Location: homepage.php?user=activationrequired");
       exit();
   }
   if (!empty($_SESSION['cart'])) {
       $cartContent = $_SESSION['cart'];
       $in = str_repeat('?,', count($cartContent) - 1) . '?'; // placeholders
       //select all products in cart based on session cart array of productIDs
       $sql = "SELECT * FROM products WHERE productID IN ($in); ";
       $stmt = $connection->prepare($sql); // prepare
       $types = str_repeat('s', count($cartContent)); //types
       $stmt->bind_param($types, ...$cartContent); // bind array at once
       $stmt->execute();
       $result = $stmt->get_result(); // get the mysqli result
   }

   $firstName = $_POST['fName'];
   $lastName = $_POST['lName'];
   $phoneNumber = $_POST['phone'];
   $street = $_POST['address'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $zipcode = $_POST['zipcode'];
   $country = $_POST['country'];
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>INSERT NAME OF SHOP</title>
        <link rel="stylesheet" href="stylesheets/confirmOrder.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="scripts/editaccount.js"></script>
    </head>

    <body>
        <a href="homepage.php"><img id="ugalogo" src="uga.png" alt="University of Georgia"></a>

        <header>
            <h1 id="storeName">Neweregg</h1>
            <h3>Find exclusive, high-quality products!</h3>
        </header>

        <div class="mainNavigation">
            <a href="homepage.php">Home</a>
            <a href="contact.php">Contact</a>
            <a href="account.php">Account</a>
            <a href="cart.php" class="active">Cart</a>
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
          <h1 id="checkouth1">Checkout </h1>
          <h2 id="confirmh2"> Confirm Your Order</h2>
          <?php
            //this echo prints out all SESSION variables for debug
            //echo '<pre>' . print_r($_SESSION, true) . '</pre>';
           ?>
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
          <table>
            <tr>
            <?php
              $totalprice = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
              <th></th>
              <th>Product</th>
              <th>Price</th>
              <th id="thQuantity">Quantity</th>
              </tr>
            <tr>
              <td>
                <?php $img = $row['productImage']; ?>
                <a href="productView.php?productID=<?php echo $row['productID'] ?>"><img class="prodImg" src="<?php echo $img ?>"/></a>
              </td>
              <td class="tdborder" id="tdprodName">
                <p class="productName"><?php echo $row['prodName']; ?></p>
              </td>
              <td class="tdborder">
                <p class="productPrice">$<?php echo $row['prodPrice']; ?></p>
              </td>
              <td class="tdborder" id="tdQuantity">
                <?php $key = array_search($row['productID'], $_SESSION['cart']); ?>
                <p id="quantity"><?php echo $_SESSION['cartQuantity'][$key]; ?></p>
              </td>
              <td class="tdborder">
              </td>
            </tr>
            <?php $totalprice += $row['prodPrice'] * $_SESSION['cartQuantity'][$key];
            } ?>
            <tr>
              <td></td>
              <td>
                <p id="totalPrice"><b>Total Price: $<?php echo $totalprice; ?> </b></p>
              </td>
            </tr>
          </table>
          <div>
            <h2>Payment Information</h2>
            <p>Enter your payment information to complete your order</p>
            <form action="includes/confirmOrder.inc.php" method="post">
              <label>Full Name:</label>
              <input id="fullName" name="fullName" type="text" required>
              <span class="required" id="req1">*</span><br>

              <label>Card Number:</label>
              <input id="cardNumber" name="cardNumber" type="text" required>
              <span class="required" id="">*</span><br>

              <label>Expiry Date:</label>
              <input id="expiry" name="expiry" type="date" required>
              <span class="required" id="">*</span><br>

              <label>CVC:</label>
              <input id="cvc" name="cvc" type="text" required>
              <span class="required" id="">*</span><br>

              <input type="hidden" name="firstName" value="<?php echo $firstName; ?>"/>
              <input type="hidden" name="lastName" value="<?php echo $lastName; ?>"/>
              <input type="hidden" name="phoneNumber" value="<?php echo $phoneNumber; ?>"/>
              <input type="hidden" name="street" value="<?php echo $street; ?>"/>
              <input type="hidden" name="city" value="<?php echo $city; ?>"/>
              <input type="hidden" name="state" value="<?php echo $state; ?>"/>
              <input type="hidden" name="zipcode" value="<?php echo $zipcode; ?>"/>
              <input type="hidden" name="country" value="<?php echo $country; ?>"/>

              <input id="confirm" type="submit" value="Confirm and Pay" name="confirmorder-submit">
              <input id="reset" type="reset" value="Clear Fields"><br>
            </form>
          </div>
        </main>

        <footer>
            <p>&copy; Neweregg</p>
        </footer>
    </body>
</html>
