<?php
$host = 'localhost';
$username = 'postgres';
$password = 'postgres';
$dbname = 'slaportal';
//Establishes the connection
$conn = new PDO("pgsql:host=$host dbname=$dbname user=$username password=$password");
//Test Connection
if ($conn === false) {
    echo "error with connection";
//    die(print_r(sqlsrv_errors(), true)); //See why it fails
    } else {
//    echo "Connected!";
    // Now we check if the data was submitted, isset() function will check if the data exists.
    if (!isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone_number'], $_POST['password'], $_POST['confirm_password'])) {
        // Could not get the data that should have been sent.
        exit('Please fill the registration form!');
    }
// Make sure the submitted registration values are not empty.
    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['phone_number']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm_password'])) {
        // One or more values are empty.
        exit('Please complete the registration form');
    }
//check for email validation
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        exit('Email is not valid!');
    }
//validate username
//    if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
//        exit('Username is not valid!');
//    }
//validate password
    if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        exit('Password must be between 5 and 20 characters long!');
    }
//check the password and confirm password match
    if ($_POST['password'] !== $_POST['confirm_password']) {
        exit('Passwords do not match');
    }

    // We need to check if the account with that username exists.
    $stmt = $conn->prepare('SELECT id, password FROM accounts WHERE email = :email');
        // bind value to the :email parameter
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Username already exists
            echo 'User with this email already exists, please proceed to Login!';
        }
        // Username doesnt exists, insert new account
            $stmt = $conn->prepare('INSERT INTO users (first_name, last_name, email, phone_number, password) VALUES (?, ?, ?, ?, ?)');
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $uniqid = uniqid();
//            $stmt->bind_param('ssssss', $_POST['phone_number'], $password, $_POST['email'], $uniqid, $_POST['first_name'], $_POST['last_name']);
            $stmt->bindParam(1, $_POST['first_name'], PDO::PARAM_STR);
            $stmt->bindParam(2, $_POST['last_name'], PDO::PARAM_STR);
            $stmt->bindParam(3, $_POST['email'], PDO::PARAM_STR);
            $stmt->bindParam(4, $_POST['phone_number'], PDO::PARAM_STR);
            $stmt->bindParam(5, $password, PDO::PARAM_STR);
            $stmt->execute();
            // Get the id of the inserted user to populate the token table
            $insertedUserId = $conn->lastInsertId();
            //Generate user token
            $token = uniqid('switchlink-', true);
            //Generate token expiry. To expire in 1 hour.
            $tokenExpiry = date("Y-m-d H:i:s", strtotime("+4 hours"));
            //insert into tokens table, token associated with the inserted user
            $stmt = $conn->prepare('INSERT INTO tokens
                (token, user_id, token_expires)
                  VALUES (?, ?, ?)');
            $stmt->bindParam(1, $token, PDO::PARAM_STR);
            $stmt->bindParam(2, $insertedUserId, PDO::PARAM_INT);
            $stmt->bindParam(3, $tokenExpiry);
            $stmt->execute();

            $from    = 'carolgitonga45@gmail.com';
            $subject = 'Account Activation Required';
            $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
            $activate_link = 'https://switchlink.com/auth/registration-confirmation.php?email=' . $_POST['email'] . '&token=' . $token .'&uuid=' . $insertedUserId;
            $message = '<p>Please click the following link to activate your account:
                            <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
            mail($_POST['email'], $subject, $message, $headers);
            echo 'Please check your email to activate your account!';

    }


