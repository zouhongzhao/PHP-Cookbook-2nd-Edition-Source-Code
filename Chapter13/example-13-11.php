<?php
require_once 'HTTP/Client.php';

// Create a client
$client = new HTTP_Client();
// Issue a GET request
$client->get($url);
// Get the response
$response = $client->currentResponse();
// $response is an array with three elements:
// code, headers, and body
print $response['body'];
?>