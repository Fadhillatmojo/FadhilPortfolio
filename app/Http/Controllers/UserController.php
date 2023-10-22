<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function register(){
        return view('user.register');
    }

    // store new user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')->withSuccess('Kamu berhasil register dan telah login!');
    }

    public function login()
    {
        return view('user.login');
    }

    // autektikasi login user
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->withSuccess('Kamu berhasil Login!');
        }
        return back()->withErrors([
            'email'=> 'Kredensial yang dimasukkan tidak valid'
        ])->onlyInput('email');
    }
    
    // fungsi route dashboard
    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard.dashboard');
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Tolong login untuk mengakses dashboard.',
            ])->onlyInput('email');
    }

    // logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('Berhasil Logout');
    }
}
