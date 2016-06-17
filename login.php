<?php
  include('database.php');

  session_start();

  $username = $_POST["username"];
  $password = $_POST["password"];

  $conn = connect_db();

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
  $row = mysqli_fetch_assoc($result);

  //if(password_verify($password, $row['password'])) {
    $_SESSION["username"] = $username;
    header("Location: feed.php");
 /* }
  else {
    echo "$password <br>";
    echo "$other <br>";
    echo "Invalid password. Try again";
  }*/

?>
