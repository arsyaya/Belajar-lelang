<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah</title>
</head>
<body>
   <h1>Ubah Data Lelang</h1> 
   <form action="{{ route('barang.update', [$barangs->id] ) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
      <label for="inputnama">Nama Barang</label>
      <input type="text" name="nama_barang" value="{{ $barangs->nama_barang }}">
    </div>
      <div>
        <label for="inputdate">Tanggal</label>
        <input type="text" name="tgl" value="{{ $barangs->tgl }}">
      </div>
          <div>
            <label for="inputharga">Harga Awal</label>
            <input type="text" name="harga_awal" value="{{ $barangs->harga_awal }}">
          </div>
            <div>
              <label for="inputdesk">Deskripsi</label>
              <input type="text" name="deskripsi_barang" value="{{ $barangs->deskripsi_barang }}">
            </div>
    <input class="btn btn-primary" type="submit" value="Update">
  </form>
</body>
</html>