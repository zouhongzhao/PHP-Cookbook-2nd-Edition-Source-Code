<?php
// data
$music_database = <<<_MUSIC_
<?xml version="1.0" encoding="utf-8" ?>
<music>
	<album id="1">
		<name>Revolver</name>
		<artist>The Beatles</artist>
	</album>
	<!-- 941 more albums here -->
	<album id="943">
		<name>Miles And Coltrane</name>
		<artist>Miles Davis</artist>
		<artist>John Coltrane</artist>
	</album>
</music>
_MUSIC_;

// load data
$s = simplexml_load_string($music_database);

// query data
$artist = addslashes($_GET['artist']);
$query = "/music/album[artist = '$artist']";
$albums = $s->xpath($query);

// display query results as XML
print "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";
print "<music>\n\t";
foreach ($albums as $a) {
    print $a->asXML();
}
print "\n</music>";
?>