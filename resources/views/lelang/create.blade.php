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
<form action="#" method="post">
    @csrf
    <div class="row">
    <div class="col-6">
      <div class="form-group">
        <label for="barangs_id" class="form-label">{{ __('Nama Barang') }}</label>
        <select class="form-select form-control @error('barangs_id') is-invalid @enderror" name="barangs_id" id="barangs_id" data-parsley-required="true">
            <option value="" disabled>Pilih Barang</option>
            @forelse ($barangs as $item)
              <option value="{{ $item->id }}">{{ Str::of($item->nama_barang)->title() }} -  @currency($item->harga_awal)</option>
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


 </form>
</div>
@endsection

</body>
</html>
