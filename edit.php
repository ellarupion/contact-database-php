<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Edit Entry</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="data.php">Add</a></li>
        <li><a href="about.php">About</a></li>
      </ul>
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
