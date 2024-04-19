<?php
require 'database.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$sql = 'SELECT * FROM posts WHERE id = :id';
$stmt = $pdo->prepare($sql);

$stmt->execute(['id' => $id]);

$post = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?= htmlspecialchars($post['title']) ?></title>
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
        <div class="md my-4">
            <div class="rounded-lg shadow-md mb-6">
                <div class="p-4">
                    <h2 class="text-xl font-semibold"><?= nl2br(htmlspecialchars($post['title'])) ?></h2>
                    <p class="text-gray-700 text-lg mt-2 mb-5"><?= nl2br(htmlspecialchars($post['body'])) ?></p>
                    <a href="index.php">Go Back</a>
                </div>
            </div>

            <a href="edit.php?id=<?= $post['id'] ?>" class="bg-green-500 text-white text-center px-4 py-2 
            rounded block w-full mb-4 hover:bg-green-600 focus:outline-none">Edit</a>

            <form action="delete.php" method="post">

                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="id" value="<?= $post['id'] ?> ">
                <button type="submit" name="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600
                focus:outline-none w-full">Delete</button>

            </form>
        </div>
    </div>
</body>

</html>