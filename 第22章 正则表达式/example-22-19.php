<?php
$html = "<code>&lt;b&gt; It's bold &lt;/b&gt;</code>";
print preg_replace('@<code>(.*?)</code>@e',"preg_html_entity_decode('$1')", $html);
print "\n";

$html = '<code>&lt;i&gt; "This" is italic. &lt;/i&gt;</code>';
print preg_replace('@<code>(.*?)</code>@e',"preg_html_entity_decode('$1')", $html);
print "\n";

function preg_html_entity_decode($s) {
    $s = str_replace('\\"','"', $s);
    return html_entity_decode($s);
}
?>