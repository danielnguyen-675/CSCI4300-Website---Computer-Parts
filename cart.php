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
  $sql = "SELECT * FROM products WHERE productID IN ($in); ";
  $stmt = $connection->prepare($sql); // prepare
  $types = str_repeat('s', count($cartContent)); //types
  $stmt->bind_param($types, ...$cartContent); // bind array at once
  $stmt->execute();
  $result = $stmt->get_result(); // get the mysqli result
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Neweregg</title>
  <link rel="stylesheet" href="stylesheets/cart.css">
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
    <h1>Shopping Cart</h1>
    <?php
    //this echo prints out all SESSION variables for debug
    //echo '<pre>' . print_r($_SESSION, true) . '</pre>';
    //echo '<pre>line 66-67 in cart.php to remove/comment this debug info, this is displaying the current SESSION variables above</pre>';

    //unset session arrays for debug
    // unset($_SESSION['cart']);
    // unset($_SESSION['cartQuantity']);

    if (!empty($_SESSION['cart'])) {
    ?>

      <table>
        <tr>
          <?php
          $totalprice = 0;
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <th></th>
            <th>Product</th>
            <th>Price</th>
            <th></th>

        </tr>
        <tr>
          <td>
            <?php $img = $row['productImage']; ?>
            <a href="productView.php?productID=<?php echo $row['productID'] ?>"><img class="prodImg" src="<?php echo $img ?>" /></a>
          </td>
          <td class="tdborder" id="tdprodName">
            <p class="productName"><?php echo $row['prodName']; ?></p>
          </td>
          <td class="tdborder">
            <p class="productPrice">$<?php echo $row['prodPrice']; ?></p>
          </td>
          <td class="tdborder">
            <!--UPDATE CART-->
            <form action="includes/updatecart.inc.php" method="post">
              <?php $key = array_search($row['productID'], $_SESSION['cart']); ?>
              <label class="quantitylabel"> Quantity: </label>
              <input class="quantityinput" type="number" name="quantity" value="<?php echo $_SESSION['cartQuantity'][$key]; ?>" width="2em" min="1" max="99">
              <input type="hidden" name="productID" value="<?php echo $row['productID']; ?>">
              <button title="Please update one item at a time" class="updatecartbtn" type="submit" name="updatecart-submit"> Update </button>
            </form>
            <!--UPDATE CART-->
          </td>
          <td class="tdborder">
            <!--REMOVE FROM CART-->
            <form action="includes/removefromcart.inc.php" method="post">
              <input type="hidden" name="productID" value="<?php echo $row['productID']; ?>">
              <button id="removebtn" type="submit" name="removeitem-cart-submit"> Remove </button>
            </form>
            <!--REMOVE FROM CART-->
          </td>
        </tr>
      <?php $totalprice += $row['prodPrice'] * $_SESSION['cartQuantity'][$key];
          } ?>
      <tr>
        <td></td>
        <td>
          <p><b>Total Price: $<?php echo $totalprice; ?> </b></p>
        </td>
      </tr>
      </table>
      <form method="post" action="checkout.php">
        <!-- not needed rn
                  <input type="hidden">
                  <input type="hidden">
                  -->
        <button id="checkoutbtn" type="submit" name="checkout-submit"> Checkout </button>
      </form>
    <?php
    } else {
      echo "<h2> Your cart is empty. </h2>";
    }
    ?>
    <?php
    ?>
  </main>

  <footer>
    <p>&copy; Neweregg</p>
  </footer>
</body>

</html>