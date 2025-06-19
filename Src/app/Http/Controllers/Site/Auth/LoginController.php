<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    public function showLoginForm()
    {
        $page_title = __('pages.login');

        return view('site.auth.login', compact('page_title'));
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|email|exists:users',
            'password' => 'required|string|max:191',
        ]);
    }

    protected function loggedOut(Request $request)
    {
        return redirect()->route('site.login');
    }

    protected function guard()
    {
        return Auth::guard('user');
    }
}
