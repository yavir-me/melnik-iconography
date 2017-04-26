<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
    'domain' => env('MAILGUN_DOMAIN'),
    'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
    'key' => env('SES_KEY'),
    'secret' => env('SES_SECRET'),
    'region' => 'us-east-1',
    ],

    'sparkpost' => [
    'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
    'model' => App\User::class,
    'key' => env('STRIPE_KEY'),
    'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
    'client_id' => '353180381733877',
    'client_secret' => '942b9368394a99bcffba7d2ee114ba86',
    'redirect' => 'http://marts.dev/auth/facebook/callback',
    ],

    'twitter' => [
    'client_id' => 'Psgxmsf8wGQD1WwC5OWD5q1bX',
    'client_secret' => 'WMenbT5iwraoa9HR87f0fW52XzZOD9fU0qZ0JMzRQdrDYonvIn',
    'redirect' => 'http://marts.dev/auth/twitter/callback',
    ],

    'google' => [
    'client_id' => '173224299251-3a430lic6qdq05db391r6t9mhgjatusb.apps.googleusercontent.com',
    'client_secret' => 'f2YEq1ZzAdPkyUDRC73FvyAJ',
    'redirect' => 'http://marts.dev/auth/google/callback',
    ],

    ];
