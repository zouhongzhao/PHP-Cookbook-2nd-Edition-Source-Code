<?php
$html = 'The &lt;b&gt; tag makes text bold: <code>&lt;b&gt;bold&lt;/b&gt;</code>';
print preg_replace('@<code>(.*?)</code>@e',"html_entity_decode('$1')", $html);
?>