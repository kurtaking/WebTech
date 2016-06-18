<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <link rel="stylesheet" href="styles.css">


    <title>My Storyboard</title>

    <style>

        .container {
            margin-top: 15px;
            min-width: 80%;
            padding-left: 10px;
            padding-right: 10px;
            background: #fff;
        }

        .collection-item li {
            margin-bottom: 10px !important;
            top: 10px !important;
        }

        #comment-button {
            margin-top: 70px;
        }

        .light-text {
            color: #4c4c4c;
        }

        .account-icon {
            padding-top: 15px;
        }

    </style>

</head>
<body style="position: relative;">
<?php
    include('navbar.php');
    include('database.php');



    session_start();
    $conn = connect_db();

    $username = $_SESSION["username"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE Username='$username'");
    $user_row = mysqli_fetch_assoc($result);


    echo "<div class='container' style='position: relative;'>
            <div class='row'>
                <div class='col s12'>
                    <h4 class='center-align'>User Storyboard</h4><hr>
                </div>
                <div class='col s12' style='max-height: 900px; overflow: auto'>
    
       ";

    $result_posts = mysqli_query($conn, "SELECT * FROM post ORDER BY id DESC");
    $num_of_rows = mysqli_num_rows($result_posts);



    if ($num_of_rows == 0) {
        echo "<p>No new posts to show!</p>";
    }

    echo "<ul class='collection z-depth-1'>";
    //show all posts on myfacebook
    for($i = 0; $i < $num_of_rows; $i++){
        $row = mysqli_fetch_assoc($result_posts);

        $time = date("h:ia", strtotime($row['created_time']));
        $date = date("d.m.y", strtotime($row['created_time']));

        echo "
            <li class='collection-item avatar'>
              <br>
              <img src='$row[profile_image]' class='circle'>
              <span class='title'><strong><span style='font-size: 1.25em;'>$row[name]</span></strong> <span class='light-text'>posted at $time on $date</span></span>
              <p style='margin-top:5px;'>Likes: $row[likes]</p>
              <blockquote class='blockquote-peach' style='max-width: 80%; margin-top:5px;'>$row[content]</blockquote>
              <br>
              <hr>
              <br>
              <h6><strong>Comments</strong></h6>
              ";


        $result_comments = mysqli_query($conn, "SELECT * FROM comment WHERE post_id='$row[id]' ORDER BY id");
        $num_of_comments = mysqli_num_rows($result_comments);

        # If there are no comments, display 'no comment' message to user
        if($num_of_comments == 0){
            echo "
            <p>There are currently no comments to display</p>
          ";
        }

        # Loop through the number of comments and display each one
        for ($j = 0; $j < $num_of_comments; $j++){
            $comment_row = mysqli_fetch_assoc($result_comments);
            $comment_date = date("h:i a", strtotime($comment_row['created_time']));
            $comment_num = $j + 1;
            echo "
            <div class='row' style='padding-left: 10px;'>
                <div class='col s3'>
                  <blockquote class='blockquote-tan'><strong>$comment_row[name]</strong><br>$comment_date</blockquote>
                </div>
                <div class='col s9' style='margin-top: 20px;'>
                  $comment_row[comment]
                </div>
            </div>
          ";
        }



        echo "
              <br>
              <hr>
              <form action='comment.php' method='POST' class='darken-4'>
                <div class='row'>
                  <div class='input-field col s10'>
                    <input type='hidden' name='user_id' value='$user_row[id]'>
                    <input type='hidden' name='post_id' value='$row[id]'>   
                    <textarea id='comment' name='comment' class='materialize-textarea' placeholder='Write a comment...'></textarea>
                  </div>
                  <div class='col s2'>
                    <button id='comment-button' class='btn-floating' type='submit'><i class='material-icons'>add</i></button>
                  </div>
                  
                </div>
              </form>
              
              <form action='likes.php' method='POST'>
              <br>
              <button class='secondary-content btn-floating' type='submit' value='Like'><i class='material-icons'>thumb_up</i></a>
              <input type='hidden' name='post_id' value='$row[id]'> <input type='submit' value='Like'></form>
            </li>
            
        ";

    }

    echo "    
                </ul>
              </div>
        </div>
    ";
?>

<!-- Compiled and minified JavaScript -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>


</body>
</html>
