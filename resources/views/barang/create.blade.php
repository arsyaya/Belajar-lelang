@extends('template.master')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat</title>
</head>
<body>
  <div class="card card-primary">
    <div class="card-header">
      @section('title')
      <h1>Pilih Lelang</h1>
      @endsection
    </div>
  @section('content')
    <form action="{{ route('barang.store') }}" method="post">
    @csrf

    <div class="card-body">
      <div class="form-group">
                    <label for="inputnama">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" id="inputnama" placeholder="Masukkan nama barang">
                  </div>
      <!-- <div class="form-group">
          <label for="inputdate">Tanggal</label>
          <input type="date" name="tgl" class="fom-control" id="inputdate" placeholder="Tanggal">
      </div> -->
      <div class="form-group">
        <div class="row">
        <div class="col-6">
                    <label for="inputdate">Tanggal</label>
                    <input type="date" name="tgl" class="form-control" id="inputdate" placeholder="Tanggal">
                  </div>
        </div>
      </div>
      <!-- <div class="form-group">
          <label for="inputharga">Harga Awal</label>
          <input type="text" name="harga_awal" class="fom-control" id="inputharga" placeholder="Input Harga Awal">
     </div> -->
     <div class="form-group">
                    <label for="inputharga">Harga Awal</label>
                    <input type="text" name="harga_awal" class="form-control" id="inputharga" placeholder="Masukkan harga awal">
                  </div>
     <!-- <div class="form-group">
        <label for="inputdesk">Deskripsi</label>
        <input type="text" name="deskripsi_barang" class="fom-control" id="inputdesk" placeholder="Deskripsi">
    </div> -->
    <div class="form-group">
                    <label for="inputdesk">Deskripsi</label>
                    <input type="text" name="deskripsi_barang" class="form-control" id="inputdesk" placeholder="Deskripsi barang">
                  </div>

    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
  </form>
  </div>
  @endsection
</body>
</html>