<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '450099422966-cf2a1mt5qa8nvkt8pirt0jrom54qhi54.apps.googleusercontent.com',
        'client_secret' => 'CjodlvcaaGl3MsvAmmRbjFSd',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
    ], 

    'facebook' => [
        'client_id' => '532608424246127',
        'client_secret' => '0431c1c43c189762b29e6d05588c1d81',
        'redirect' => 'http://127.0.0.1:8000/callback/facebook',
    ],
];
