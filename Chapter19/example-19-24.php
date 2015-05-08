<?php
// Define the directories where the "animals" catalog can be found
bindtextdomain('animals','/home/translator/custom/locale');
// Use the 'animals' catalog as a default
textdomain('animals');


$languages = array('en_US','fr_FR','de_DE');
foreach ($languages as $language) {
    // Change to the appropriate locale
    setlocale(LC_ALL, $language);
    // And get a localized string
    print gettext('Monkey');
    print "\n";
}
?>