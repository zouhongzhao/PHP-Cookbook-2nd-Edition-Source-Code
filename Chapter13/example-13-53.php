<?php
$stream = fopen('elephant.html','r');
stream_filter_append($stream, 'string.strip_tags');
print stream_get_contents($stream);
?>