<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view ('auth.login');
    }

    public function auth(Request $request)
    {
        $validated = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($validated)) {
            if(Auth::user()->status == 'Ativo') {
                $request->session()->regenerate();
                return Redirect::intended('home');
            } else {
                Auth::logout();
                return Redirect::route('login')->withErrors([
                    'alert' => 'Desculpe, mas o asuário está desativado.'
                ]);
            }
        }else {
            return back()->withErrors([
                'email' => trans('auth.failed'),
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
