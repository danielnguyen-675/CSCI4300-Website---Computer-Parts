<?php
$dsn = 'mysql:host=localhost; dbname=pcparts';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error = $e->getMessage();
    echo '<p> Unable to connect to database: ' . $error;
    exit();
}