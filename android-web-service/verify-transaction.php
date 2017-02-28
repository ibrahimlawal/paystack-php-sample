<?php
/* handles the call from your Android App, 
 *   Call thus > https://url.domain.tld/to/sample/charge-token.php?token=PSTK_xxx&email=xxx@xxx.xxx
 */

require __DIR__ . '/paystack-class/Paystack.php';
require './functions.php';

// Configuration options
$config['paystack_key_test_secret'] = PAYSTACK_TEST_SECRET_KEY;
$config['paystack_key_live_secret'] = PAYSTACK_LIVE_SECRET_KEY;
$config['paystack_test_mode']       = true; // set to false when you are ready to go live

$paystack = new Paystack($config);

$reference = filter_input(INPUT_GET, 'reference');
$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
$body = $paystack->transaction->verify(['reference'=>$reference]);
if($reference){  
// You should get - and save - the authorization code so you may charge the customer in future
    $response_data = $body->data;
    // data should also have status success if the 1 naira charge was successful
    if ($response_data->status==='success' && $response_data->customer->email===$email) {
      // save the authorization code for customer in database
      // we are using a file-based storage in results folder
        file_put_contents('results/' . $reference . '-response.json', json_encode($body));

      // in this sample we simply echo the authorization_code so you may use to test charge-authorization.php
      // rather you should give your android application some information that helps the user
      // know that their card details were validated. a sample is included and commented out below
        header('Content-Type: application/json');
        echo json_encode($response_data->authorization);
      // echo $response_data['authorization']['card_type'] . ' card ending with ' . $response_data['authorization']['last4'] . ' was sucessfully validated.';
    } else {
      // transaction didn't succeed or is not owned by the email expected
    }

  
} else {
    throw new \Exception('A valid reference is required.');
}
