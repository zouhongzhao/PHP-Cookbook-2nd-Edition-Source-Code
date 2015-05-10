<?php
$r = new HTTP_Request('http://www.example.com/secrets.php');
$r->setBasicAuth('david','hax0r');
$r->sendRequest();
$page = $r->getResponseBody();