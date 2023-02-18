@extends('template.master')
@section('atas', 'LelanginAja | Buat')


  @section('content')
  <div class="card card-primary">
    <div class="card-header">
    <h4>Pilih Lelang</h4>
    </div>

    <form action="{{ route('barang.store') }}" method="post" class="mb-5" enctype="multipart/form-data">
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
    <div class="form-group">
      <label for="image" class="form-label">Masukkan Foto/Gambar</label>
      <img class="img-preview img-fluid mb-3 col-sm-5">
      <input class="form-control" @error('image') is-invalid @enderror type="file" id="image"
       name="image" onchange="previewImage()">
      @error('image')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
    </div>
     <!-- <div class="form-group">
        <label for="inputdesk">Deskripsi</label>
        <input type="text" name="deskripsi_barang" class="fom-control" id="inputdesk" placeholder="Deskripsi">
    </div> -->
    <div class="form-group">
                    <label for="inputdesk">Deskripsi</label><br>
                    <textarea class="form-control" name="deskripsi_barang" id="inputdesk" cols="160" rows="6" placeholder="Masukkan keterangan deskripsi barang"></textarea>
                    <!-- <input type="text" name="deskripsi_barang" class="form-control" id="inputdesk" placeholder="Deskripsi barang"> -->
                  </div>

    <!-- <div class="card-footer"> -->
    <div class="row">
    <div class="col-11 d-flex justify-content-start">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <!-- </div> -->
     <a class="btn btn-warning" href="{{ route('barang.index') }}">Kembali</a>
     
    </div>
  </form>
  </div>

  <script>

    function previewImage (){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');


      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);


      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
    
  </script>
  @endsection