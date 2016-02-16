<?php
/* handles the call from your Android App, 
 *   Call thus > https://url.domain.tld/to/sample/charge-token.php?token=PSTK_xxx&email=xxx@xxx.xxx
 */

require __DIR__ . '/paystack-class/Paystack.php';
require './functions.php';

// Configuration options
$config['paystack_key_test_secret']         = PAYSTACK_TEST_SECRET_KEY;
$config['paystack_key_live_secret']         = PAYSTACK_LIVE_SECRET_KEY;
$config['paystack_test_mode']               = true; // set to false when you are ready to go live

$paystack = new Paystack($config);

$token = filter_input(INPUT_GET, 'token');
$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
if ($email && is_string($token) && (substr_compare($token, 'PSTK_', 0, 5, true)===0)) {
  // get a code to use for this request
    $reference = getUnusedCode();
    $request['params'] = [
                'reference'=>$reference,
                'token'=>$token,
                'email'=>$email,
                'amount'=>100 // in kobo, we only want to verify that the card is authentic, so we charge just 1 naira
              ];
// add the time of the request to the array
    $request['time'] = gmdate("Y-m-d\TH:i:s\Z");
// add the user's ip to the array
    $request['ip'] = getIp();
              
  // log the request to our file-based storage
  // save the array to a file named by the code chosen
    file_put_contents('results/' . $reference . '-request.json', json_encode($request));

  // make the paystack call on the request params
    list($headers, $body, $code) = $paystack->transaction->chargeToken($request['params']);
  
  // test that the status code was 200 and the body gave status true, and there's data in body
    if ((intval($code)===200) && array_key_exists('status', $body) && $body['status'] && array_key_exists('data', $body)) {
    // You should get - and save - the authorization code so you may charge the customer in future
        $response_data = $body['data'];
    // data should also have status success if the 1 naira charge was successful
        if (array_key_exists('status', $response_data) && ($response_data['status']==='success')) {
          // save the authorization code for customer in database
          // we are using a file-based storage in results folder
            file_put_contents('results/' . $reference . '-response.json', json_encode($body));

          // in this sample we simply echo the authorization_code so you may use to test charge-authorization.php
          // rather you should give your android application some information that helps the user
          // know that their card details were validated. a sample is included and commented out below
            header('Content-Type: application/json');
            echo json_encode($response_data['authorization']);
          // echo $response_data['authorization']['card_type'] . ' card ending with ' . $response_data['authorization']['last4'] . ' was sucessfully validated.';
        }
    } elseif ((array_key_exists('status', $body) && !$body['status'])) {
// invalid body was returned
// handle this or troubleshoot
        throw new \Exception('HTTP Code: ' . $code . '. Charge token failed with message: '.$body['message']);
    } else {
        // invalid body was returned
        // handle this or troubleshoot
        throw new \Exception('HTTP Code: ' . $code . 'Charge token failed');
    }
  
} else {
    throw new \Exception('A valid email and a valid Paystack token is required.');
}
