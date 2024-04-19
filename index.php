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
    <div class="container mx-auto p-4 mt-4">
        <?php foreach ($posts as $post) : ?>
            <div class="my-4">
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold"><a href="post.php?id=<?= $post['id'] ?>" class="text-blue-500 hover:underline"><?= htmlspecialchars($post['title']) ?></a></h2>
                        <p class="text-gray-700 text-lg mt-2"><?= nl2br(htmlspecialchars($post['body'])) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html>