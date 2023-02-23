@extends('template.master')

@section('atas', 'LelanginAja | Data Lelang' )

@section('content')
<div class="card">
@if(auth()->user()->level == 'petugas')
<div class="card-header">
    <a class="btn btn-primary" href="{{ route('lelang.create')}}">
        <i class="fas fa-plus"></i>
         Tambah Lelang
    </a>
    </div>
@endif
<table class="table table-striped" style="width: 100%" id="table1">
<thead>
    <tr>
     <th>No</th>
     <th>Nama Barang</th>
     <th>Harga Awal</th>
     <th>Tanggal Lelang</th>
     <th>Status</th>
     <th></th>
    </tr>
</thead>
<tbody>
    @forelse ($lelangs as $lelang)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ Str::of($lelang->barang->nama_barang)->title() }}</td>
        <td>@currency($lelang->barang->harga_awal)</td>
        <td>{{ \Carbon\Carbon::parse($lelang->tanggal)->format('j-F-Y') }}</td>
        <td>
            <span class="badge {{ $lelang->status == 'ditutup' ? 'bg-danger' : 'bg-success' }}">{{ Str::title($lelang->status) }}</span>
        </td>
        <td>
            <div class="d-flex flex-nowrap flex-column flex-md-row justify-center">
                <form action="{{ route('lelang.destroy', $lelang->id) }}" method="POST">
                    <a href="{{ route('lelang.show', $lelang->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                     <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('lelang.edit', $lelang->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                     <i class="fas fa-edit"></i>
                    </a>
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
             <i class="fas fa-trash"></i>
            </button>
                </form>
            </div>
        </td>
    </tr>
    @empty
     <tr>
         <td colspan="5" style="text-align: center" class="text-danger">Data lelang Kosong</td>
     </tr>
    @endforelse

 </tbody>   
</table>

@endsection