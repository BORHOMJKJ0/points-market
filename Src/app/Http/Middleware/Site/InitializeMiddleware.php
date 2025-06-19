<?php

namespace App\Http\Middleware\Site;

use App\Models\Section;
use Closure;
use Illuminate\Http\Request;

class InitializeMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        session('cart') ?? session()->put('cart', collect([]));

        view()->share([
            'header_sections' => Section::all(),
        ]);

        return $next($request);
    }
}
