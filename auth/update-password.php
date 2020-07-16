<?php
$email = $_GET['email'];
if (!isset($_GET['email'])) {
    exit('email not got');
// How did you get here?
header("Location: index.html");
}
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

    <style>
        .login-form {
            width: 450px;
            margin: 30px auto;
            font-size: 12px;
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
            /*border-color: #f7f7f7;*/
            /*margin: 18px 0;*/
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
        .login-form form fieldset legend.colored {
            color: #2c963f;
        }
        .fieldset legend {
            margin: 0;
            margin-left: -3px;
            margin-left: -.1875rem;
            padding: 0 3px;
            padding: 0 .1875rem;
            background: #fefefe;
        }

    </style>
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0&appId=579529672749062&autoLogAppEvents=1" nonce="n7C8AjzC"></script>

<div class="login-form">
    <form action="confirm-password-reset.php?email=<?php echo $_GET['email'];?>" method="post" autocomplete="off">
        <fieldset class="fieldset">
            <legend class="text">Reset Password</legend>
            <input type="hidden" name="email" value='<?php $email?>'>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                    </span>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="New Password" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                    </span>
                    </div>
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block login-btn">Reset Password</button>
            </div>

        </fieldset>
    </form>
    <div class="hint-text">Already have an Account? <a href="../auth/login2.php" class="hint-text">Login</a></div>
    <div class="hint-text">Don't have an account? <a href="../auth/register2.php" class="hint-text">Register</a></div>
</div>
</body>
</html>
