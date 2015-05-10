<?php
require_once 'HTTP/Request.php';
$r = new HTTP_Request('http://www.example.com/robots.txt');
$r->sendRequest();
$page = $r->getResponseBody();
?>