<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = DB::table('rich_users')->where('email', $credentials['email'])->first();

        if ($user && $credentials['password'] === $user->password) {
            return redirect()->intended('/calculator');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        // Auth::logout();
        return redirect('/login');
    }

}
