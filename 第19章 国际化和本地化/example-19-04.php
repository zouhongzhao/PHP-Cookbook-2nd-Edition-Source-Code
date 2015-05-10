<?php
$messages = array ('en_US' => 
             array(
              'My favorite foods are' => 'My favorite foods are',
              'french fries' => 'french fries',
              'candy'        => 'candy',
              'potato chips' => 'potato chips',
              'eggplant'     => 'eggplant'
             ),
           'en_UK' => 
             array(
              'My favorite foods are' => 'My favourite foods are',
              'french fries' => 'chips',
              'candy'        => 'sweets',
              'potato chips' => 'crisps',
              'eggplant'     => 'aubergine'
             )
            );

function msg($s) {
    global $LANG, $messages;
    if (isset($messages[$LANG][$s])) {
        return $messages[$LANG][$s];
    } else {
        error_log("l10n error: LANG: $lang, message: '$s'");
    }
}
?>