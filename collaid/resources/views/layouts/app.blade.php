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

        .welcome {
            height: 355px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .welcome .text {
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .welcome h1 {
            font-size: 4.5em;
            font-weight: 500;
            margin-bottom: 40px;
        }

        .welcome p {
            font-size: 1.25px;
        }

        .img-preview {
            box-sizing: border-box;
        }

        img {
            width: 100%;
        }

        .info-blocks {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-top: 50px;
        }

        .block {
            height: 420px;
            width: 55%;
            display: flex;
            align-items: center;
        }

        .text {
            height: 70%;
            display: flex;
            align-items: center;
            text-align: center;
            flex-direction: column;
            justify-content: space-between;
        }

        .info-blocks h2 {
            font-size: 2.5em;
            font-weight: 400;
        }

        .info-blocks h4 {
            font-size: 1.25em;
            font-weight: 100;
            color: black;
            opacity: .8;
        }

        .info-blocks p {
            font-size: 0.938em;
            line-height: 1.875em;
            color: black;
            opacity: .7;
        }

        .img-preview-2 {
            position: relative;
            text-align: center;
        }

        .quote {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 2em;
        }

        .quote address {
            color: white;
            margin-top: 20px;
        }

        footer {
            height: 80px;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            padding-bottom: 10px;
        }

        footer p {
            font-size: 0.8em;
            color: black;
            opacity: .6;
        }

    </style>

<body id="app-layout">


<div class="main-container">
    <div class="container">
        <div class="logo">
            <div class="logo-preview"><a class="text-logo" href="{{ url('/') }}">COLLAID</a></div>
        </div>
        <div class="nav">
            <div class="menu">
                <ul class="list-menu">
                    <li class="item active"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="item"><a href="#">Posts</a></li>
                    <li class="item"><a href="Messages.html">Messages</a></li>
                    <li class="item"><a href="#">Favorites</a></li>
                </ul>
            </div>
            <div class="account">
                <span></span>
                <div class="dropdown-login">
                    @if (Auth::guest())
                        <button onclick="dropdownFunction()" class="login-btn">Authenticate</button>
                        <div id="myDropdown" class="login-content">
                            <a href="{{ url('/login') }}">Sign in</a>
                            <a href="{{ url('/register') }}">Sign up</a>
                        </div>
                    @else
                        <li>
                            <button onclick="dropdownFunction2()" class="account-name">
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                            </button>
                            <div id="myDropdown2" class="account-name-content">
                                <a href="{{ route('user.profile', Auth::user()->id) }}"><i
                                        class="fa fa-btn fa-user"></i>My account</a>
                                <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                            </div>
                        </li>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>


@yield('content')
<script>
    function dropdownFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function dropdownFunction2() {
        document.getElementById("myDropdown2").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function (event) {
        if (!event.target.matches('.login-btn')) {
            var dropdowns = document.getElementsByClassName("login-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

</script>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
