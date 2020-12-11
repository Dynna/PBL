<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Collaid</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('user/style.css')}}">

    <link rel="stylesheet" href="/dist/css-tooltip.min.css" />
    <link rel="stylesheet" href="css/jquery.emojipicker.css">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="js/jquery.emojipicker.js"></script>


    <style>
        * {
            margin: 0;
            font-family: 'Raleway', sans-serif;
            color: black;
            font-size: 16px;
        }

        li {
            list-style-type: none;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 90%;

        }

        .logo {
            height: 100px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo a {
            font-size: 2.5em;
            text-decoration: none;
            color: black;
        }

        .nav {
            height: 85px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav .menu {
            width: 25%;
            justify-content: center;
            align-items: center;
            margin-left: 36%;
        }

        .nav ul {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            font-size: 0.875em;
        }

        .nav ul a {
            text-decoration: none;
            color: black;
        }

        .nav ul a:hover {
            color: rgb(0, 179, 179);
        }

        .login-btn {
            color: black;
            border: none;
            cursor: pointer;
            background: none;
        }

        .account-name {
            color: black;
            border: none;
            cursor: pointer;
            background: none;
        }

        .dropdown-login {
            position: relative;
            display: inline-block;
        }

        .login-content {
            display: none;
            position: absolute;
            min-width: 110px;
            overflow: auto;
            box-shadow: 0px 8px 8px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .account-name-content {
            display: none;
            position: absolute;
            min-width: 110px;
            overflow: auto;
            box-shadow: 0px 8px 8px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .login-content a {
            padding: 12px 16px;
            display: block;
            font-size: .9em;
            text-decoration: none;
            color: black;
        }

        .account-name-content a {
            padding: 12px 16px;
            display: block;
            font-size: .9em;
            text-decoration: none;
            color: black;
        }

        .dropdown-login a:hover {
            color: rgb(0, 179, 179);
        }

        .show {
            display: block;
        }

        .nav .account {
            margin-left: auto;
        }

        .cont {
            margin-top: 20px;
        }

    </style>

<body id="app-layout">


<div class="cont">
    @yield('content')
</div>



<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
