<?php
$text = '<code>if ($temperature &lt; 12) { fever(); }</code>';
print "Good: \n";
print preg_replace('@<code>(.*?)</code>@e',"preg_html_entity_decode('$1')", $text);
print "\n Bad: \n";
print preg_replace('@<code>(.*?)</code>@e','preg_html_entity_decode("$1")'  , $text);

function preg_html_entity_decode($s) {
    $s = str_replace('\\"','"', $s);
    return html_entity_decode($s);
}
?>