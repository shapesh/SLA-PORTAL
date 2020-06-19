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
    //else {
    //    echo "Connected!";
    //}
    // Now we check if the data was submitted, isset() function will check if the data exists.
    if (!isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {
        // Could not get the data that should have been sent.
        exit('Please complete the registration form!');
    }
    // Make sure the submitted registration values are not empty.
    if (empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm_password'])) {
        // One or more values are empty.
        exit('Please complete the registration form');
    }
    //check the password and confirm password match
    if ($_POST['password'] !== $_POST['confirm_password']) {
        exit('Passwords do not match');
    }
    $email = $_POST['email'];
    //var_dump($email);
    // Check if email exists
    //if (isset($_POST['email'])) {
    $qUsernameCheck = "SELECT * FROM users WHERE email='$email'";
    //    try {
    $stmtUsername = sqlsrv_query($conn, $qUsernameCheck, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET));
    $rowsFetched = sqlsrv_num_rows($stmtUsername);
    if ($stmtUsername == FALSE or $rowsFetched === FALSE)
        die(print_r(sqlsrv_errors(), true)); //See why it fails
    elseif ($rowsFetched > 0)
        exit('User with this email already exist');
    elseif ($rowsFetched === 0)
        $hashedPhrase = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $token = uniqid('switchlink-', true);
    $userInserts = "INSERT INTO users
              (first_name, last_Name, email, pass_phrase)
              VALUES (?, ?, ?, ?);";
    $userParams = array($_POST['fname'], $_POST['lname'], $_POST['email'], $hashedPhrase);
    $getUserResults = sqlsrv_query($conn, $userInserts, $userParams);
    $rowsAffected = sqlsrv_rows_affected($getUserResults);
    if ($getUserResults == FALSE or $rowsAffected == FALSE) {
        die(print_r(sqlsrv_errors(), true)); //See why it fails
    }
    $insertedData = "SELECT * FROM users WHERE email='$email'";
    $stmtUsername = sqlsrv_query($conn, $qUsernameCheck);
    if ($stmtUsername == FALSE)
        die(print_r(sqlsrv_errors(), true)); //See why it fails
    while ($row = sqlsrv_fetch_array($stmtUsername, SQLSRV_FETCH_ASSOC)) {
        $tokenInsert = "INSERT INTO tokens
        (token, user_id, token_expires)
          VALUES (?, ?, ?);";
        $tokenExpiry = date("Y-m-d H:i:s", strtotime("+4 hours"));
        $tokeParams = array($token, $row['user_id'], $tokenExpiry);
        $tokenDataResults = sqlsrv_query($conn, $tokenInsert, $tokeParams);
        $from    = 'carolgitonga45@gmail.com';
        $subject = 'Account Activation Required';
        $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
        $activate_link = 'https://switchlink.com/auth/registration-confirmation.php?email=' . $row['email'] . '&token='  . $token . '&uuid=' .$row['user_id'];
        $message = '<p>Please click the following link to activate your account:
                            <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
        mail($row['email'], $subject, $message, $headers);
        echo 'Please check your email to activate your account!';
    }
    sqlsrv_free_stmt($stmtUsername);
    sqlsrv_free_stmt($getUserResults);
    sqlsrv_free_stmt($tokenDataResults);

