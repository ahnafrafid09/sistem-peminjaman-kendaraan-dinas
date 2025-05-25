<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Tambahkan middleware global di sini
    ];

    protected $middlewareGroups = [
        'web' => [
            // middleware web
        ],
        'api' => [
            // middleware api
        ],
    ];

    protected $routeMiddleware = [
        // middleware lain...
        'is_admin' => \App\Http\Middleware\IsAdmin::class,
    ];
}
