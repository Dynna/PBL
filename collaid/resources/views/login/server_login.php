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

$nickname = "";
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'collaid') or die("Connect failed: %s\n". $db -> error);

//Login
if (isset($_POST['login_user'])) {
    $nickname = mysqli_real_escape_string($db, $_POST['nickname']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($nickname)) {
        array_push($errors, "Nickname is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM account WHERE nickname='$nickname' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['nickname'] = $nickname;
            $_SESSION['success'] = "You are now logged in";
            header('location: ../welcome.blade.php');
        }else {
            array_push($errors, "Wrong nickname/password combination");
        }
    }
}
session_write_close();

$db->close();
