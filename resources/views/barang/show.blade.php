@extends('template.master')
@section('atas', 'LelanginAja | Detail')

    @section('title')
    <h1>Detail barang</h1>
    @endsection
    @section('content')
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
        @if( $barangs->image )
                <div class="form-group">
                 <label>Gambar Barang</label>
                 <br>
                    <img src="{{ asset('storage/' . $barangs->image)}}" alt="{{ $barangs->nama_barang }}" class="img-fluid mt-3" width="20%">
                </div>
             @else

             @endif
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputnama">Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" id="inputnama" value="{{ $barangs->nama_barang }}" disabled>
    </div>
        <div class="form-group">
            <label for="inputdate">Tanggal</label>
            <input type="text" name="tgl" class="form-control" id="inputdate" value="{{ $barangs->tgl }}" disabled>
        </div>
            <div class="form-group">
                <label for="inputharga">Harga Awal</label>
                <input type="text" name="harga_awal" class="form-control" id="inputharga" value="@currency($barangs->harga_awal)" disabled>
            </div>
                <div class="form-group">
                    <label for="inputdesk">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi_barang" id="inputdesk" cols="160" rows="6" disabled>{{ $barangs->deskripsi_barang }}</textarea>
                </div>
             
    <!-- {{-- <a href="/barang">Kembali</a> --}} -->
    <!-- <div class="card-footer"> -->
     <a class="btn btn-primary" href="{{ route('barang.index') }}">Kembali</a>
     @endsection
