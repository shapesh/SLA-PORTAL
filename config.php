<?php
//define('CONSUMER_KEY', 'tRE3ItKQDtSkSKQFDuYgwKcdz');
//define('CONSUMER_SECRET', 'w5asGkQ4t7ytudPivYVCCCSTgCj03HPN8LQ1Xd6ngPqMfPjToU');
//define('OAUTH_CALLBACK', 'http://switchlink.com/process.php');

require_once 'vendor/autoload.php';

if (!session_id())
{
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
    'app_id'      => '579529672749062',
    'app_secret'     => '7fb50e73b73dd369b0cdc71c313913ec',
    'default_graph_version'  => 'v2.10'
]);

?>
