<?php

namespace App\Http\Controllers\Admin\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangeTabController extends Controller
{
    public function __invoke(Request $request)
    {
        $tabs = session('tabs') ?? [];

        $tabs[$request->current_url] = $request->tab;

        session()->put('tabs', $tabs);
    }
}
