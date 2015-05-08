<?php
$doc = new DOMDocument();
$opts = array('output-xml' => true,
              // Prevent DOMDocument from being confused about entities
              'numeric-entities' => true);
$doc->loadXML(tidy_repair_file('linklist.html',$opts));
$xpath = new DOMXPath($doc);
// Tell $xpath about the XHTML namespace
$xpath->registerNamespace('xhtml','http://www.w3.org/1999/xhtml');
foreach ($xpath->query('//xhtml:a/@href') as $node) {
    $link = $node->nodeValue;
    print $link . "\n";
}
