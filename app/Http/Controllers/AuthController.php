<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }
    public function loginPembeli(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email',
        ]);

        $user = User::updateOrCreate(
            ['email' => $request->email],
            [
                'name'  => $request->name,
                'no_hp' => $request->no_hp,
                'role'  => 'pembeli',
            ]
        );

        Auth::login($user);
        return redirect()->route('pembeli.dashboard');
    }

    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials) && Auth::user()->role === 'admin') {
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Email atau Password Admin salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
