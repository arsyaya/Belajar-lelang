<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function view()
    {
        return view('auth.login');
    }

    public function proses(Request $request)
    {
        $user =$request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

            if (Auth::attempt($user))
            {
                $request->session()->regenerate();
                $user = Auth::user();

                if ($user->level == 'admin')
                {
                    return redirect()->route('dashboard.admin');
                } else if ($user->level == 'petugas')
                {
                    return redirect()->route('dashboard.petugas');
                } else {
                    return redirect()->route('login');
                }
            }

            return back()->withErrors([
                'username' => 'The provided.',
            ])->onlyInput('username');
        } 
            public function logout(Request $request)
            {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerate();
                return redirect('/login');
            } 
    }

