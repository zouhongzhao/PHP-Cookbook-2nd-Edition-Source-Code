<?php
require 'HTTP/Request.php';
$r = new HTTP_Request('http://www.example.com/needs-cookies.php');
$r->addHeader('Cookie','user=ellen; activity=swimming');
$r->sendRequest();
$page = $r->getResponseBody();
?>