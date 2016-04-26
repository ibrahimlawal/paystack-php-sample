<?php
require __DIR__ . '/vendor/autoload.php';
require './functions.php';

$paystack = new \YabaCon\Paystack(PAYSTACK_SECRET_KEY);

// an array object to store the request to file
$req = [];

// add the time of the request to the array
$req['time'] = gmdate("Y-m-d\TH:i:s\Z");
// add the user's ip to the array
$req['ip'] = getIp();
// get the formdata submitted
$req['form'] = json_encode($_POST);
// add the user email to the array
$req['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
// add the amount to the array
$req['amountngn'] = floatval(filter_input(INPUT_POST, 'amountngn'));

// get a code to use for this transaction
$newcode = getUnusedCode();

// save the array to a file named by the code chosen
file_put_contents('results/' . $newcode . '-request.json', json_encode($req));

// confirm that we got a valid email
if (!$req['email']) {
    die('An invalid email was sent');
}
// confirm that we got a valid amount
if (!$req['amountngn']) {
    die('An invalid amount was sent');
}

// initiate transaction (Remember to change this if you are using Guzzle
// Check the README here > https://github.com/yabacon/paystack-php/
$response = $paystack->transaction->initialize([
                'reference'=>$newcode,
                'amount'=>$req['amountngn'] * 100, // in kobo
                'email'=>$req['email']
              ]);
// check if transaction url was generated
$url = $response->data->authorization_url; // more about data on: https://developers.paystack.co/docs/paystack-standard
// redirect to receive payment
header('Location: '.$url);
die();

