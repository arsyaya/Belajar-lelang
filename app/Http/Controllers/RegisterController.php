<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    //
    public function register()
    {
        return view('auth.register');
    }

    public function proses(Request $request)
    {
        // dd($request->all());
        $data = request()->validate([
            'nama' => 'required|min:3|max:25',
            'username' => 'required|unique:users,username',
            'tlp' => 'required|numeric',
            'password' => 'required|min:8',
        ],
        [
            'nama.required' => 'Username tidak boleh kosong',
            'nama.min' => 'Username minimal 3 karakter',
            'nama.max' => 'Nama maksimal 25 karakter',
            'username.required' => 'Username tidak boleh kosong',
            'username.min' => 'Username minimal 3 karakter',
            'username.unique' => 'Username sudah terdaftar',
            'tlp.required' => 'Telepon tidak boleh kosong',
            'tlp.numeric' => 'Telepon harus berupa angka',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        User::create([
            'nama'     => Str::camel($data['nama']),
            'username' => Str::lower($data['username']),
            'level'    => 'masyarakat',
            'tlp'      => $data['tlp'],
            'password' => bcrypt($data['password']),
        ]);
        return redirect('/login');
    }
}
