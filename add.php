<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact base</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      .container {
        max-width: 960px;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Add</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
           <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="data.php">Add</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-3">
      <h1>Add contact</h1>
      <form action="add.php" method="post">
        <div class="form-group">
          <label for="full_name">Name:</label>
          <input type="text" class="form-control" id="full_name" name="full_name">
        </div>
        <div class="form-group">
          <label for="post">Post:</label>
          <input type="text" class="form-control" id="post" name="post">
        </div>
        <div class="form-group">
          <label for="phones">Number(s):</label>
          <input type="text" class="form-control" id="phones" name="phones">
        </div>
        <div class="form-group">
          <label for="comment">Comment:</label>
          <input type="text" class="form-control" id="comment" name="comment">
        </div>
        <input type="submit" class="btn btn-primary" value="Add">
      </form>
    <?php
      if (isset($_POST['full_name']) &&
          isset($_POST['post']) &&
          isset($_POST['phones']) &&
          isset($_POST['comment'])) {
        $full_name = $_POST['full_name'];
        $post = $_POST['post'];
        $phones = $_POST['phones'];
        $comment = $_POST['comment'];
        $data = json_decode(file_get_contents('data.json'), true);
        array_push($data, array(
          'full_name' => $full_name,
          'post' => $post,
          'phones' => $phones,
          'comment' => $comment
        ));
        file_put_contents('data.json', json_encode($data));
        echo '<p>Contact added.</p>';
      }
    ?>
