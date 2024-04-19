<?php
//Database Creds

$host = 'localhost';
$port = 3306;
$dbName = 'blog';
$username = 'root';
$password = 'Uyioobong155@';

$dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8";

try {
    $pdo = new PDO($dsn, $username, $password);

    //Set Pdo to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'Database connected...';
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    //if there is an error catch it here
    echo 'connection failed: ' . $e->getMessage();
}
