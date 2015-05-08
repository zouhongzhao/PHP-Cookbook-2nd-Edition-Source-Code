<?php
// Making sure $_POST['flavor'] exists before checking its length
if (! (isset($_POST['flavor']) && strlen($_POST['flavor']))) {
   print 'You must enter your favorite ice cream flavor.';
}

// $_POST['color'] is optional, but if it's supplied, it must be
// more than 5 characters
if (isset($_POST['color']) && (strlen($_POST['color']) <=5 )) {
   print 'Color must be more than 5 characters.';
}

// Making sure $_POST['choices'] exists and is an array
if (! (isset($_POST['choices']) && is_array($_POST['choices']))) {
   print 'You must select some choices.';
}
?>