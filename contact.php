<?php
    require("./includes/dbh.inc.php");
    require './phpmailer/Exception.php';
    require './phpmailer/PHPMailer.php';
    require './phpmailer/SMTP.php';
    session_start();

    $row = null;
    if (isset($_SESSION['customerID'])) {
        $customerID = $_SESSION['customerID'];
        $query = "SELECT email FROM customer WHERE customerID=$customerID";
        $row = $connection->query($query);
    }
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>INSERT NAME OF SHOP</title>
    <link rel="stylesheet" href="stylesheets/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a href="contact.php" class="active">Contact</a>
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

    <main>
        <div id="welcome">
            <br><br>
            <h1>Contact Us</h1>
            <br><br>
        </div>

        <p>
            <?php
                if (!isset($_SESSION['customerID'])) {
                    echo "Please login before filling out the form."; ?> Login <a href="login.php">HERE</a> <?php
                } else {
                    echo "For specific feedback, please contact us with the form below.  Otherwise, you can reach us at (505) 242-7700.  Your feedback is very appreciated!";
                }
             ?>
        </p>

        <form action="contactEmail.php" method="post">
            <fieldset <?php
                if (!isset($_SESSION['customerID'])) {
                    echo "disabled";
                } ?>>

                <legend>Contact Survey</legend>

                <label>Email:</label>
                <input type="text" name="email" value="<?php
                    if ($row) {
                        foreach ($row as $r) {
                            echo $r['email'];
                        }
                    }
                 ?>" disabled><br>

                <p>What would you rate our website out of 10?</p>
                <select name="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select><br>

                <p>Would your recommend our website to a friend?</p>
                <input type="radio" name="recommend" value="Yes">Yes
                <input type="radio" name="recommend" value="No">No<br>

                <p>What is your reason for contacting us today?</p>
                <select name="reason">
                    <option value="Site Issue">Site Issue</option>
                    <option value="Thanks and Praises">Thanks and Praises</option>
                    <option value="Site Suggestion">Site Suggestion</option>
                    <option value="Other">Other (Please specify below)</option>
                </select><br>

                <p>Please include any additional feedback below.</p>
                <textarea name="comments"></textarea><br>

                <input type="submit" value="Send Feedback">
            </fieldset>
        </form>
    </main>



    <footer>
        <p>&copy; Neweregg</p>
    </footer>

</body>

</html>
