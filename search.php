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
        <a class="navbar-brand" href="index.php">Base</a>
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
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <form class="mb-5" action="search.php" method="post">
            <div class="input-group">
              <input type="text" class="form-control" name="query" placeholder="Search...">
              <button class="btn btn-primary" type="submit">Search</button>
            </div>
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
