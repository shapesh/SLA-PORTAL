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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SwitchLink</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://apis.google.com/js/api:client.js"></script>

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
    <style>
        .login-form {
            width: 450px;
            margin: 30px auto;
            font-size: 12px;
        }
        .social-btn-warpper {
            /*background: #f7f7f7;*/
            /*margin: 0px auto;*/
        }
        .login-form form {
            margin-bottom: 15px;
            /*background: #f7f7f7;*/
            /*box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);*/
            /*padding: 30px;*/
        }
        .login-form h4 {
            margin: 0 0 15px;
        }
        .login-form .hint-text {
            color: #00599b;
            padding-bottom: 15px;
            text-align: center;
            font-size: 13px;
        }
        .login-form .text {
            color: #00599b;
            padding-bottom: 15px;
            text-align: center;
            font-size: 15px;
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .login-btn {
            font-size: 15px;
            font-weight: bold;
            background-color: #00599b;
        }
        .login-btn:Hover {
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            background-color: #880303;
            color: #dcb4b4;
        }
        .or-seperator {
            margin: 20px 0 10px;
            text-align: center;
            border-top: 1px solid #ccc;
        }
        .or-seperator i {
            padding: 0 10px;
            background: #f7f7f7;
            position: relative;
            top: -11px;
            z-index: 1;
        }
        .social-btn .btn {
            margin: 10px 0;
            font-size: 15px;
            text-align: left;
            line-height: 24px;
        }
        .social-btn .btn i {
            /*float: left;*/
            margin: 5px 5px  5px 5px;
            /*min-width: 15px;*/
            /*float: left;*/
            /*background-color: #880303;*/
            /*color: #dcb4b4;*/
            /*padding: 13px 30px 13px 15px;*/
            /*text-align: center;*/
            transition: all 0.9s ease;
        }
        .input-group-addon .fa{
            font-size: 18px;
        }
        span.icon {
            /*float: left;*/
            /*background: url('/images/icon-google.svg') transparent 5px 50% no-repeat;*/
            /*display: inline-block;*/
            /*vertical-align: middle;*/
            /*width: 25px;*/
            /*height: 25px;*/
            font-size: small;
        }
        .fieldset {
            border-color: #f7f7f7;
            margin: 18px 0;
            margin: 1.125rem 0;
            padding: 20px;
            padding: 1.25rem;
            border: 1px solid #cacaca;
        }
        legend {
            box-sizing: border-box;
            display: table;
            padding: 0;
            color: inherit;
            white-space: normal;
        }
        #customBtn {
            /*width: 100%;*/
            /*float: left;*/
            /*background-color: #c00505;*/
            /*border: 1px solid #940303;*/
            /*color: #dcb4b4;*/
            /*padding: 0 !important;*/
            margin: 10px 0;
            font-size: 15px;
            text-align: left;
            line-height: 24px;

        }

    </style>
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0&appId=579529672749062&autoLogAppEvents=1" nonce="n7C8AjzC"></script>
<script>
    function myFunction() {
        window.open("    https://www.facebook.com/v7.0/dialog/oauth?app_id=579529672749062&auth_type&cbt=1596630363358&channel_url=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df275fc8bd7da018%26domain%3Dswitchlink.com%26origin%3Dhttps%253A%252F%252Fswitchlink.com%252Ff1dc2894680bfa4%26relation%3Dopener&client_id=579529672749062&display=popup&domain=switchlink.com&e2e=%7B%7D&fallback_redirect_uri=https%3A%2F%2Fswitchlink.com%2Fauth%2Fregister2.php&force_confirmation=false&id=f2a201ec27b9c18&locale=en_GB&logger_id=e722ad31-322c-442c-b6b3-efc1db2521bc&origin=1&plugin_prepare=true&redirect_uri=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df13c11a861fe2ac%26domain%3Dswitchlink.com%26origin%3Dhttps%253A%252F%252Fswitchlink.com%252Ff1dc2894680bfa4%26relation%3Dopener.parent%26frame%3Df2a201ec27b9c18&ref=LoginButton&response_type=signed_request%2Ctoken%2Cgraph_domain&scope&sdk=joey&size=%7B%22width%22%3A600%2C%22height%22%3A679%7D&url=dialog%2Foauth&version=v7.0&_rdc=1&_rdr\n",
            "_blank", "resizable=no,width=400,height=400, position=fixed");
        // myWindow.document.write("<p>This is 'MsgWindow'. I am 200px wide and 100px tall!</p>");
    }
</script>
<div class="login-form">
    <form action="confirm-login2.php" method="post" autocomplete="off">
        <fieldset class="fieldset">
            <legend class="text">Login to Switchlink Africa</legend>
<!--        <h4 class="text-center">Login to Switchlink Africa</h4>-->

<!--        <div class="or-seperator"><i>or</i></div>-->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <span class="fa fa-user"></span>
                    </span>
                </div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                    </span>
                </div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block login-btn">Sign in</button>
        </div>
        <div class="or-seperator"><i>or</i></div>
            <div class="social-btn-warpper">
        <p class="hint-text">Sign in With</p>
        <div class="text-center social-btn">
<!--            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-facebook fa-fw"></i></a>-->
<!--            <a href="#" class="btn btn-info btn-sm"><i class="fa fa-twitter fa-fw"></i></a>-->
<!--            <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-windows fa-fw"></i><span class="icon">Log In</span></a>-->
<!--            <a href="#" class="btn btn-danger btn-sm">-->
<!--                <i class="fa fa-google"></i></a>-->
            <a id="gSignInWrapper">
                <!--                            <span class="label">Sign in with:</span>-->
                <div id="customBtn" class="btn btn-danger btn-sm customGPlusSignIn">

                    <i class="fa fa-google fa-fw"></i>
<!--                    <span class="icon">Log In</span>-->
<!--                    <span class="buttonText">Google</span>-->
                </div>
            </a>
            <a id="customBtn" class="btn btn-primary btn-sm login-btn-facebook" onclick="myFunction()">
                <i class="fa fa-facebook fa-fw"></i></a>
<!--            <a class="fb-login-button btn btn-primary btn-sm" data-size="small" data-button-type="login_with" data-layout="rounded" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></a>-->
<!--            <div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>-->

            <!--                <span class="icon"></span></a>-->
            <?php
            if (!isset($_SESSION['access_token'])) {
                $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
                $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
                $_SESSION['oauth_token'] = $request_token['oauth_token'];
                $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
                $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
                //echo $url;
                echo "<a href='$url' class='btn btn-info btn-sm icon'>
                                <i class='fa fa-twitter fa-fw'></i></a>";

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

        </div>
        <div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="../auth/forgot-password.php" class="float-right  hint-text">Forgot Password?</a>
        </div>
            </div>

        </fieldset>
    </form>
    <div class="hint-text">Don't have an account? <a href="../auth/register2.php" class="hint-text">Register Now!</a></div>
</div>
<script>startApp();</script>
</body>
</html>
