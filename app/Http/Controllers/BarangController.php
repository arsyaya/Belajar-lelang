<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnValueMap;

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
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'tgl' => 'required',
            'harga_awal' => 'required',
            'image' => 'image|file',
            'deskripsi_barang' => 'required'
        ]);

        
            if($request->file('image')) {
                $validatedData['image'] = $request->file('image')->store('barang-images');
            }

            barang::create($validatedData);
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
            'image' => 'image|file',
            'deskripsi_barang' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('barang-images');
        }

        // $barangs = barang::find($barang->id);
        // $barangs->nama_barang = $request->nama_barang;
        // $barangs->tgl = $request->tgl;
        // $barangs->harga_awal = $request->harga_awal;
        // $barangs->image = $request->image;
        // $barangs->deskripsi_barang = $request->deskripsi_barang;
        // $barangs->update();
        Barang::where('id', $barang->id)
               ->update($validatedData);
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
