<html>
  <head>
    <title>Edit Data</title>
  </head>
  <body>
    <h1>Edit Data</h1>
    <form action="edit.php" method="post">
      <div>
        <label for="full_name">Name:</label>
        <input type="text" id="full_name" name="full_name">
      </div>
      <div>
        <label for="post">Post:</label>
        <input type="text" id="post" name="post">
      </div>
      <div>
        <label for="phones">Number(s):</label>
        <input type="text" id="phones" name="phones">
      </div>
      <div>
        <label for="comment">Comment:</label>
        <input type="text" id="comment" name="comment">
      </div>
      <input type="submit" value="Edit">
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
        for ($i = 0; $i < count($data); $i++) {
          if ($data[$i]['full_name'] == $full_name) {
            $data[$i]['post'] = $post;
            $data[$i]['phones'] = $phones;
            $data[$i]['comment'] = $comment;
            break;
          }
        }
        file_put_contents('data.json', json_encode($data));
      }
    ?>
  </body>
</html>
