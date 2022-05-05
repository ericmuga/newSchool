<?php
namespace App;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

require '../vendor/autoload.php';
$client = new Client([
    'base_uri' => "https://zj6dv2.api.infobip.com/",
    'headers' => [
        'Authorization' => "App be3708f554bf8702a407319f937a6f7f-1168999f-1ed2-403d-8e7c-7d1a2f13e224",
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
    ]
]);

$response = $client->request(
    'POST',
    'sms/2/text/advanced',
    [
        RequestOptions::JSON => [
            'messages' => [
                [
                    'from' => 'InfoSMS',
                    'destinations' => [
                        ['to' => "254720816931"]
                    ],
                    'text' => 'This is a sample message',
                ]
            ]
        ],
    ]
);

echo("HTTP code: " . $response->getStatusCode() . PHP_EOL);
echo("Response body: " . $response->getBody()->getContents() . PHP_EOL);
