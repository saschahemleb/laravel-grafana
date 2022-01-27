<?php

return [
    'default' => 'main',

    'connections' => [
        'main' => [
            'url' => env('GRAFANA_URL'),
            'username' => env('GRAFANA_USERNAME'),
            'password' => env('GRAFANA_PASSWORD'),
        ],
    ],
];
