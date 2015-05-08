<?php
require 'HTTP/Request.php';

$r = new HTTP_Request('http://www.example.com/special-header.php');
$r->addHeader('X-Factor',12);
$r->addHeader('My-Header','Bob');
$r->sendRequest();
$page = $r->getResponseBody();
?>