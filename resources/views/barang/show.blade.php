@extends('template.master')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>
<body>
    @section('title')
    <h1>Detail barang</h1>
    @endsection
    @section('content')
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
                <input type="text" name="harga_awal" class="form-control" id="inputharga" value="{{ $barangs->harga_awal }}" disabled>
            </div>
                <div class="form-group">
                    <label for="inputdesk">Deskripsi</label>
                    <input type="text" name="deskripsi_barang" class="form-control" id="inputdesk" value="{{ $barangs->deskripsi_barang }}" disabled>
                </div>
    <!-- {{-- <a href="/barang">Kembali</a> --}} -->
    <div class="card-footer">
     <a class="btn btn-primary" href="{{ route('barang.index') }}">Kembali</a>
     @endsection
</body>
</html>