<?php

use App\Http\Middleware\PemilikKomentar;
use App\Http\Middleware\PemilikPostingan;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->append(PemilikPostingan::class);
        // $middleware->append(PemilikKomentar::class);

        $middleware->alias([
            'PemilikKomentar' => PemilikKomentar::class,
            'PemilikPostingan' => PemilikPostingan::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
