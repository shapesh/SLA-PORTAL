<?php

session_start();
require '../Twitter-API-Login-PHP/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', 'tRE3ItKQDtSkSKQFDuYgwKcdz');    // add your app consumer key between single quotes
define('CONSUMER_SECRET', 'w5asGkQ4t7ytudPivYVCCCSTgCj03HPN8LQ1Xd6ngPqMfPjToU'); // add your app consumer 																			secret key between single quotes
define('OAUTH_CALLBACK', 'http://switchlink.com/'); // your app callback URL i.e. page 																			you want to load after successful 																			  getting the data
//define('oauth_token', '842987337353052160-LL8z2AHxYRP7lHo8iDaq8cLNzeSu8OP');
//define('oauth_token_secret', '6eZZno5qC6d8E5Gtc9jakmhEgvP07F3MfxOBwJ5ysLm8x');
?>
<!DOCTYPE html>
<html lang="en" xmlns:fb="">
<head>
    <!--    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SwitchLink</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="../css/lightbox.min.css" type="text/css">
    <!--    <link rel="stylesheet" href="css/square/blue.css" type="text/css">-->
    <link rel="stylesheet" href="../css/jquery.bxslider.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.theme.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/nice-select.css">
    <link type="text/css" rel="stylesheet" href="../css/easy-responsive-tabs.css"/>
    <link rel="stylesheet" type="text/css" href="../css/component.css"/>
    <link rel="stylesheet" type="text/css" href="../css/animate.css"/>

    <link rel="apple-touch-icon" sizes="180x180" href="../css/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../css/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../css/favicon/favicon-16x16.png">
    <link rel="manifest" href="../css/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="https://apis.google.com/js/api:client.js"></script>
    <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0&appId=579529672749062&autoLogAppEvents=1"
            nonce="p8sTg3Ph"></script>

    <script>
        var googleUser = {};
        var startApp = function () {
            gapi.load('auth2', function () {
                // Retrieve the singleton for the GoogleAuth library and set up the client.
                auth2 = gapi.auth2.init({
                    client_id: '785816498987-733uurj6sdiapag2pp1bddgn0vc5cfl9.apps.googleusercontent.com',
                    cookiepolicy: 'single_host_origin',
                    // Request scopes in addition to 'profile' and 'email'
                    //scope: 'additional_scope'
                });
                attachSignin(document.getElementById('customBtn'));
            });
        };

        function attachSignin(element) {
            console.log(element.id);
            auth2.attachClickHandler(element, {},
                function (googleUser) {
                    // document.getElementById('name').innerText = "Signed in: " +
                    //     googleUser.getBasicProfile().getName();
                    window.location.replace('https://stackoverflow.com');
                }, function (error) {
                    alert(JSON.stringify(error, undefined, 2));
                });
        }
    </script>
    <script>
        function myFunction() {
            window.open("https://www.facebook.com/v7.0/dialog/oauth?app_id=579529672749062&auth_type=&cbt=1592314540390&channel_url=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df1dc84de767b0c%26domain%3Dswitchlink.com%26origin%3Dhttps%253A%252F%252Fswitchlink.com%252Ff3a1079cc3b6a28%26relation%3Dopener&client_id=579529672749062&display=popup&domain=switchlink.com&e2e=%7B%7D&fallback_redirect_uri=https%3A%2F%2Fswitchlink.com%2Fauth%2Flogin.html&id=f659c72375058&locale=en_GB&logger_id=b80926a7-5e56-45ce-b713-eb6ea1781384&origin=1&plugin_prepare=true&redirect_uri=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df2e8232536f8b5%26domain%3Dswitchlink.com%26origin%3Dhttps%253A%252F%252Fswitchlink.com%252Ff3a1079cc3b6a28%26relation%3Dopener.parent%26frame%3Df659c72375058&ref=LoginButton&response_type=signed_request%2Ctoken%2Cgraph_domain&scope=public_profile%2Cemail&sdk=joey&size=%7B%22width%22%3A600%2C%22height%22%3A679%7D&url=dialog%2Foauth&version=v7.0",
                "", "resizable=no,width=400,height=400");
        }
    </script>
    <style type="text/css">
        .login-btn + .login-btn {
            margin-top: 8px;
        }

        .login-btn {
            display: block;
            border-radius: 8px;
            line-height: 38px;
            border: 1px solid #940303;
            background-color: #c00505;
            font-style: normal;
            font-weight: 700;
            padding: 0 8px 0 54px;
            color: #747487;
            position: relative;
        }

        .customBtn {
            width: 100%;
            float: left;
            background-color: #c00505;
            border: 1px solid #940303;
            color: #dcb4b4;
            padding: 0 !important;

        }

        .customBtn:hover {
            cursor: pointer;
            background-color: #880303;
            color: #dcb4b4;
        }

        #customBtn {
            width: 100%;
            float: left;
            background-color: #c00505;
            border: 1px solid #940303;
            color: #dcb4b4;
            padding: 0 !important;

        }

        #customBtn i {
            float: left;
            background-color: #880303;
            color: #dcb4b4;
            padding: 13px 30px 13px 15px;
            text-align: center;
            transition: all 0.9s ease;
        }

        #customBtn:hover {
            cursor: pointer;
            background-color: #880303;
            color: #dcb4b4;
        }

        #customBtn:hover i {
            background-color: #c00505;
            transition: all 0.9s ease;
            color: #880303;
        }

        #customBtn:hover span {
            color: #dcb4b4;
            transition: all 0.9s ease;
        }

        span.label {
            font-family: serif;
            font-weight: normal;
        }

        span.icon {
            float: left;
            background: url('/images/icon-google.svg') transparent 5px 50% no-repeat;
            display: inline-block;
            vertical-align: middle;
            width: 42px;
            height: 42px;
        }

        /*.fb_iframe_widget iframe {*/
        /*    opacity: 0;*/
        /*}*/

        /*.fb_iframe_widget {*/
        /*    !*background-image: url();*!*/
        /*    background-repeat: no-repeat;*/
        /*}*/

        span.buttonText {
            float: left;
            padding: 13px 0 0 20px;
            color: #880303;
            /*color: #dcb4b4;*/
            transition: all 0.9s ease;

        }

        span.buttonText:hover {
            color: #dcb4b4;
            transition: all 0.9s ease;
        }
    </style>
</head>
<body>
<div id="fb-root"></div>
<div id="modal">
    <div class="modal-content">
        <div class="login-header">
            <div class="login-trim"><img src="../images/login-header-beam.png"></div>
            <div class="login-logo"><a href="../index.html"><img src="../images/switchlink-logo.png"
                                                                 alt="SwitchLink Logo"></a></div>
        </div>

        <div class="login-portal-via-wrapper">
            <div class="portal-wrapper">
                <h2>Login to the portal</h2>
                <form autocomplete="off">
                    <div class="email-input-login">
                        <input type="email" name="email" placeholder="Your email address">
                        <img src="../images/icons8-envelope-160.png">
                    </div>
                    <div class="password-input-login">
                        <input type="password" name="password" placeholder="Password">
                        <img src="../images/login-icon.png">
                    </div>

                    <button type="submit">Login</button>

                    <p class="forgot-p">Forgot your Password?</p>
                    <span class="reg">Dont have an account yet? &nbsp;&nbsp;<a href="register.php">Register</a></span>
                    <div class="forgot-password-wrapper">
                        <h4>Enter the email address you signed up with for password recovery then check your email inbox
                            after submiting</h4>
                        <div class="email-input-login">
                            <input type="email" name="email" placeholder="Your email address">
                            <img src="../images/login-icon.png">
                        </div>
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="via-wrapper">
                <h3>Login Via</h3>
                <ul>
                    <li><a class="customBtn login-btn-facebook" onclick="myFunction()">
                            <i class="fa fa-facebook fa-fw"></i><span>Facebook</span></a></li>

                    <!-- In the callback, you would hide the gSignInWrapper element on a
successful sign in -->
                    <li>
                        <div id="gSignInWrapper">
                            <!--                            <span class="label">Sign in with:</span>-->
                            <div id="customBtn" class="customGPlusSignIn">
                                <!--                                <span class="icon"></span>-->
                                <i class="fa fa-google fa-fw"></i>
                                <span class="buttonText">Google</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <?php
                        if (!isset($_SESSION['access_token'])) {
                            $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
                            $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
                            $_SESSION['oauth_token'] = $request_token['oauth_token'];
                            $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
                            $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
                            //echo $url;
                            echo "<a href='$url' class='customBtn'>
                                <i class='fa fa-twitter fa-fw'></i><span>Twitter</span></a>";
                        } else {
                            $access_token = $_SESSION['access_token'];
                            $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
                            $user = $connection->get("account/verify_credentials", ['include_email' => 'true']);
                            //    $user1 = $connection->get("https://api.twitter.com/1.1/account/verify_credentials.json", ['include_email' => true]);
                            echo "<img src='$user->profile_image_url'>";
                            echo "<br>";        //profile image twitter link
                            echo $user->name;
                            echo "<br>";                                    //Full Name
                            echo $user->location;
                            echo "<br>";                                //location
                            echo $user->screen_name;
                            echo "<br>";                            //username
                            echo $user->created_at;
                            echo "<br>";
                            //    echo $user->profile_image_url;echo "<br>";
                            echo $user->email;
                            echo "<br>";                                    //Email, note you need to check permission on Twitter App Dashboard and it will take max 24 hours to use email
                            echo "<pre>";
                            print_r($user);
                            echo "<pre>";                                //These are the sets of data you will be getting from Twitter 												Database
                        }
                        ?>

                    </li>

                </ul>
                <div id="status">

                    <div id="name"></div>

                    <p>&copy; 2020 SWITCHLINK AFRICA. ALL RIGHTS RESERVED.</p>
                </div>

            </div>

        </div>
    </div>
</div>
<script>startApp();</script>
<script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../js/jquery.bxslider.js"></script>
<script type="text/javascript" src="../js/owl.carousel.js"></script>
<script type="text/javascript" src="../js/lightbox.js"></script>
<script type="text/javascript" src="../js/wow.js"></script>
<script type="text/javascript" src="../js/jquery.nice-select.js"></script>
<script src="../js/easyResponsiveTabs.js" type="text/javascript"></script>
<script src="../js/modernizr.custom.js"></script>
<script src="../js/masonry.pkgd.min.js"></script>
<script src="../js/imagesloaded.js"></script>
<script src="../js/classie.js"></script>
<script src="../js/AnimOnScroll.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
</body>

</html>

