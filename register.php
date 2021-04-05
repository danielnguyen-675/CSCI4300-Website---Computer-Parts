<?php 

    $dsn = 'mysql:host=localhost; dbname=pcparts';
    $username='root';
    
    $password='';

    try {
        $db = new PDO($dsn, $username, $password);
        echo 'Connected to database successfully';
    } catch (PDOException $e)
    {
        $error=$e->getMessage();
        echo '<p> Unable to connect to database: ' .$error;
        exit();
    }

    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phoneNumber=$_POST['phone'];
    //PHP code + SQL code to QUERY into the DATABASE

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Registration Authentication</title>
</head>
<body>
    <main>
        <p>First name is: <?php echo $firstName; ?></p>
        <p>Last name is: <?php echo $lastName; ?></p>
        <p>Email is: <?php echo $email; ?></p>
        <p>Password is: <?php echo $password; ?></p>
        <p>Phone number is: <?php echo $phoneNumber; ?></p>
</main>
    
</body>
</html>

