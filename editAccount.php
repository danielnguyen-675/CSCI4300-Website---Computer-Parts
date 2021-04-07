<?php 
    //require('database.php');

    //collect data from editAccount.html
    $fName = filter_input(INPUT_POST, 'fName');
    $lName = filter_input(INPUT_POST, 'lName');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $phone = filter_input(INPUT_POST, 'phone');

    //update non-empty fields
    if ( $fName != "" ) {
        //do stuff
    }

    if ( $lName != "" ) {
        //do stuff
    }

    if ( $email != "" ) {
        //do stuff
    }

    if ( $password != "" ) {
        //do stuff
    }

    if ( $phone != "" ) {
        //do stuff
    }

    //redirect to login page?
?>