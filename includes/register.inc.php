<?php
//check if this script page was accessed legitimately
if (isset($_POST['registration-submit'])) {
    require("dbh.inc.php");
    require('../phpmailer/Exception.php');
    require('../phpmailer/PHPMailer.php');
    require('../phpmailer/SMTP.php');

    //get text from fields
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['password2']);
    $firstName = trim($_POST['fName']);
    $lastName = trim($_POST['lName']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $zipcode = trim($_POST['zipcode']);
    $phone = trim($_POST['phone']);
    $country = trim($_POST['country']);

    //empty fields check
    if (empty($address) || empty($city) || empty($state) || empty($zipcode) || empty($phone) || empty($country)) {
        //    echo ($username $password $confirmPassword $name $email $address $city $state $zipcode $phone $country);
        echo "<h2>" . $email . "</h2>";
        header("Location: ../register.php?error=emptyfields&email=" . $email . "&firstname=" . $firstName . "&lastname=" . $lastName . "&address=" . $address . "&city=" . $city . "&state=" . $state . "&zipcode=" . $zipcode . "&phone=" . $phone . "&country=" . $country);
        exit();
        //invalid email format
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidemail&email=" . $email);
        exit();
        //check for matching passwords
    } elseif ($password !== $confirmPassword) {
        header("Location: ../register.php?error=passwordCheck&email=" . $email);
        exit();
        //password length check
    } elseif (strlen($password) < 5) {
        header("Location: ../register.php?error=passwordLength&email=" . $email);
        exit();
    } else {
        /*DUPLICATE AS BELOW CODE BLOCK
        //field checks passed - begin
        //now check if username is duplicate
        $sql = "SELECT email FROM customer WHERE email=?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            //if > 0, duplicate user/email found
            if ($resultCheck > 0) {
                header("Location: ../register.php?error=usertaken&email=" . $email);
                exit();
            }
        }
        */
        //check for duplicate email
        $sql = "SELECT * FROM customer WHERE email = ?; ";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=sqlerror-emailCheck");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            //mysqli_stmt_execute($stmt);
            if (!mysqli_stmt_execute($stmt)) {
                header("Location: ../register.php?SQLerror=selectEmailStmtFail");
                exit();
            }
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                //email found in DB - duplicate
                header("Location: ../register.php?error=emailtaken");
                exit();
            }
        }

        //no duplicates found - insert user info into DB
        $sql = "INSERT INTO customer (password, firstName, lastName, email, phoneNumber) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=userinfo-sqlerror");
            exit();
        } else {
            //password hashing
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sssss", $hashedPwd, $firstName, $lastName, $email, $phone);
            //mysqli_stmt_execute($stmt);
            if (!mysqli_stmt_execute($stmt)) {
                $sqlerror = $stmt->error;
                header("Location: ../register.php?SQLerror=INSERTINTOcustomerStmtFail&sqlError='$sqlerror'");
                exit();
            }
        }
        //insert into address table in DB with customerID foreign key
        $sql = "INSERT INTO address (customerID) SELECT customerID FROM customer WHERE email=?; ";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=userIDinsert-sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            //mysqli_stmt_execute($stmt);
            if (!mysqli_stmt_execute($stmt)) {
                $sqlerror = $stmt->error;
                header("Location: ../register.php?SQLerror=INSERTINTOaddressStmtFail&SQLERROR='$sqlerror'");
                exit();
            }
        }
        //update address record with fields from registration form
        $sql = "UPDATE address
                        SET street=?,
                            city=?,
                            state=?,
                            zipcode=?,
                            country=?
                        WHERE
                            customerID = (SELECT customerID FROM customer WHERE email=?);";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=address-sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssssss", $address, $city, $state, $zipcode, $country, $email);
            //mysqli_stmt_execute($stmt);
            if (!mysqli_stmt_execute($stmt)) {
                $sqlerror = $stmt->error;
                header("Location: ../register.php?SQLerror=UPDATEaddressSQLStmtFail&SQLERROR='$sqlerror'");
                exit();
            }

            //user account info and user address has been inserted
            //Send user activation email
            //PHPMailer setup
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
                $mail->Subject = 'Activate Your Account';

                //tokens - authentication
                $selector = bin2hex(random_bytes(8));
                $token = random_bytes(32);
                //url for user
                $url = "localhost/computerparts/account-activate.php?selector=" . $selector . "&validator=" . bin2hex($token);
                //token expiration
                $expires = date("U") + 3600;
                //insert into activation table in db
                $sql = "INSERT INTO useractivate (userActivateEmail, userActivateSelector, userActivateToken, userActivateExpires) VALUES (?, ?, ?, ?); ";
                $stmt = mysqli_stmt_init($connection);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../register.php?mailError=activatemailsqlerror");
                    exit();
                } else {
                    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssss", $email, $selector, $hashedToken, $expires);
                    //mysqli_stmt_execute($stmt);
                    if (!mysqli_stmt_execute($stmt)) {
                        $sqlerror = $stmt->error;
                        header("Location: ../register.php?SQLerror=INSERTINTOuseractivateSQLStmtFail&SQLERROR='$sqlerror'");
                        exit();
                    }
                }

                //PHPMailer continuted...
                //Email message to user with activation instructions
                $message = '<p> A new account was created with this email. <br></p>';
                $message .= '<p> If you did not request this, ignore this message.<br></p>';
                $message .= '<p> Here is your account activation link: <br></p>';
                $message .= '<a href="' . $url . '">' . $url . '</a>';
                $mail->Body = $message;
                $mail->AddAddress($email);

                if (!$mail->Send()) {
                    $msg = "Mailer Error: " . $mail->ErrorInfo;
                    header("Location: ../register.php?mailError=$msg");
                    exit();
                } else {
                    //all successful, redirect to submission message
                    header("Location: ../submission.php");
                    exit();
                }
            } catch (phpmailerException $e) {
                echo $e->errorMessage(); //Error from PHPMailer
            } catch (Exception $e) {
                echo $e->getMessage(); //Other error messages
            }
        }
    }
    //close db connection
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
} else {
    //this includes file should not be accessed directly - redirect to registration
    header("Location: ../register.php?registration=badlink");
    exit();
}
