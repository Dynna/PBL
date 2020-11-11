<?php
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/resources'.$uri)) {
    return false;
}

require_once __DIR__.'/register.blade.php';

session_start();

// initializing variables
$first_name = "";
$last_name = "";
$email = "";
$date_of_birth = "";
$nickname = "";
$provided_service = "";
$bio = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'collaid') or die("Connect failed: %s\n". $db -> error);

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $date_of_birth = mysqli_real_escape_string($db, $_POST['date_of_birth']);
    $nickname = mysqli_real_escape_string($db, $_POST['nickname']);
    $provided_service = mysqli_real_escape_string($db, $_POST['provided_service']);
    $bio = mysqli_real_escape_string($db, $_POST['bio']);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($first_name)) {
        array_push($errors, "First Name is required");
    } else {
        $first_name = test_input($_POST["first_name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $first_name)) {
            array_push($errors, "Only letters and white space allowed for first name!");
        }
    }
    if (empty($last_name)) {
        array_push($errors, "Last Name is required");
    } else {
        $last_name = ($_POST["last_name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
            array_push($errors, "Only letters and white space allowed for last name!");
        }
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    } else {
        $email = ($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Invalid e-mail format!");
        }
    }
    if (empty($date_of_birth)) {
        array_push($errors, "Date of birth is required");
    }
    if (empty($nickname)) {
        array_push($errors, "Nickname is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");}
        else{
            $password = test_input($_POST["password"]);

            if (strlen($_POST["password"]) <= '8') {
                array_push($errors, "Your password must contain al least 8 characters");
            }
            if(!preg_match("#[0-9]+#",$password)) {
                array_push($errors, "Your password must contain at least 1 number");
            }
            if(!preg_match("#[A-Z]+#",$password)) {
                array_push($errors, "Your password must contain at least 1 capital letter");
            }
            if(!preg_match("#[a-z]+#",$password)) {
                array_push($errors, "Your password must contain at least 1 lowercase latter");
            }
        }


    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM account WHERE nickname='$nickname' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['nickname'] === $nickname) {
            array_push($errors, "This nickname already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "This email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password);//encrypt the password before saving in the database
        $email = md5($email);

        $query = "INSERT INTO account (first_name, last_name, email, date_of_birth, nickname, provided_service, bio ,password)
  			  VALUES('$first_name','$last_name', '$email', '$date_of_birth', '$nickname', '$provided_service', '$bio' ,'$password')";
        mysqli_query($db, $query);
        $_SESSION['nickname'] = $nickname;
        $_SESSION['success'] = "You are now logged in";
        header('location: welcome.blade.php');
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
session_write_close();

$db->close();




