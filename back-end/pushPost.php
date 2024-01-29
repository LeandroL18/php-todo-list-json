<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Access-Control-Allow-Origin: http://localhost:5173");

    $jsonPosts = file_get_contents("posts.json");
    $posts = json_decode($jsonPosts, true);

    $text = $_POST['text'];
    $newPost = [
        'text' => $text,
        'completed' => false
    ];

    $posts[] = $newPost;
    $jsonPosts = json_encode($posts);

    file_put_contents("back-end/posts.json", $jsonPosts);
    echo $jsonPosts;

?>