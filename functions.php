<?php
error_reporting(-1);
require './luhn-creator.php';

define('PAYSTACK_SECRET_KEY', 'sk_test_xxx');

function getIp()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function getUnusedCode()
{
// to generate our random string code
    $newcode = createLuhnCheckedRandomString(10);

// while the new string exists, get a new code
    while (file_exists('results/' . $newcode . '-response.json')) {
        $newcode = createLuhnCheckedRandomString(10);
    }

    return $newcode;
}
