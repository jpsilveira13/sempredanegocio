<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => 'sempredanegocio.com',
        'secret' => 'key-be5e439b268e3fa3e9fd89d23e531ce7',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],



    'stripe' => [
        'model'  => sempredanegocio\Models\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '190387111301918',
        'client_secret' => 'ec1279ddb7e26e2927798bbd3dd76f55',
        'redirect' => 'http://www.sempredanegocio.com.br/social/login/facebook'
    ],

];
