<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function login()
    {
        if ($user = Auth::user()){
            return view('User/user-menu' , compact('user'));
        }
        return view('User/login');
    }

    public function auth(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'min:5'],
            'password' => ['required', 'min:5']
        ]);
        //смена хэша пользователя если нужно и если мы обновили хэш функцию
        if (Auth::attempt($data)) {
            if(Hash::needsRehash(Auth::user()->getAuthPassword())){
                $hash = Hash::make(Auth::user()->getAuthPassword());
                Auth::user()->update(['password' => $hash]);
            }
            return new RedirectResponse('/login');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);

    }


    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return new RedirectResponse('/');
    }

}
