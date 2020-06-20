<?php
$serverName = "SLA-DEV-005\SQLEXPRESS"; //Hostname/IP,...
$connectionOptions = array(
    "Database" => "sla-portal",
    "Uid" => "",
    "PWD" => ""
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    //    echo "error with connection";
    die(print_r(sqlsrv_errors(), true)); //See why it fails
}
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
$email = $_POST['email'];
$checkUserQuery = "SELECT * FROM users WHERE email = ?";
$checkUserParams = array($_POST['email']);
$existingUserData = sqlsrv_query($conn, $checkUserQuery, $checkUserParams, array("Scrollable" => SQLSRV_CURSOR_KEYSET));
$noExisting = sqlsrv_num_rows($existingUserData);
if ($existingUserData==FALSE or $noExisting==FALSE)
    die(print_r(sqlsrv_errors(), true)); //See why it fails
elseif ($noExisting == 0)
    exit('user does not exist');
//    header('Location: index.html');
else
    while ($row = sqlsrv_fetch_array($existingUserData, SQLSRV_FETCH_ASSOC)) {
//    echo $row['user_id']. $row['email']. $row['first_name'] . $row['registration_confirmed'];
        if ( !$row['registration_confirmed'])
            exit('User not confirmed for registration.');
        elseif (password_verify($_POST['password'], $row['pass_phrase']))
            exit('Successfully confirmed. You can proceed to portal');
        elseif(!password_verify($_POST['password'], $row['pass_phrase']))
            exit('Either username or password is incorrect!');

}


