<?php
header("Content-type: text/css", true);
// for fast load times, all css are concatenated into this file at request time

$toecho = file_get_contents('bootstrap/css/bootstrap.min.css');
$toecho .= "\n" . file_get_contents('payment-methods.css');

echo $toecho;
