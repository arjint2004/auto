<?php
require_once 'facebook-php-sdk/src/facebook.php';

$facebook = new Facebook();

$app_id = YOUR_APP_ID;

$app_secret = YOUR_APP_SECRET;

$app_access_token = $app_id . '|' . $app_secret;

$response = $facebook->api( '/RECEIVER_USER_ID/notifications', 'POST', array(

                'template' => 'You have received a new message.',

                'href' => 'RELATIVE URL',

                'access_token' => $app_access_token
            ) );    

print_r($response);
?>