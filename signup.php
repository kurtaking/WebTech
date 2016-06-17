<?php
    include('database.php');

    session_start();

    $conn = connect_db();

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $name = $_POST["full_name"];
    $date_of_birth = $_POST["date_of_birth"];
    $gender = $_POST["gender"];
    $verification_question = $_POST["verification_question"];
    $verification_answer = $_POST["verification_answer"];
    $profile_image = $_POST["profile_image"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $num_of_rows = mysqli_num_rows($result);

    if($num_of_rows > 0){
        echo "Username already taken. Try again.";
    }
    else if($password != $confirm_password){
        echo "Passwords do not match. Try again.";
    }
    else {
        // Create the new user account
        // hash password before inserting into DB
        $hash_pw = password_hash($password, PASSWORD_DEFAULT);
        $result_insert = mysqli_query($conn, "INSERT INTO users(username, password, email, name, date_of_birth, gender, verification_question, verification_answer, profile_image) VALUES ('$username', '$password', '$email', '$name', '$date_of_birth', '$gender', '$verification_question', '$verification_answer', '$profile_image')");

        if($result_insert) {
            $_SESSION["username"] = $username;
            header("Location: feed.php");
        }
    }
?>