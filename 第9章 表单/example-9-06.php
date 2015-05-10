<?php
if (! ctype_digit($_POST['age'])) {
    print 'Your age must be a number bigger than or equal to zero.';
}
?>