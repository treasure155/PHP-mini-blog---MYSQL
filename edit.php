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

$isPutRequest = $_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['_method'] ?? '') === 'put';

if ($isPutRequest) {
  $title = htmlspecialchars($_POST['title'] ?? '');
  $body = htmlspecialchars($_POST['body'] ?? '');

  $sql = 'UPDATE posts SET title = :title, body = :body WHERE id = :id';
  $stmt = $pdo->prepare($sql);
  $params = [
    'title' => $title,
    'body' => $body,
    'id' => $id,
  ];
  $stmt->execute($params);
  header('Location: index.php');
  exit;
}

// Initialize $title and $body with values from the database
$title = $post['title'] ?? '';
$body = $post['body'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Blog Post</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
  <div class="flex justify-center mt-10">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
      <h1 class="text-2xl font-semibold mb-6">Update Blog Post</h1>
      <form method="post">
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" value="<?= $post['id'] ?>">

        <div class="mb-4">
          <label for="title" class="block text-gray-700 font-medium">Title</label>
          <input type="text" id="title" name="title" placeholder="Enter post title" class="w-full px-4 py-2 border 
          rounded focus:ring focus:ring-blue-300 focus:outline-none" value="<?= $title ?>">
        </div>
        <div class="mb-6">
          <label for="body" class="block text-gray-700 font-medium">Body</label>
          <textarea id="body" name="body" placeholder="Enter post body" class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none"><?= $body ?></textarea>
        </div>
        <div class="flex items-center justify-between">
          <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
            Submit
          </button>
          <a href="index.php" class="text-blue-500 hover:underline">Back to Posts</a>
        </div>
      </form>

    </div>
  </div>
</body>

</html>