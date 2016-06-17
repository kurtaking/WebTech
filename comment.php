<?php
    include('database.php');

    session_start();

    $comment = $_POST['comment'];
    $user_id = $_POST['user_id'];
    $post_id = $_POST['post_id'];

    $conn = connect_db();

    $result = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$user_id'");
    $row = mysqli_fetch_assoc($result);

    $name = $row["name"];

    $result_insert = mysqli_query($conn, "INSERT INTO comment(post_id, comment, user_id, name) VALUES ('$post_id', '$comment', '$user_id', '$name')");

    if($result_insert) {
        header("Location: feed.php");
    }
    else {
        echo "Something went wrong, please try again";
    }

?>