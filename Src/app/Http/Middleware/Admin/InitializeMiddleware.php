<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;

class InitializeMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        $jsConfig = [
            'locale' => [
                'labels' => __('labels'),
                'datatable' => __('datatable'),

            ],
        ];

        $theme = setting('admin_panel', 'theme') ?? 'lite-purple';

        view()->share([
            'jsConfig' => $jsConfig,
            'theme' => $theme,
        ]);

        return $next($request);
    }
}
