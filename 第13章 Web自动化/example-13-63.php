<?php
error_reporting(E_ALL);
require_once 'HTTP/Request.php';

if (! isset($_SERVER['argv'][1])) {
    die("No URL provided.\n");
}

$url = $_SERVER['argv'][1];

// Load the page
$r = load_with_http_request($url);

if (! strlen($r->getResponseBody())) {
    die("No page retrieved from $url");
}

// Convert to XML for easy parsing
$opts = array('output-xhtml' => true,
              'numeric-entities' => true);
$xml = tidy_repair_string($r->getResponseBody(), $opts);
$doc = new DOMDocument();
$doc->loadXML($xml);
$xpath = new DOMXPath($doc);
$xpath->registerNamespace('xhtml','http://www.w3.org/1999/xhtml');

// Compute the Base URL for relative links.
$baseURL = '';
// Check if there is a <base href=""/> in the page
$nodeList = $xpath->query('//xhtml:base/@href');
if ($nodeList->length == 1) {
    $baseURL = $nodeList->item(0)->nodeValue;
}
// No <base href=""/>, so build the Base URL from $url
else {
    $URLParts = parse_url($r->_url->getURL());
    if (! (isset($URLParts['path']) && strlen($URLParts['path']))) {
        $basePath = '';
    } else {
        $basePath = preg_replace('#/[^/]*$#','',$URLParts['path']);
    }
    if (isset($URLParts['username']) || isset($URLParts['password'])) {
        $auth = isset($URLParts['username']) ? $URLParts['username'] : '';
        $auth .= ':';
        $auth .= isset($URLParts['password']) ? $URLParts['password'] : '';
        $auth .= '@';
    } else {
        $auth = '';
    }
    $baseURL = $URLParts['scheme'] . '://' . 
               $auth . $URLParts['host'] .
               $basePath;
}

// Keep track of the links we visit so we don't visit each more than once
$seenLinks = array();

// Grab all links
$links = $xpath->query('//xhtml:a/@href');

foreach ($links as $node) {
    $link = $node->nodeValue;
    // Resolve relative links
    if (! preg_match('#^(http|https|mailto):#', $link)) {
        if (((strlen($link) == 0)) || ($link[0] != '/')) {
            $link = '/' . $link;
        }
        $link = $baseURL . $link;
    }
    // Skip this link if we've seen it already
    if (isset($seenLinks[$link])) {
        continue;
    }
    // Mark this link as seen
    $seenLinks[$link] = true;
    // Print the link we're visiting
    print $link.': ';
    flush();
    
    $r = load_with_http_request($link, 'HEAD');
    // Decide what to do based on the response code
    // 2xx response codes mean the page is OK
    
    if (($r->getResponseCode() >= 200) && ($r->getResponseCode() < 300)) {
        $status = 'OK';
    }
    // 3xx response codes mean redirection
    else if (($r->getResponseCode() >= 300) && ($r->getResponseCode() < 400)) {
        $status = 'MOVED';
        if (strlen($location = $r->getResponseHeader('location'))) {
            $status .= ": $location";
        }
    }
    // Other response codes mean errors
    else {
        $status = "ERROR: {$r->getResponseCode()}";
    }
    if (strlen($lastModified = $r->getResponseHeader('last-modified'))) {
        $status .= "; Last Modified: $lastModified";
    }
    // Print what we know about the link
    print "$status\n";
}

function load_with_http_request($url, $method = 'GET') {
    if ($method == 'GET') {
        $done = false; $max_redirects = 10;
        while ((! $done) && ($max_redirects > 0)) {
            $r = new HTTP_Request($url);
            $r->sendRequest();
            $responseCode = $r->getResponseCode();
            if (($responseCode >= 300) && ($responseCode < 400) &&
                strlen($location = $r->getResponseHeader('location'))) {
                    $url = $location;
                    $max_redirects--;
            } else {
                $done = true;
            }
        }
    } else {
        $r = new HTTP_Request($url);
        $r->setMethod(HTTP_REQUEST_METHOD_HEAD);
        $r->sendRequest();
    }
    return $r;
}
?>