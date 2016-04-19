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
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'twilio' => [
        'sid'    => env('TWILIO_SID'),
        'token'  => env('TWILIO_TOKEN'),
        'from_number' =>env('TWILIO_FROM_NUMBER'),
    ],

    'braintree' => [
        'model'  => App\User::class,
        'merchant'    => env('BRAINTREE_MERCHANT'),
        'public'    => env('BRAINTREE_PUBLIC'),
        'secret' => env('BRAINTREE_SECRET'),
    ],

    'google_map' => [
        'radius'    => env('GOOGLE_MAP_RESEARCH_RADIUS'),
        'limit'    => env('GOOGLE_MAP_RESEARCH_LIMIT'),
    ],

    'internal' => [
        'username'    => env('INTERNAL_USERNAM'),
        'password'    => env('INTERNAL_PASSWORD'),
    ],

    'environment' => [
        'baseurl'    => env('BASE_URL'),
    ],

    'pusher' => [
        'key'       => env('PUSHER_KEY'),
        'secret'   => env('PUSHER_SECRET'),
        'app'       =>env('PUSHER_APP_ID'),
    ],


];
