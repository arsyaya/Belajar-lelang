<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function welcome()
    {
        //
        $users = User::all();
        return view('welcome', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
            'tlp' => 'required'
        ]);

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request['password']),
            'level' => $request->level,
            'tlp' => $request->tlp
        ]);

        // $data = $request()->validate([
        //     'nama' => 'required',
        //     'username' => 'required',
        //     'password' => 'required',
        //     'level' => 'required',
        //     'tlp' => 'required',
        // ]);

        // User::create([
        //     'nama' => ($data['name']),
        //     'username' => ($data['username']),
        //     'password' => bcrypt($data['password']),
        //     'level' => ($data['level']),
        //     'tlp' => ($data['tlp']),
        // ]);

        // User::create([
        //     'nama'     => Str::camel($data['nama']),
        //     'username' => Str::lower($data['username']),
        // ]);

        return redirect ('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $users = User::find($user->id);
        return view('user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'level' => 'required',
            'tlp' => 'required'
        ]);

        $users = User::find($user->id);
        $users->nama = $request->nama;
        $users->username = $request->username;
        $users->level = $request->level;
        $users->tlp = $request->tlp;
        $users->update(); 
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $users = User::find($user->id);
        $users->delete();
        return redirect('users');
    }
}
