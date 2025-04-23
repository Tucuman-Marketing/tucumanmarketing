<?php

return [
    'app_name'   => env('APP_NAME'),
    'app_url'    => env('APP_URL'),

    'roles' => [
        'superadmin' => 1,
        'admin'      => 2,
        'doctor'     => 3,
        'assistant'  => 4,
    ],

    'email_notifiable' => env('EMAIL_NOTIFIABLE', 'default@example.com'),

    'week_days' => [
        1 => 'lunes',
        2 => 'martes',
        3 => 'miércoles',
        4 => 'jueves',
        5 => 'viernes',
        6 => 'sábado',
        7 => 'domingo',
    ],

    // HBS 2023.08 FALTA: Mejorar nmbre de esta variable
    'time_default' => [
        '09:00 AM',
        '09:30 AM',
        '10:00 AM',
        '10:30 AM',
        '11:00 AM',
        '11:30 AM',
        '12:00 PM',
        '12:30 PM',
        '01:00 PM',
        '01:30 PM',
        '02:00 PM',
        '02:30 PM',
        '03:00 PM',
        '03:30 PM',
        '04:00 PM',
        '04:30 PM',
        '05:00 PM',
        '05:30 PM',
        '06:00 PM',
    ],
    'start_time_default'   => '09:00 AM',
    'end_time_default'     => '06:00 PM',
    'end_time_default_24h' => '18:00:00',


];
