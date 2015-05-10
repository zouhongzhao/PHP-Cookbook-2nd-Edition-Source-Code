<?php
ini_set('session.use_only_cookies', true);
session_start();

$salt     = 'YourSpecialValueHere';
$tokenstr = (str) date('W') . $salt;
$token    = md5($tokenstr);

if (!isset($_REQUEST['token']) || $_REQUEST['token'] != $token) {
    // prompt for login
    exit;
}

$_SESSION['token'] = $token;

ob_start('inject_session_token');

function inject_session_token($buffer)
{
    $hyperlink_pattern = "/<a[^>]+href=\"([^\"]+)/i";
    preg_match_all($hyperlink_pattern, $buffer, $matches);
        
    foreach ($matches[1] as $link) {
        if (strpos($link, '?') === false) {
            $newlink = $link . '?token=' . $_SESSION['token'];
        } else {
            $newlink = $link .= '&token=' . $_SESSION['token'];
        }
        $buffer = str_replace($link, $newlink, $buffer);
    }
    
    return $buffer;   
}