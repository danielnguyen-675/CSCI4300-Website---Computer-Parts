<?php 
    require('connection.php');
    session_start();
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phoneNumber=$_POST['phone'];
    $userStatus = '1';

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password) & !empty($phoneNumber)) {

    //PHP code + SQL code to QUERY into the DATABASE
    $sqlquery = 'INSERT INTO customer 
                (firstName, lastName, email, password, phoneNumber, userStatus)
                VALUES (:firstName, :lastName, :email, :password, :phoneNumber, :userStatus)';

    $statement = $db->prepare($sqlquery);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':phoneNumber', $phoneNumber);
    $statement->bindValue(':userStatus', $userStatus);
    $statement->execute();
    $statement->closeCursor();

    //include an html back to the home page
    include('shoppingView.html');
    
    } else {
    //Go back to the registration page if failed. 
        
    }
