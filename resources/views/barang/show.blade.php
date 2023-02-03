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
    @section('content')
    <h1>Detail barang</h1>
    <div>
        <label for="inputnama">Nama Barang</label>
        <input type="text" name="nama_barang" value="{{ $barangs->nama_barang }}" disabled>
    </div>
        <div>
            <label for="inputdate">Tanggal</label>
            <input type="text" name="tgl" value="{{ $barangs->tgl }}" disabled>
        </div>
            <div>
                <label for="inputharga">Harga Awal</label>
                <input type="text" name="harga_awal" value="{{ $barangs->harga_awal }}" disabled>
            </div>
                <div>
                    <label for="inputdesk">Deskripsi</label>
                    <input type="text" name="deskripsi_barang" value="{{ $barangs->deskripsi_barang }}" disabled>
                </div>
    <!-- {{-- <a href="/barang">Kembali</a> --}} -->
     <a href="{{ route('barang.index') }}">Kembali</a>
     @endsection
</body>
</html>