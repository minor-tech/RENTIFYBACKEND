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

    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Apply CORS to all API routes and Sanctum CSRF cookie endpoint

    'allowed_methods' => ['*'], // Allow all HTTP methods

    'allowed_origins' => ['*'], // Allow requests from any origin (for development only)

    'allowed_origins_patterns' => [], // Use patterns to match allowed origins

    'allowed_headers' => ['*'], // Allow all headers

    'exposed_headers' => [], // Headers to expose to the client

    'max_age' => 0, // Max age of the preflight request

    'supports_credentials' => false, // Allow credentials (cookies, authorization headers)

];