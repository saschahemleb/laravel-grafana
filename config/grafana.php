<?php

return [
    /**
     * This option defines which connection you want to use
     * as the default one.
     */
    'default' => 'main',

    /**
     * Here you can define the available connections. This
     * can house as many connections as you need. For now,
     * only basic auth is supported. You can use any
     * connection through `GrafanaManager::connection($name)`
     */
    'connections' => [
        'main' => [
            'url' => env('GRAFANA_URL'),
            'username' => env('GRAFANA_USERNAME'),
            'password' => env('GRAFANA_PASSWORD'),
        ],
    ],
];
