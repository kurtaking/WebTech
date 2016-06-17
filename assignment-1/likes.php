<?php
    include('database.php');
    include ('functions.php');

    //connect to DB
    $conn = connect_db();

    //get data from the form
    $post_id = sanitizeString($_POST['post_id']);

    //query DB for this Post
    $result = mysqli_query($conn, "SELECT * FROM post WHERE id='$post_id'");
    $row = mysqli_fetch_assoc($result);
    $likes = $row['likes'];

    //update likes
    $likes = $likes + 1;
    $result = mysqli_query($conn, "UPDATE post SET likes='$likes' WHERE id='$post_id'");

    if($result){
        header('Location: feed.php');
    }else{
        echo "Something is wrong!";
}
?>