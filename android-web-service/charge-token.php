<?php
/* handles the call from your Android App, 
 *   Call thus > https://url.domain.tld/to/sample/charge-token.php?token=PSTK_xxx&email=e@ma.il 
 */

require __DIR__ . '/paystack-class/Paystack.php';
require './functions.php';

$paystack = new Paystack(PAYSTACK_SECRET_KEY);

$token = filter_input(INPUT_GET, 'token');
$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
// TODO: validate and make the call
// if (file_exists('results/' . $token . '-request.json')) {
// // check already has a response, never requery
//     if (!file_exists('results/' . $code . '-response.json')) {
//         // verify the transaction
//         $rez = $paystack->transaction->verify(['reference'=>$code]);
//         // verify the transaction
//         list($headers, $body, $code) = $paystack->transaction->verify(['reference'=>$code]);
//         // check status in body of response
//         if ((intval($code) === 200) && array_key_exists('status', $body) && $body['status']) {
//             $data = $body['data']; // more about data on: https://developers.paystack.co/docs/verifying-transactions
//         // do what you want with data
//             file_put_contents('results/' . $code . '-response.json', json_encode($body));
// 
//             echo $data['status']; // tell the status to the customer
//         } else if ((array_key_exists('status', $body) && !$body['status'])) {
// // invalid body was returned
// // handle this or troubleshoot
//             throw new \Exception('HTTP Code: ' . $code . '. Transaction Initialise failed with message: '.$body['message']);
//         } else {
//         // invalid body was returned
//         // handle this or troubleshoot
//             throw new \Exception('HTTP Code: ' . $code . 'Transaction Verify failed');
//         }
//         
//     }
// }
