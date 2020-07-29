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

  if (!isset($_GET['token'])) {
    // How did you get here?
    header("Location: index.html");
  }

$token = $_GET['token'];
$currentTime = date("Y-m-d H:i:s", strtotime("+3 hours"));
//die($currentTime);

    // Check if the token sent to the user exist exist
    $stmt = $conn->prepare('SELECT *
    FROM tokens
    WHERE token = ?
    AND token_expires > ?');
    // bind value to the parameters
    $stmt->bindParam(1, $token);
    $stmt->bindParam(2, $currentTime);
    $stmt->execute();
    $tokenRow = $stmt->fetchObject();
    $userId = $tokenRow->user_id;
//    $userId = 37;
    $confirmReg = 1;

        // Update the users confirm_reg field to 1 when the user clicks the email confirmation link
    $sql = "UPDATE users SET confirm_reg = :confirm_reg WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':confirm_reg', $confirmReg, PDO::PARAM_INT);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    header("Location: login2.php?registration-confirmed=1");

}


