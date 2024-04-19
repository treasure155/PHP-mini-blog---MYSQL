<?php
require 'database.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
  $title = $_POST['title'];
  $body = $_POST['body'];

  // Insert post into the database
  $sql = "INSERT INTO posts (title, body) VALUES (:title, :body)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['title' => $title, 'body' => $body]);

  // Redirect to index.php after adding the post
  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Blog Post</title>
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
      <h1 class="text-2xl font-semibold mb-6">Create Blog Post</h1>
      <form method="post">
        <div class="mb-4">
          <label for="title" class="block text-gray-700 font-medium">Title</label>
          <input type="text" id="title" name="title" placeholder="Enter post title" class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none">
        </div>
        <div class="mb-6">
          <label for="body" class="block text-gray-700 font-medium">Body</label>
          <textarea id="body" name="body" placeholder="Enter post body" class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none"></textarea>
        </div>
        <div class="flex items-center justify-between">
          <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
            Submit
          </button>
          <a href="index.php" class="text-blue-500 hover:underline">Home</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>