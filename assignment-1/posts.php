<?php
  session_start();
  include('database.php');
  include('functions.php');

  $conn = connect_db();

  //Get data from the form
  $content = sanitizeString($conn, $_POST['content']);
  $user_id = sanitizeString($conn, $_POST['user_id']);

  $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'");
  $row = mysqli_fetch_assoc($result);

  //Fetch User information
  $name = sanitizeString($conn, $row["Name"]);
  $profile_image = sanitizeString($conn, $row["profile_pic"]);

  $result_insert = mysqli_query($conn, "INSERT INTO post(content, user_id, name, profile_image, likes) VALUES ('$content', $user_id, '$name', '$profile_image', 0)");

  //check if insert was okay
  if($result_insert){
    header("Location: feed.php");
  }else{
    //throw an error
    echo "Oops! Something went wrong! Please try again!";
  }
?>