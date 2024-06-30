<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ControllerAuthentication extends Controller
{
    public function login()
    {
        return view('login.index', [
            "pages" => "home"
        ]);
    }
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => 'required|min:3|max:15',
            'password' => 'required|min:5|max:20',
        ]);
        $remember = ($request->get('remember') == 'on') ? true : false;

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function create()
    {
        return view('login.signup', [
            "pages" => "home"
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|min:3|max:15',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:20'
        ]);

        $validated["email_verified_at"] = Carbon::now()->format('Y-m-d H:i:s');
        User::create($validated);
        return redirect('/signin');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/signin');
    }
}
