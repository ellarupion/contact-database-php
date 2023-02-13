<html>
  <head>
    <title>Add Data</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Edit</a>
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
    </nav>
    <h1>Edit info</h1>
    <?php
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $data = json_decode(file_get_contents('data.json'), true);
        if (isset($data[$id])) {
          $item = $data[$id];
          echo '<form action="update.php" method="post">';
          echo '<input type="hidden" name="id" value="' . $id . '">';
          echo '<label for="full_name">Name:</label>';
          echo '<input type="text" name="full_name" value="' . $item['full_name'] . '">';
          echo '<label for="post">Post:</label>';
          echo '<input type="text" name="post" value="' . $item['post'] . '">';
          echo '<label for="phones">Number(s):</label>';
          echo '<input type="text" name="phones" value="' . $item['phones'] . '">';
          echo '<label for="comment">Comment:</label>';
          echo '<input type="text" name="comment" value="' . $item['comment'] . '">';
          echo '<input type="submit" value="Save">';
          echo '</form>';
        } else {
          echo '<h2>Error</h2>';
        }
      } else {
        echo '<h2>No contact selected.</h2>';
      }
    ?>
  </body>
</html>
