@extends('template.master')
@section('atas', 'LelanginAja | Data Bid')

@section('content')
<div class="card-header">
    {{-- <strong>Data Pelelangan {{ $lelangs->barang->nama_barang }}</strong> --}}
<div class="card-body p-4">
<table class="table table-bordered table-hover">
        <thead>
            <tbody>
                <tr>
                    <th>No</th>
                    <th>Pelelang</th>
                    <th>Nama Barang</th>
                    <th>Harga Penawaran</th>
                    <th>Tanggal Penawaran</th>
                    <th>Status</th>

                    @if(auth()->user()->level == 'petugas')
                    <th>Action</th>
                    @else
                    @endif
                    @if(auth()->user()->level == 'admin')
                    {{-- <th>Action</th> --}}
                    @else
                    @endif

                </tr>
            </tbody>
        </thead>
        @forelse ($historyLelangs as $item)
        <tbody>
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->user->nama }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>@currency($item->harga)</td>
            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
            <td>
                <span class="badge {{ $item->status == 'pending' ? 'bg-warning' : 'bg-success' }}">{{ Str::title($item->status) }}</span>
            </td>

            @if (auth()->user()->level == 'admin')
            {{-- <td>
            <a class="btn btn-primary btn-sm" href="{{ route('bidmas', $item->id)}}">
                <i class="fas fa-eye">
                </i>
                Detail
            </a>
            </td> --}}
            @endif
            @if (auth()->user()->level == 'petugas')
            <td>
            <form action="{{ route('setpemenang', $item->id) }}"method="POST">
                @csrf
                @method('PUT')
            <button class="btn btn-success btn-sm" type="submit">
            <i class="fas fa-crown">
            </i>
            Pick Winner
            </button>
        </form>
        </td>
        @else
        @endif
        </tr>
        @empty
        <tr>
        <td colspan="5" style="text-align: center" class="text-danger"><strong>Data masih kosong</strong></td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>

@endsection
