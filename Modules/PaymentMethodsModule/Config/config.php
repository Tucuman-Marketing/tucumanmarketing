<?php

return [
    'name' => 'PaymentMethodsModule',


    //payment methods array
    'payment_methods' => [
        'mercadopago' => [
            'base_uri' => 'https://api.mercadopago.com',
            'access_token' => env('MERCADOPAGO_ACCESS_TOKEN'),
            'public_key' => env('MERCADOPAGO_PUBLIC_KEY'),
        ],

        'stripe' => [
            'base_uri' => 'https://api.stripe.com',
            'secret_key' => env('STRIPE_SECRET_KEY'),
            'public_key' => env('STRIPE_PUBLIC_KEY'),
        ],

        'paypal' => [
            'base_uri' => 'https://api.paypal.com',
            'client_id' => env('PAYPAL_CLIENT_ID'),
            'secret' => env('PAYPAL_SECRET'),
        ],
    ],


];
