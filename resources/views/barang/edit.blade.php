@extends('template.master')
@section('atas', 'LelanginAja | Edit')

  @section('title')
   <h1>Ubah Data Lelang</h1> 
   @endsection

   @section('content')
   <form action="{{ route('barang.update', [$barangs->id] ) }}" method="POST" enctype="multipart/form-data">
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
              @if($barangs->image)
              <img src="{{ asset('storage/' . $barangs->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
              @else
              <img class="img-preview img-fluid mb-3 col-sm-5">
              @endif
              <input class="form-control" @error('image') is-invalid @enderror type="file" id="image"
               name="image" onchange="previewImage()">
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

    <div class="row">
      <div class="col-11 d-flex justify-content-start">
    <input class="btn btn-primary" type="submit" value="Update">
      </div>
      <a class="btn btn-warning" href="{{ route('barang.index') }}">Kembali</a>
    </div>
  </form>

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
