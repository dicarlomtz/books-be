<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['*'],

    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'],

    'allowed_origins' => [env('ALLOWED_HOST')],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['Accept', 'Origin', 'X-Requested-With', 'Content-Type', 'Authorization', 'X-CSRF-TOKEN', 'X-XSRF-TOKEN'],

    'exposed_headers' => ['Accept', 'Origin', 'X-Requested-With', 'Content-Type', 'Authorization', 'X-CSRF-TOKEN', 'X-XSRF-TOKEN'],

    'max_age' => 0,

    'supports_credentials' => true,

];
