<?php
header("Content-type: text/javascript", true);
// for fast load times, all javascript are concatenated into this file at request time

$toecho = file_get_contents('jquery-1.11.3.min.js');
$toecho .= "\n" . file_get_contents('jquery.validate.min.js');
$toecho .= "\n" . file_get_contents('autoNumeric-min.js');
$toecho .= "\n" . file_get_contents('script.js');

echo $toecho;
