<?php
require_once 'HTTP/Request.php';
$opts = array('timeout' => 15);
$req = new HTTP_Request('http://slow.example.com/', $opts);
$req->sendRequest();
?>