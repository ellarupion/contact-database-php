<?php

$full_name = $_POST["full_name"];
$post = $_POST["post"];
$phones = $_POST["phones"];
$comment = $_POST["comment"];

$data = json_decode(file_get_contents("data.json"), true);

for ($i = 0; $i < count($data); $i++) {
    if ($data[$i]["full_name"] == $full_name) {
        $data[$i]["post"] = $post;
        $data[$i]["phones"] = $phones;
        $data[$i]["comment"] = $comment;
        break;
    }
}

file_put_contents("data.json", json_encode($data));

header("Location: index.php");

?>
