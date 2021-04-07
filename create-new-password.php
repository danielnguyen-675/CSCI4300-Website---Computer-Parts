<?php
session_start();

//if user is not logged in, going to this page will redirect to login page
/*if (!isset($_SESSION['userID'])) {
      header("Location: login.php");
      exit();
  }
*/
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>INSERT NAME OF SHOP</title>
        <link rel="stylesheet" href="forgotpw.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="register.js"></script>
    </head>

    <body>
        <a href="shoppingView.html"><img src="uga.png" alt="University of Georgia"></a>

        <header>
            <h1 id="storeName">Neweregg</h1>
            <h3>Find exclusive, high-quality products!</h3>
        </header>

        <main>
          <h1>Create a New Password</h1>
          <?php
            $selector = trim($_GET['selector']);
            $validator = trim($_GET['validator']);

            if (empty($selector) || empty($validator)) {
                echo "<p>Your request could not be validated.</p>";
                exit();
            } else {
                if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                    ?>
                  <form action="includes/reset-password.inc.php" method="post">
                    <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                    <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                    <!--<p> TESTING inside hidden </p>
                    <p> The selector is <?php //echo $selector;?></p>
                    <p> The validator is <?php //echo $validator;?></p> -->
                    <label> Password: </label>
                    <input type="password" name ="password" placeholder="Enter a new password" required> <br>
                    <label> Confirm Password: </label>
                    <input type="password" name ="confirmPassword" placeholder="Confirm the new password" required> <br>
                    <button type="submit" name="reset-password-submit"> Reset my password </button>
                  </form>

          <?php
                }
            }
           ?>

        </main>

        <footer>
            <p>&copy; INSERT NAME OF SHOP HERE</p>
        </footer>
    </body>
</html>