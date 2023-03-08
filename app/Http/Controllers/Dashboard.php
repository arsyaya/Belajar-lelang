<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    //
    public function admin()
    {
        $barangs = DB::table('barangs')->count();
        $lelangs = DB::table('lelangs')->count();
        $users = DB::table('users')->where('level', 'petugas')->count();
        return view ('dashboard.admin')->with(['totalbarang' => $barangs, 'totallelang' => $lelangs, 'totaluser' => $users]);
    }

    public function petugas()
    {
        $barangs = DB::table('barangs')->count();
        $lelangs = DB::table('lelangs')->count();
        $users = DB::table('users')->where('level', 'masyarakat')->count();
        return view ('dashboard.petugas')->with(['totalbarang' => $barangs, 'totallelang' => $lelangs, 'totaluser' => $users]);
    }

    public function masyarakat()
    {
        $lelangs = Lelang::all();
        $lelangsss = DB::table('lelangs')->count();
        return view ('dashboard.masyarakat', compact('lelangs'))->with(['totallelang' => $lelangsss]);
    }
}

