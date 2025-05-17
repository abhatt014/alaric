<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'admin.guest' => \App\Http\Middleware\AdminRedirect::class,
            'admin.auth' => \App\Http\Middleware\AdminAuthentication::class,
            'auditor.guest' => \App\Http\Middleware\AuditorRedirect::class,
            'auditor.auth' => \App\Http\Middleware\AuditorAuthenticate::class,
            'hr.guest' => \App\Http\Middleware\HrRedirect::class,
            'hr.auth' => \App\Http\Middleware\HrAuthenticate::class,
        ]);
        
        // $middleware->redirectTo(
        //     guests: '/user/login',
        //     users: '/user/dashboard',
        // );
        $middleware->redirectTo(
            guests: 'user/login',
            users: function ($user) {
                switch ($user->role) {
                    case 'admin':
                        return '/admin/dashboard';
                    case 'hr':
                        return '/hr/dashboard';
                    case 'auditor':
                        return '/auditor/dashboard';
                    default:
                        return '/user/dashboard';
                }
            },
        );

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
