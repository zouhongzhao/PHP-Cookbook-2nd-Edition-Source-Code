<?php

$html = '<a href="http://www.oreilly.com">I <b>love computer books.</b></a>
         <?php echo "Hello!" ?>';
print strip_tags($html);
?>