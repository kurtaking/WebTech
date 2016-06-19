<?php

    include('database.php');
    include('functions.php');

    session_start();

    $conn = connect_db();

    $user_id = $_POST['user_id'];
    $username = sanitizeString($conn, $_POST["username"]);
    $email = sanitizeString($conn, $_POST["email"]);
    $name = sanitizeString($conn, $_POST["full_name"]);
    $date_of_birth = sanitizeString($conn, $_POST["date_of_birth"]);
    $gender = sanitizeString($conn, $_POST["gender"]);
    $verification_question = sanitizeString($conn, $_POST["verification_question"]);
    $verification_answer = sanitizeString($conn, $_POST["verification_answer"]);
    $profile_image = sanitizeString($conn, $_POST["profile_image"]);

    $result = mysqli_query($conn, "UPDATE users SET Username='$username', email='$email', Name='$name', dob='$date_of_birth', gender='$gender', verification_question='$verification_question', verification_answer='$verification_answer', profile_pic='$profile_image' WHERE id='$user_id'");

    header("Location: feed.php");
?>