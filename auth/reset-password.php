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
    echo "Connected!";
//    var_dump($_POST['email']);
    // We need to check if the account with that email exists.
    $stmt = $conn->prepare('SELECT id, password FROM users WHERE email = :email');
    // bind value to the :email parameter
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->execute();
//    var_dump($stmt->rowCount());
    if ($stmt->rowCount() == 0) {
        echo "User is not registered, proceed to registration page.";
    }else
        $uniqid = uniqid();
        $from    = 'carolgitonga45@gmail.com';
        $subject = 'Reset Password';
        $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
        $update_password_link = 'https://switchlink.com/auth/update-password.php?email='. $_POST['email'];
        $message = '<p>Please click the following link to reset your password:
                            <a href="' . $update_password_link . '">' . $update_password_link . '</a></p>';
        mail($_POST['email'], $subject, $message, $headers);
        echo 'Please check your email to reset password!';

}
