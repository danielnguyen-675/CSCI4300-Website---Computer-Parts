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

   //SELECT all orderIDs for use as link to an individual order
   $sql = "SELECT * FROM orders WHERE customerID=?";
   $stmt = mysqli_stmt_init($connection);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
       header("Location: viewOrders.php?error=SELECT-sqlerror='$stmt->error'");
       exit();
   } else {
       mysqli_stmt_bind_param($stmt, "s", $customerID);
       if (!mysqli_stmt_execute($stmt)) {
           header("Location: viewOrders.php?error=SELECT-sqlerror='$stmt->error'");
           exit();
       } else {
           $result = mysqli_stmt_get_result($stmt);
           // $row = mysqli_fetch_assoc($result);
           // $fetchedOrderID = $row['orderID'];
           // echo $fetchedOrderID;
       }
   }
   ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Neweregg</title>
        <link rel="stylesheet" href="stylesheets/viewOrders.css">
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
            <h1>View Your Orders</h1>

            <?php
              $numRows = mysqli_num_rows($result);
              if ($numRows == 0) {
                  echo "<p>You have no orders.</p>";
              } else {
                  while ($row = mysqli_fetch_assoc($result)) {
                      $fetchedOrderID = $row['orderID']; ?>
                <!-- <a href="orderView.php?orderID=<?php echo $row['orderID'] ?>" id="orderLinks">
                  View Order <?php //echo $row['orderID']?>
                </a> -->
                <form action="orderView.php" method="post">
                  <input id="viewOrdersSubmitBtn" type="submit" name="viewOrders-submit" value="Order # <?php echo $row['orderID'] ?>">
                  <input type="hidden" name="street" value="<?php echo $row['street']; ?>">
                  <input type="hidden" name="city" value="<?php echo $row['city']; ?>">
                  <input type="hidden" name="state" value="<?php echo $row['state']; ?>">
                  <input type="hidden" name="zipcode" value="<?php echo $row['zipcode']; ?>">
                  <input type="hidden" name="country" value="<?php echo $row['country']; ?>">
                  <input type="hidden" name="orderID" value="<?php echo $fetchedOrderID ?>">
                </form>
              <?php
                  }
              }
             ?>

        </main>

        <footer>
            <p>&copy; Neweregg</p>
        </footer>
    </body>
</html>
