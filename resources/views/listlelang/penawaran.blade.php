@extends('template.master')
@section('atas', 'LelanginAja | Detail')

    @section('title')
    <h1>Detail barang</h1>
    @endsection
    @section('content')
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            @if(!empty($lelangs))
        <form class="form" method="POST" action="#" data-parsley-validate>
          @csrf
            @if( $lelangs->barang->image )
                    <div class="form-group">
                    <label>Gambar Barang</label>
                    <br>
                        <img src="{{ asset('storage/' . $lelangs->barang->image)}}" alt="{{ $lelangs->barang->nama_barang }}" class="img-fluid mt-3" width="20%">
                    </div>
            @else

            @endif
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputnama">Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" id="inputnama" value="{{ $lelangs->barang->nama_barang }}" disabled>
    </div>
        <div class="form-group">
            <label for="inputdate">Tanggal</label>
            <input type="text" name="tgl" class="form-control" id="inputdate" value="{{ $lelangs->barang->tgl }}" disabled>
        </div>
            <div class="form-group">
                <label for="inputharga">Harga Awal</label>
                <input type="text" name="harga_awal" class="form-control" id="inputharga" value="@currency($lelangs->barang->harga_awal)" disabled>
            </div>
                <div class="form-group">
                    <label for="inputdesk">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi_barang" id="inputdesk" cols="160" rows="6" disabled>{{ $lelangs->barang->deskripsi_barang }}</textarea>
                </div>
                    <div class="form-group">
                        <div class="col-4">
                        <label for="inputhargap">Bid</label>
                        <input type="text" name="harga_penawaran" class="form-control" placeholder="Masukkan Penawaran Bid">
                        </div>
                    </div>
            @endif
             
    <!-- {{-- <a href="/barang">Kembali</a> --}} -->
    <!-- <div class="card-footer"> -->
    <button type="submit" class="btn btn-success">Tawar</button>
     <a class="btn btn-primary" href="{{ route('listlelang.index') }}">Kembali</a>
     @endsection
