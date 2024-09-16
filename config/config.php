<?php

return [
    'api_key' => env('COCONUT_API_KEY', null),

    /**
     * Default storage
     */
    'storage' => 'ceph',

    'storages' => [



        /**
         * Minio S3 compatible storage
         */
        'ceph' => [
            'service' => 's3other',
            'bucket' => env('COCONUT_S3_BUCKET'),
            'force_path_style' => true,
            'region' => env('COCONUT_S3_REGION'),
            'credentials' => [
                'access_key_id' => env('COCONUT_S3_KEY'),
                'secret_access_key' => env('COCONUT_S3_SECRET'),
            ],
            'endpoint' => env('COCONUT_S3_ENDPOINT'),

        ],

    ],

    /**
     * Middlewares to add to the webhook route
     */
    'middleware' => [],

];
