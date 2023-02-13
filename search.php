<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Contact base</title>
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
    <h1>Base</h1>
    <form action="search.php" method="post">
      <input type="text" name="query">
      <input type="submit" value="Search">
    </form>
    <?php
      if (isset($_POST['query'])) {
        $query = strtolower($_POST['query']);
        $data = json_decode(file_get_contents('data.json'), true);
        $results = array();
        foreach ($data as $item) {
          if (stripos(strtolower($item['full_name']), $query) !== false ||
            stripos(strtolower($item['post']), $query) !== false ||
            stripos(strtolower($item['phones']), $query) !== false ||
            stripos(strtolower($item['comment']), $query) !== false) {
              array_push($results, $item);
            }
        }
        if (count($results) > 0) {
          echo '<h2>Results:</h2>';
          foreach ($results as $result) {
            echo '<div class="result">';
            echo '<p>Name: ' . $result['full_name'] . '</p>';
            echo '<p>Post: ' . $result['post'] . '</p>';
            echo '<p>Number(s): ' . $result['phones'] . '</p>';
            echo '<p>Comment: ' . $result['comment'] . '</p>';
            echo '<form action="edit.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $result['id'] . '">';
            echo '<input type="submit" value="Edit">';
            echo '</form>';
            echo '</div>';
          }
        } else {
          echo '<h2>Nothing found.</h2>';
        }
      }
    ?>
  </body>
</html>