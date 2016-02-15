<?php
/* handles the callback from Paystack, 
 *   remember to set this URL here > https://dashboard.paystack.co/#/settings/developer 
 */

require __DIR__ . '/vendor/autoload.php';
require './functions.php';

$paystack = new \YabaCon\Paystack(PAYSTACK_SECRET_KEY);

$code = filter_input(INPUT_GET, 'trxref');
if (file_exists('results/' . $code . '-request.json')) {
// check already has a response, never requery
    if (!file_exists('results/' . $code . '-response.json')) {
        // verify the transaction
        $rez = $paystack->transaction->verify(['reference'=>$code]);
        // verify the transaction
        list($headers, $body, $code) = $paystack->transaction->verify(['reference'=>$code]);
        // check status in body of response
        if ((intval($code) === 200) && array_key_exists('status', $body) && $body['status']) {
            $data = $body['data']; // more about data on: https://developers.paystack.co/docs/verifying-transactions
        // do what you want with data
            file_put_contents('results/' . $code . '-response.json', json_encode($body));

            echo $data['status']; // tell the status to the customer
        } elseif ((array_key_exists('status', $body) && !$body['status'])) {
// invalid body was returned
// handle this or troubleshoot
            throw new \Exception('HTTP Code: ' . $code . '. Transaction Verify failed with message: '.$body['message']);
        } else {
        // invalid body was returned
        // handle this or troubleshoot
            throw new \Exception('HTTP Code: ' . $code . 'Transaction Verify failed');
        }
        
    }
}
