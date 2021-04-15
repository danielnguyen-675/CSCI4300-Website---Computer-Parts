<?php
$dsn = 'mysql:host=localhost:3555; dbname=pcparts';
$username = 'root';
$password = 'root';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error = $e->getMessage();
    echo '<p> Unable to connect to database: ' . $error;
    exit();
}
