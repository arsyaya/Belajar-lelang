@extends('template.master')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LelanginAja | Ubah</title>
</head>
<body>
  @section('title')
   <h1>Ubah Data Lelang</h1> 
   @endsection

   @section('content')
   <form action="{{ route('barang.update', [$barangs->id] ) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="inputnama">Nama Barang</label>
      <input type="text" name="nama_barang" class="form-control" value="{{ $barangs->nama_barang }}">
    </div>
      <div class="form-group">
        <label for="inputdate">Tanggal</label>
        <input type="date" name="tgl" class="form-control" value="{{ $barangs->tgl }}">
      </div>
          <div class="form-group">
            <label for="inputharga">Harga Awal</label>
            <input type="text" name="harga_awal" class="form-control" value="{{ $barangs->harga_awal }}">
          </div>
          <div class="form-group">
              <label for="image" class="form-label">Masukkan Foto/Gambar</label>
              <input class="form-control" @error('image') is-invalid @enderror type="file" id="image" name="image">
              @error('image')
          <div class="invalid-feedback">
          {{ $message }}
          </div>
          @enderror
        </div>
            <div class="form-group">
              <label for="inputdesk">Deskripsi</label>
              <textarea class="form-control" name="deskripsi_barang" id="inputdesk" cols="160" rows="6">{{ $barangs->deskripsi_barang }}</textarea>
            </div>
    <input class="btn btn-primary" type="submit" value="Update">
  </form>
  @endsection
</body>
</html>