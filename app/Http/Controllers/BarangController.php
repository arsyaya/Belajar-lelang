<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barangs = barang::all();
        return view('barang.index', compact('barangs'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barang.create');
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
            'nama_barang' => 'required',
            'tgl' => 'required',
            'harga_awal' => 'required',
            'deskripsi_barang' => 'required'
        ]);
        barang::create([
            'nama_barang' => $request->nama_barang,
            'tgl' => $request->tgl,
            'harga_awal' => $request->harga_awal,
            'deskripsi_barang' => $request->deskripsi_barang
        ]);
        return redirect('/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
        $barangs = barang::find($barang->id);
        return view('barang.show', compact('barangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
        $barangs = barang::find($barang->id);
        return view('barang.edit', compact('barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        //
        $request->validate([
            'nama_barang' => 'required',
            'tgl' => 'required',
            'harga_awal' => 'required',
            'deskripsi_barang' => 'required'
        ]);
        $barangs = barang::find($barang->id);
        $barangs->nama_barang = $request->nama_barang;
        $barangs->tgl = $request->tgl;
        $barangs->harga_awal = $request->harga_awal;
        $barangs->deskripsi_barang = $request->deskripsi_barang;
        $barangs->update();
        
        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
        $barangs = barang::find($barang->id);
        $barangs->delete();

        return redirect('/barang');
    }
}
