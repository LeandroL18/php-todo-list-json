<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Access-Control-Allow-Origin: http://localhost:5173");

    $jsonPosts = file_get_contents("posts.json");
    $posts = json_decode($jsonPosts, true);

    $i = $_POST['index'];

    $post = $posts[$i];
    $post['completed'] = !$post['completed'];

    $posts[$i] = $post;

    $jsonPosts = json_encode($posts);
    file_put_contents("posts.json", $jsonPosts);
    echo $jsonPosts;
    
?>