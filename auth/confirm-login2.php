<?php
$host = 'localhost';
$username = 'postgres';
$password = 'postgres';
$dbname = 'sla-portal';
//Establishes the connection
$conn = new PDO("pgsql:host=$host dbname=$dbname user=$username password=$password");
//Test Connection
if ($conn === false) {
    echo "error with connection";
//    die(print_r(sqlsrv_errors(), true)); //See why it fails
} else {
    echo "Connected!";
// Now we check if the data was submitted, isset() function will check if the data exists.
    if (!isset($_POST['email'], $_POST['password'])) {
        // Could not get the data that should have been sent.
        exit('Please fill the login form!');
    }
// Make sure the submitted login values are not empty.
    if (empty($_POST['email']) || empty($_POST['password'])) {
        // One or more values are empty.
        exit('Please complete the loginjjjjj form');
    }
//check whether the email exists and whether the user is confirmed on registration
    $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
    // bind value to the :email parameter
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->execute();
    $userDets = $stmt->fetchObject();
//
    if ($stmt->rowCount() == 0) {
        // Username already exists
        echo 'User does not exist, please proceed to Registration!';
        header('Location: register.php');

    } elseif (!$userDets->confirm_reg){
        exit('User not confirmed for registration.');
    }
    elseif (!password_verify($_POST['password'], $userDets->password)){
        exit('Either username or password is incorrect!');

    } elseif ($userDets->confirm_reg && password_verify($_POST['password'], $userDets->password)){
                header('Location: http://switchlink.com/switchlink-dashboard/dashboard.html');
            }
}

