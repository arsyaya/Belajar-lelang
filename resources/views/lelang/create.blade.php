@extends('template.master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LelanginAja | Buat</title>
</head>
<body>

@section('title')
<h1>Lelang</h1>
@endsection

@section('content')
<div class="card-body">
<form action="{{ route('lelang.store') }}" method="post">
    @csrf
    <div class="row">
    <div class="col-6">
      <div class="form-group">
        <label for="barangs_id" class="form-label">{{ __('Nama Barang') }}</label>
        <select class="form-select form-control @error('barangs_id') is-invalid @enderror" name="barangs_id" id="barangs_id" data-parsley-required="true">
            <option value="" disabled>Pilih Barang</option>
            @forelse ($barangs as $item)
              <option value="{{ $item->id }}">{{ Str::of($item->nama_barang)->title() }} - {{ ($item->harga_awal) }}</option>
            @empty
              <option value="" disabled>Barang Semuanya Sudah Di Lelang</option>
            @endforelse
        </select>
      </div>
      @error('barangs_id')
        <div class="aler alert-danger" role="alert">{{ $message }}</div>
      @enderror
      </div>
    </div>
    <div class="row">
          <div class="col-md-6 col-12">
              <div class="form-group">
                   <label for="tanggal" class="form-label">Tanggal Lelang</label>
                    <input type="date" id="tanggal_lelang" class="form-control @error('tanggal_lelang') is-invalid @enderror" name="tanggal_lelang" data-parsley-required="true" value="{{ old('tanggal_lelang') }}">
                  </div>
                @error('tanggal_lelang')
                  <div class="alert alert-danger" role="alert">{{ $message }}</div>
                 @enderror
              </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="harga_akhir" class="form-label">Harga Akhir</label>
                <input type="text" id="harga_akhir"  class="form-control @error('harga_akhir') is-invalid @enderror" placeholder="Input Harga, Hanya Angka" name="harga_akhir" data-parsley-required="true" value="{{ old('harga_akhir') }}">
              </div>
              @error('harga_akhir')
                  <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="row">
              <div class="col-6 d-flex justify-content-start">
                <a href="{{ route('lelang.index') }}" class="btn btn-warning me-1 mb-1">
                Kembali
                </a>
              </div>
              <div class="col-6 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">
                    Submit
                </button>
                  <!-- <button type="reset" class="btn btn-outline-danger me-1 mb-1">
                      Reset
                  </button> -->
              </div>
                </div>
    </form>
    </div>
    @endsection

    </body>
    </html>
