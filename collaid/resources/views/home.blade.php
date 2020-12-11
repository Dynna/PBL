@extends('layouts.app')

@section('content')


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

        a {
            text-decoration: none;
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

        .nav ul a:active {
            color: rgb(0, 179, 179);
        }

        .nav ul a:hover {
            color: rgb(0, 179, 179);
        }

        .nav .account {
            margin-left: auto;
        }

        .login-btn {
            color: black;
            border: none;
            cursor: pointer;
            background: none;
        }

        .dropbtn:hover, .login-btn:focus {
            color: rgb(0, 179, 179);
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
            box-shadow: 0px 8px 8px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .login-content a {
            padding: 12px 16px;
            display: block;
            font-size: .9em;
        }

        .dropdown-login a:hover {
            color: rgb(0, 179, 179);
        }

        .show {display: block;}

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
            font-size: 1.2em;
        }

        .img-preview {
            box-sizing: border-box;
        }

        img{
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
            opacity: 0.8;
        }

        .info-blocks p {
            font-size: 0.938em;
            line-height: 1.875em;
            color: black;
            opacity: 0.7;
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

        /*-- NewPost Page--*/



    </style>
    <div data-aos="fade-in" class="welcome-text">
        <div class="main-container">
            <div class="container">
                <div class="welcome">
                    <div class="text">
                        <h1>WELCOME TO COLLAID</h1>
                        <p>The Advanced Way</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div data-aos="fade-in" data-aos-offset="300" data-aos-delay="60" class="img-1">
        <div class="main-container">
            <div class="container">
                <div class="img-preview">
                    <img src="{{('../assets/img1.jpg')}}">
                </div>
            </div>
        </div>
    </div>

    <div class="main-info">
        <div class="main-container">
            <div class="container">
                <div class="info-blocks">
                    <div data-aos="fade-in" data-aos-offset="300" data-aos-delay="60" class="block">
                        <div class="text">
                            <h2>WHO WE ARE</h2>
                            <h4>The Leading Media Startup</h4>
                            <p>We’re a young and talented group of entrepreneurs and engineers with a groundbreaking idea designed to contribute towards a better tomorrow. We provide smart solutions for companies of all sizes and pride ourselves on our unparalleled, dedicated service. At Collaid, we believe that the right understanding and technological edge can lead companies towards a successful future. Contact us today to set up a meeting with one of our sales representatives.</p>
                        </div>
                    </div>
                    <div data-aos="fade-in" data-aos-offset="300" data-aos-delay="60" class="block">
                        <div class="text">
                            <h2>WHAT WE DO</h2>
                            <h4>Easy. Fast. Secure</h4>
                            <p>At Collaid, we believe that our solutions will soon become one of the biggest segments in the industry. We’ve only just started, but we already know that every product we build requires hard-earned skills, dedication and a daring attitude. Continue reading and learn all there is to know about the smart tech behind our successful Media Startup.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div data-aos="fade-in" data-aos-offset="300" data-aos-delay="60" class="img-2">
        <div class="main-container">
            <div class="container">
                <div class="img-preview-2">
                    <img src="./img/img2.jpg" alt="">
                    <div class="quote">
                        "Well done is better than well said"
                        <address>
                            Benjamin Franklin
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2020 by Collaid. Proudly created by Team 'Connected'. </p>
    </footer>
    {{--<div class="container">--}}
    {{--    <div class="row justify-content-center">--}}
    {{--        <div class="col-md-8">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-header">--}}
    {{--                    {{ __('Dashboard') }}</div>--}}
    {{--                <div class="card-body">--}}



    {{--                    @if (session('status'))--}}
    {{--                        <div class="alert alert-success" role="alert">--}}
    {{--                            {{ session('status') }}--}}
    {{--                        </div>--}}
    {{--                    @endif--}}

    {{--                    --}}

    {{--                    {{ __('You are logged in!') }}--}}
    {{--                </div>--}}


    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}
@endsection
