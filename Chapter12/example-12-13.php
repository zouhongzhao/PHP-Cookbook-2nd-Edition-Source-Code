$s = simplexml_load_file('address-book.xml');
$people = $s->xpath('/address-book/person');

foreach($people as $p) {
    list($firstname) = $p->xpath('firstname');
    list($lastname) = $p->xpath('lastname');
    
    print "$firstname $lastname\n";
}

David Sklar
Adam Trachtenberg