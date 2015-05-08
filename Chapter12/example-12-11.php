$dom = new DOMDocument;
$dom->load('address-book.xml');
$xpath = new DOMXPath($dom);
$person = $xpath->query('/address-book/person');

foreach ($person as $p) {
    $fn = $xpath->query('firstname', $p);
    $firstname = $fn->item(0)->firstChild->nodeValue;

    $ln = $xpath->query('lastname', $p);
    $lastname = $ln->item(0)->firstChild->nodeValue;

    print "$firstname $lastname\n";
}

David Sklar
Adam Trachtenberg