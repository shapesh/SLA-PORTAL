<?php
$serverName = "SLA-DEV-005\SQLEXPRESS"; //Hostname/IP,...
$connectionOptions = array(
    "Database" => "sla-portal",
    "Uid" => "",
    "PWD" => ""
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if( $conn === false ) {
//    echo "error with connection";
    die( print_r( sqlsrv_errors(), true)); //See why it fails
}

  if (!isset($_GET['token'])) {
    // How did you get here?
    header("Location: index.html");
  }

//$pageTitle = 'Registration Confirmation';
//require 'includes/header.php';
//logout(); // In case a different user has logged in

$token = $_GET['token'];
$currentTime = date("Y-m-d H:i:s", strtotime("+3 hours"));
//die($currentTime);
$tokenQuery = "SELECT user_id
    FROM tokens
    WHERE token = ?
    AND token_expires > ?";
$tokenQueryParams = array($token, $currentTime);
$tokenDataResults = sqlsrv_query($conn, $tokenQuery, $tokenQueryParams);
if ($tokenDataResults == false)
    die( print_r( sqlsrv_errors(), true)); //See why it fails
while($row = sqlsrv_fetch_array($tokenDataResults, SQLSRV_FETCH_ASSOC)){
    $qUpdate = "UPDATE users
  SET registration_confirmed = ?
  WHERE user_id = ?";
    $confirmParams = array(1,$row['user_id']);
    $confirmDetails = sqlsrv_query($conn, $qUpdate, $confirmParams);
//$rowsUpdated = sqlsrv_rows_affected($confirmDetails);
    if ($confirmDetails == false)
        die( print_r( sqlsrv_errors(), true)); //See why it fails
        header("Location: login.php?just-registered=1");
}
sqlsrv_free_stmt($confirmDetails);

