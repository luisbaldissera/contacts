<?php 

function escape($html) {
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

function pad_percent(&$item, $key) {
    $item = '\'%' . $item . '%\'';
}

function cmp_contact($a, $b) {
    return strcmp($a['firstname'], $b['firstname']);
}

session_start();

if (empty($_SESSION['csrf'])) {
    if (function_exists('random_bytes')) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    } else if (function_exists('mycrypt_create_iv')) {
        $_SESSION['csrf'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    } else {
        $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
    }
}

?>