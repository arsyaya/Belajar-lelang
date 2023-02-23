@extends('template.master')
@section('atas', 'LelanginAja | Detail Lelang')

@section('content')
<div class="card card-primary card-outline">
        <div class="card-body box-profile">
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
    <div class="row">
        <div class="col-md-6 col-12">
          <div class="form-group">
            <label for="barangs_id" class="form-label">{{ __('Nama Barang') }}</label>
            <select class="form-select form-control @error('barangs_id') is-invalid @enderror" name="barangs_id" id="barangs_id" data-parsley-required="true" disabled>
                <option value="" disabled>Pilih Barang</option>
            
                  <option value="{{ $lelangs->id }}">{{ Str::of($lelangs->barang->nama_barang)->title() }} - {{ ($lelangs->barang->harga_awal) }}</option>
              
                  <option value="" disabled>Barang Semuanya Sudah Di Lelang</option>
                
            </select>
          </div>
          @error('barangs_id')
            <div class="aler alert-danger" role="alert">{{ $message }}</div>
          @enderror
          </div>
                  <div class="form-group">
                      <label for="tanggal" class="form-label">Tanggal Lelang</label>
                        <input type="date" id="tanggal_lelang" class="form-control @error('tanggal_lelang') is-invalid @enderror" name="tanggal_lelang" data-parsley-required="true" value="{{ $lelangs->tanggal_lelang }}" disabled>
                      </div>
                    @error('tanggal_lelang')
                      <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                  </div>
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="harga_akhir" class="form-label">Harga Akhir</label>
                    <input type="text" id="harga_akhir"  class="form-control @error('harga_akhir') is-invalid @enderror" placeholder="Input Harga, Hanya Angka" name="harga_akhir" data-parsley-required="true" value="@currency($lelangs->harga_akhir)" disabled>
                  </div>
                  @error('harga_akhir')
                      <div class="alert alert-danger" role="alert">{{ $message }}</div>
                  @enderror
                </div>
                  <div class="col-12 d-flex justify-content-start">
                    <a href="{{ route('lelang.index') }}" class="btn btn-warning me-1 mb-1">
                    Kembali
                    </a>
                  </div>
        </div>
    @endsection