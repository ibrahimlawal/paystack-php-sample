<?php
/* handles the callback from Paystack, 
 *   remember to set this URL here > https://dashboard.paystack.co/#/settings/developer 
 */

require __DIR__ . '/vendor/autoload.php';
require './functions.php';

$paystack = new \Yabacon\Paystack(PAYSTACK_SECRET_KEY);

$code = filter_input(INPUT_GET, 'trxref');
if (file_exists('results/' . $code . '-request.json')) {
// check already has a response, never requery
    if (!file_exists('results/' . $code . '-response.json')) {
        // verify the transaction
        $rez = $paystack->transaction->verify(['reference'=>$code]);
        // verify the transaction (would throw an exception if unable to proper API response)
        $response = $paystack->transaction->verify(['reference'=>$code]);
        
        $data = $response->data; // more about data on: https://developers.paystack.co/docs/verifying-transactions
        // do what you want with data
        file_put_contents('results/' . $code . '-response.json', json_encode($response));
        echo $data->status; // tell the status to the customer
    }
}
