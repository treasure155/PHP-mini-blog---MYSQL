<?php
require 'database.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the id of the post to delete
    $id = $_POST['id'] ?? null;

    // If id is not provided, redirect to index.php
    if (!$id) {
        header('Location: index.php');
        exit;
    }

    // Construct SQL DELETE statement
    $sql = 'DELETE FROM posts WHERE id = :id';
    $stmt = $pdo->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->execute(['id' => $id]);

    // Redirect to index.php after deleting the post
    header('Location: index.php');
    exit;
} else {
    // If request method is not POST, redirect to index.php
    header('Location: index.php');
    exit;
}
