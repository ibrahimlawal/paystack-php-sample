<?php

require __DIR__ . '/vendor/autoload.php';

$paystack = new Eidetic\Paystack('sk_test_40899660eac2be0a6a6915f6ba32f81bc8bac143');

print_r($paystack->customer(199));
print_r($paystack->customer(2020));

