@extends('template.master')
@section('atas', 'LelanginAja | History')

@section('content')
<div class="card">
    <table class="table table-striped" style="width: 100%" id="table1">
        <thead>
            <tr>
             <th>No</th>
             <th>Nama Barang</th>
             <th>Harga Awal</th>
             <th>Tanggal Lelang</th>
             <th>Status</th>
             <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lelangs as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ Str::of($item->barang->nama_barang)->title() }}</td>
                <td>@currency($item->barang->harga_awal)</td>
                <td>{{ \Carbon\Carbon::parse($item->barang->tanggal)->format('j-F-Y') }}</td>
                <td>
                    <span class="badge {{ $item->status == 'tutup' ? 'bg-danger' : 'bg-success' }}">{{ Str::title($item->status) }}</span>
                </td>
                <td>
                    <div class="d-flex flex-nowrap flex-column flex-md-row justify-center">
                        <form action="#" method="POST">
                            <a href="{{ route('bidmas', $item->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                <i class="fas fa-eye"></i>
                                History
                            </a>
                            {{-- <a href="{{ route('lelang.edit', $lelang->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                             <i class="fas fa-edit"></i>
                            </a> --}}
                        {{-- @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                     <i class="fas fa-trash"></i>
                    </button> --}}
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

</div>

@endsection
