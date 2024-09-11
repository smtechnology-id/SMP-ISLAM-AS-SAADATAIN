<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->level == 'admin') {
                return redirect('/admin/dashboard');
            } elseif (Auth::user()->level == 'user') {
                return redirect('/user/dashboard');
            } else {
                return redirect('/');
            }
        }

        return redirect('/')->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);
        $level = 'user';

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $level,
        ]);
        
       Auth::login($user);
       return redirect('/user/dashboard')->with('success', 'Pendaftaran berhasil, Anda Sudah Login.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
