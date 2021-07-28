<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register_post(Request $request)
    {
        Auth::logout();

        User::create([
            "name" => $request->nama,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);

        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('home');
    }

    public function register()
    {
        return view('register');
    }
}