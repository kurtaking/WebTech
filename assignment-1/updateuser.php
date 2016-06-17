<?php

    include('database.php');
    include('functions.php');

    session_start();

    $conn = connect_db();

    $user_id = $_POST['user_id'];
    $username = sanitizeString($_POST["username"]);
    $email = sanitizeString($_POST["email"]);
    $name = sanitizeString($_POST["full_name"]);
    $date_of_birth = sanitizeString($_POST["date_of_birth"]);
    $gender = sanitizeString($_POST["gender"]);
    $verification_question = sanitizeString($_POST["verification_question"]);
    $verification_answer = sanitizeString($_POST["verification_answer"]);
    $profile_image = sanitizeString($_POST["profile_image"]);

    $result = mysqli_query($conn, "UPDATE users SET Username='$username', email='$email', Name='$name', dob='$date_of_birth', gender='$gender', verification_question='$verification_question', verification_answer='$verification_answer', profile_pic='$profile_image' WHERE id='$user_id'");

    header("Location: feed.php");
?>