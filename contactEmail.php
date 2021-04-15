<?php
    require("./includes/dbh.inc.php");
    require './phpmailer/Exception.php';
    require './phpmailer/PHPMailer.php';
    require './phpmailer/SMTP.php';
    session_start();

    if (isset($_SESSION['customerID'])) {
        //get email, because it isn't returned through form
        $customerID = $_SESSION['customerID'];
        $query = "SELECT email FROM customer WHERE customerID=$customerID";
        $row = $connection->query($query);
        $email;
        foreach ($row as $r) {
            $email = $r['email'];
        }

        //get fields
        $rating = filter_input(INPUT_POST, 'rating');
        $recommend = filter_input(INPUT_POST, 'recommend');
        $reason = filter_input(INPUT_POST, 'reason');
        $comments = filter_input(INPUT_POST, 'comments');

        //mail this bad boy
        try {
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = '587';
            $mail->isHTML(true);
            $mail->Username = 'txl.workspace@gmail.com';
            $mail->Password = '#txlwork';
            $mail->SetFrom('no-reply@neweregg.com');
            $mail->From = ('no-reply@neweregg.com');
            $mail->FromName = ('no-reply@neweregg.com');
            $mail->Subject = 'Your Feedback';

            //PHPMailer continuted...
            //Email message to user with activation instructions
            $message = '<p> Thank you for your feedback. <br></p>';
            $message .= '<p> If you did not request this, ignore this message.<br></p>';
            $message .= '<p> Here is what you sent: <br></p>';
            $message .= '<p>==============================</p>';
            $message .= '<p>What would you rate our website out of 10? '.$rating.'<br><br>';
            $message .= 'Would your recommend our website to a friend? '.$recommend.'<br><br>';
            $message .= 'What is your reason for contacting us today? '.$reason.'<br><br>';
            $message .= 'Please include any additional feedback below. '.$comments.'<br></p>';

            $mail->Body = $message;
            $mail->AddAddress($email);

            if (!$mail->Send()) {
                $msg = "Mailer Error: " . $mail->ErrorInfo;
                header("Location: ../register.php?mailError=$msg");
                exit();
            }
        } catch (phpmailerException $e) {
            echo $e->errorMessage(); //Error from PHPMailer
        } catch (Exception $e) {
            echo $e->getMessage(); //Other error messages
        }
    } else {
        header("Location: contact.php");
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

        <p>We have received your feedback!  An email of your responses will be sent to you now.</p>
    </main>



    <footer>
        <p>&copy; Neweregg</p>
    </footer>

</body>

</html>
