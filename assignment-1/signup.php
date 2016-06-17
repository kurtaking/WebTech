<?php
    include('database.php');
    include('functions.php');

    session_start();

    $conn = connect_db();

    $username = sanitizeString($_POST["username"]);
    $email = sanitizeString($_POST["email"]);
    $password = sanitizeString($_POST["password"]);
    $confirm_password = sanitizeString($_POST["confirm_password"]);
    $name = sanitizeString($_POST["full_name"]);
    $date_of_birth = sanitizeString($_POST["date_of_birth"]);
    $gender = sanitizeString($_POST["gender"]);
    $verification_question = sanitizeString($_POST["verification_question"]);
    $verification_answer = sanitizeString($_POST["verification_answer"]);
    $profile_image = sanitizeString($_POST["profile_image"]);

    $city = sanitizeString($_POST['city']);
    $state = sanitizeString($_POST['state']);
    $location = "$city, $state";


    $result = mysqli_query($conn, "SELECT * FROM users WHERE Username='$username'");
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
        $hash_pw = sanitizeString(password_hash($password, PASSWORD_DEFAULT));
        $result_insert = mysqli_query($conn, "INSERT INTO users(Username, Password, email, Name, dob, gender, verification_question, verification_answer, location, profile_pic) VALUES ('$username', '$hash_pw', '$email', '$name', '$date_of_birth', '$gender', '$verification_question', '$verification_answer', '$location', '$profile_image')");

        if($result_insert) {
            $_SESSION["username"] = $username;
            header("Location: feed.php");
        }
    }
?>