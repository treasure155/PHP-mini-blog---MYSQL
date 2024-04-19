<?php
require 'database.php';

// Prepare a select statement
$stmt = $pdo->prepare('SELECT * FROM posts');
$stmt->execute();
// Fetch results
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>TechAlpha Blog</title>
</head>

<body class="bg-gray-100">
    <header class="bg-blue-500 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-semibold">TechAlpha Blog</h1>
            <div class="flex items-center">
                <a href="index.php" class="text-white mr-4">Home</a>
                <a href="create.php" class="text-white mr-4">Create Post</a>
                <a href="about.php" class="text-white mr-4">About</a>
                <a href="contact.php" class="text-white">Contact</a>
            </div>
        </div>
    </header>