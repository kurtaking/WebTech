<?php
  session_start();
  include('database.php');

  //Get data from the form
  $content = $_POST['content'];
  $user_id = $_POST['user_id'];

  //connect to DB
  $conn = connect_db();

  $result = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$user_id'");
  $row = mysqli_fetch_assoc($result);

  //Fetch User information
  $name = $row["name"];
  $profile_image = $row["profile_image"];

  $result_insert = mysqli_query($conn, "INSERT INTO post(content, user_id, name, profile_image, likes) VALUES ('$content', $user_id, '$name', '$profile_image', 0)");

  //check if insert was okay
  if($result_insert){
    header("Location: feed.php");
  }else{
    //throw an error
    echo "Oops! Something went wrong! Please try again!";
  }
?>