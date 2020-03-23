<?php

return [

    'telegram' => [
        'api_token' => '',
        'bot_username' => '',
        'channel_username' => '', // Channel username to send message
        'channel_signature' => '', // This will be assigned in the footer of message
        'proxy' => false,   // True => Proxy is On | False => Proxy Off
    ],

    'twitter' => [
        'consurmer_key' => '',
        'consurmer_secret' => '',
        'access_token' => '',
        'access_token_secret' => ''
    ],

    'facebook' => [
        'app_id' => '925061354541931',
        'app_secret' => '404198ebc39b27d8ea125d76fd99dcdd',
        'default_graph_version' => 'v5.0',
        'page_access_token' => 'EAANJVqFu02sBACmeZCZCydy6cZC5RSaV3FODucKTJj6PN7p64VXwPNsce3ZCBhUNyEYdVIL1SUsRI0XJ2xkBdIQhMczV9AtbKw6j7ZAdiBUnOgEOm3BxQd0MR2kB4NBAnZBv4kY1qskPLPFEH50JPK0EXMAFZBJNB33e3cMCA3bbvFqvrKipOGvSMmF0myZCXGMWZBM7NZCZCw4BuMLtMAHYlkJ'
    ],

    // Set Proxy for Servers that can not Access Social Networks due to Sanctions or ...
    'proxy' => [
        'type' => '',   // 7 for Socks5
        'hostname' => '', // localhost
        'port' => '' , // 9050
        'username' => '', // Optional
        'password' => '', // Optional
    ]
];
