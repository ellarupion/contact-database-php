<html>
  <head>
    <title>Add Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Data Management</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
        </ul>
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
        <input type="submit" class="btn btn-primary" value="Добавить">
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
