<?php

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__ . '/resources' . $uri)) {
    return false;
}

require_once __DIR__ . '/login.blade.php';

session_start();

$email = "";
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'collaid') or die("Connect failed: %s\n" . $db->error);

//Login
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $email = md5($email);
        $query = "SELECT * FROM account WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";
            header('location: ../welcome.blade.php');
        } else {
            array_push($errors, "Wrong nickname/password combination");
        }
    }
}
session_write_close();

$db->close();
