<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}



$environment = getenv('APP_ENV') ?: 'production';

if ($environment === 'local') {
    // Register the Composer autoloader...
    require __DIR__.'/../vendor/autoload.php';
    // Bootstrap Laravel and handle the request...
    (require_once __DIR__.'/../bootstrap/app.php')->handleRequest(Request::capture());
} else {
    require __DIR__.'/vendor/autoload.php';
    (require_once __DIR__.'/bootstrap/app.php')->handleRequest(Request::capture());
}