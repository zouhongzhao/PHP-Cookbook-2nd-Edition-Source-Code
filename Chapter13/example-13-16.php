<?php
require 'HTTP/Request.php';
$url = 'http://www.example.com/submit.php';
$r = new HTTP_Request($url);
$r->setMethod(HTTP_REQUEST_METHOD_POST);
$r->addPostData('monkey','uncle');
$r->addPostData('rhino','aunt');
$r->sendRequest();
$page = $r->getResponseBody();
?>