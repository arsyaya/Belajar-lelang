<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\Barang;
use App\Models\HistoryLelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lelangs = Lelang::select('id', 'barangs_id', 'tanggal_lelang', 'harga_akhir', 'status')
        ->where('status', 'dibuka')->get();
        // dd(Auth::user()->id);
        return view('lelang.index', compact('lelangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barangs = Barang::select('id', 'nama_barang', 'harga_awal')
            ->whereNotIn('id', function($query)
            {
                $query->select('barangs_id')->from('lelangs');
            }
        )->get();
        return view('lelang.create', compact('barangs'));
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
        $request->validate(
            [
                'barangs_id'         => 'required|exists:barangs,id|unique:lelangs,barangs_id',
                'tanggal_lelang'    => 'required|date',
                'harga_akhir'       => 'required|numeric',
            ],
            [
                'barangs_id.required'        => 'Barang Harus Diisi',
                'barangs_id.exists'          => 'Barang Tidak Ada Pada Data Barang',
                'barangs_id.unique'          => 'Barang Sudah Di Lelang',
                'tanggal_lelang.required'   => 'Tanggal Lelang Harus Diisi',
                'tanggal_lelang.date'       => 'Tanggal Lelang Harus Berupa Tanggal',
                'harga_akhir.required'      => 'Harga Akhir Harus Diisi',
                'harga_akhir.numeric'       => 'Harga Akhir Harus Berupa Angka',
            ]
        );
        $lelang = new Lelang;
        $lelang->barangs_id = $request->barangs_id;
        $lelang->tanggal_lelang = $request->tanggal_lelang;
        $lelang->harga_akhir = $request->harga_akhir;
        $lelang->pemenang = 'Belum ada';
        $lelang->users_id = Auth::user()->id;

        $lelang->status = 'dibuka';
        $lelang->save();

        return redirect()->route('lelang.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function show(Lelang $lelang)
    {
        //
        $lelangs = lelang::find($lelang->id);
        return view('lelang.show', compact('lelangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function edit(Lelang $lelang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lelang $lelang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lelang $lelang)
    {
        //
        $lelangs = Lelang::find($lelang->id);
        $lelangs->delete();

        return redirect('/lelang')->with('success', 'Berhasil Dihapus');
    }

    /** METHOD UNTUK LEVEL MASYARAKAT */
}
