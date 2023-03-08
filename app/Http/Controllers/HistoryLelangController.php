<?php

namespace App\Http\Controllers;

use App\Models\HistoryLelang;
use App\Models\User;
use App\Models\Lelang;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HistoryLelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $historyLelangs = HistoryLelang::all();
        $historyLelangs = HistoryLelang::orderBy('harga', 'desc')->get();
        $lelangs = Lelang::all();
        return view('listlelang.datapenawar', compact('historyLelangs', 'lelangs'));
    }

    public function bidmas(Lelang $lelang)
    {
        $historyLelangs = HistoryLelang::orderBy('harga', 'desc')->get()->where('lelang_id', $lelang->id);
        $lelangs = Lelang::all();
        return view('listlelang.bidmas', compact('historyLelangs', 'lelangs'));
    }

    public function setpemenang(Lelang $lelang, $id)
    {
        $historyLelang = HistoryLelang::findOrfail($id);
        $historyLelang->status = 'pemenang';
        $historyLelang->save;

        $lelang = $historyLelang->lelang;
        $lelang->status = 'ditutup';
        $lelang->pemenang = $historyLelang->user->name;
        $lelang->harga_akhir = $historyLelang->harga;
        $lelang->save;

        return redirect()->back()->with('succes', 'Pemenang berhasil dipilih');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(HistoryLelang $historyLelang, Lelang $lelang)
    {
        //
        $lelangs = Lelang::find($lelang->id);
        $historyLelangs = HistoryLelang::orderBy('harga', 'desc')->get()->where('lelang_id', $lelang->id);
        return view('listlelang.penawaran', compact('lelangs', 'historyLelangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Lelang $lelang, Barang $barang)
    {
        //
        $request->validate([
            'harga'   => 'required|numeric'
        ],[
            'harga.required'  => "Harus Diisi",
            'harga.numeric'  => "Harus Angka",
        ]);

        $historyLelang = new Historylelang();
        $historyLelang->nama_barang = $lelang->barang->nama_barang;
        $historyLelang->lelang_id = $lelang->id;
        $historyLelang->users_id = Auth::user()->id;
        $historyLelang->harga = $request->harga;
        $historyLelang->status = 'pending';
        $historyLelang->save();

        return redirect()->route('listlelang.index', $lelang->id)->with('succes', 'Berhasil bid barang ini');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoryLelang  $historyLelang
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryLelang $historyLelang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoryLelang  $historyLelang
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryLelang $historyLelang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoryLelang  $historyLelang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoryLelang $historyLelang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoryLelang  $historyLelang
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoryLelang $historyLelang)
    {
        //
        $historyLelang->delete();
        return redirect()->route('listlelang.datapenawar');
    }
}
