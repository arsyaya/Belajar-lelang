@extends('template.master')
@section('atas', 'LelanginAja | Dashboard')

@section('content')


<section class="content">

    <div class="row">
    @foreach($lelangs as $item)
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <span class="mb-2 badge {{ $item->status == 'tutup' ? 'bg-danger' : 'bg-success' }}">{{ Str::title($item->status) }}</span>
              @if($item->barang->image)
              <div class="text-center">
                  <img src="{{ asset('storage/' . $item->barang->image)}}"
                  alt="{{ $item->barang->nama_barang }}"
                  class="img-fluid mt-0">
                </div>
                @else

                @endif
                <h3 class="profile-username text-center">{{ Str::of($item->barang->nama_barang)->title() }}</h3>

              <h5 class="text-muted text-center">@currency($item->barang->harga_awal)</h5>

              <a href="{{ route('listlelang.penawaran', $item->id) }}" class="btn btn-success btn-block"><b>Mulai Bid</b></a>
            </div>
            <!-- /.card-body -->
         </div>

    </div>
    @endforeach
</div>

</section>

@endsection
