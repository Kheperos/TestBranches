<?php
/*
 * Endpoint for Github Webhook URLs
 *
 * see: https://help.github.com/articles/post-receive-hooks
 *
 */
// script errors will be send to this email:

//$postBody = $_POST['payload'];
//$payload = json_decode($postBody);
$myfile = fopen("hya.txt", "w") or die("Unable to open file!");


$data = json_decode( file_get_contents('php://input'), true );

var_dump($data["ref"]);

file_put_contents ('hya.txt', file_get_contents('php://input'));

//var_dump($data);

fclose($myfile);