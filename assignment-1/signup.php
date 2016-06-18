<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up Error Page</title>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,200,600,700' rel='stylesheet' type='text/css'>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <link rel="stylesheet" href="styles.css">

</head>
<body>

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

    if($username == null || $password == null || $confirm_password == null) {
        echo "
            <div class='container'>
                <div class='row'>
                    <div class='col s12'>
                        <div class=\"card-panel white\">
                            <h5>User must provide the basic information:</h5>
                            <ul style='margin-left: 25px;'>
                                <li>1. Username</li>
                                <li>2. Password</li>
                                <li>3. Confirmation Password</li>
                            </ul>
                            <a href='signup.html' style='margin-left: 25px;'>Try Again</a>
                        </div>
                    </div>
                </div>
            </div>
        
        ";
    }
    else if($num_of_rows > 0){
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


</body>
</html>