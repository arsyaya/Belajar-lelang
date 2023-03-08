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
        @foreach($lelangs as $item)
            @if($item->pemenang == Auth::user()->nama)
                <!-- Modal notifikasi pop up -->
                <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="notificationModalLabel">Selamat, Anda Terpilih Menjadi Pemenang!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Anda telah terpilih sebagai pemenang lelang barang dengan nama <strong>{{ $item->barang->nama_barang }}</strong>. Mohon segera menghubungi panitia lelang untuk informasi lebih lanjut mengenai pengambilan barang.</p>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button> --}}
                        <a href="{{route('listlelang.penawaran', $item->id )}}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                    </div>
                </div>
                </div>
            @endif
            @endforeach
    </div>
@endsection

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#notificationModal').modal('show');
    });
    </script>
