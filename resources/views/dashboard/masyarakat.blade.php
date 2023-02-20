@extends('template.master')
@section('atas', 'LelanginAja | Dashboard')

@section('title')
@section('otoritas', 'Masyarakat')
<h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif;">Selamat Datang biders!</h1>
@endsection

@section('content')
<div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $totallelang }}</h3>
              <p>Barang Yang Dilelang</p>
            </div>
            <div class="icon">
              <i class="nav-icon fa fas fa-gavel"></i>
            </div>
            <a href="{{ route('listlelang.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
</div>
@endsection