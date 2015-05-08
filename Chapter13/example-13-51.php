<?php
require_once 'class.html2text.inc';
$html = file_get_contents('http://www.example.com/article.html');
$converter = new html2text($html);
$plain_text = $converter->get_text();
?>