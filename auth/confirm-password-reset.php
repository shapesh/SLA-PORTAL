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
//    var_dump($_GET['email']);
//    echo "Connected!";
    //check the password and confirm password match
    if ($_POST['password'] !== $_POST['confirm_password']) {
        exit('Passwords do not match!');
    }
    $email = $_GET['email'];
//    var_dump($email);
    // We need to check if the account with that email exists.
    $stmt = $conn->prepare('SELECT id, password FROM users WHERE email = :email');
    // bind value to the :email parameter
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    if ($stmt->rowCount() == 0){
        exit('User does not exist');
    }

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // Lets update the password
        $sql = "UPDATE users SET password = :password WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
//        header("Location: login2.php?password-updated=1");
    exit('Passwords updated successfully. You may proceed to login.');
}
