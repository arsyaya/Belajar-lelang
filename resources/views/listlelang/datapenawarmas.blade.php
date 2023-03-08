@extends('template.master')
@section('atas', 'LelanginAja | History')

@section('content')
<section class="content">
    <div class="card-body p-0">
        <table class="table table-hover">
            <thead>
                <tbody>
                    <tr>
                        <th>No</th>
                        <th>Nama Penawar</th>
                        <th>Nama Barang</th>
                        <th>Harga Lelang</th>
                        <th>Tanggal Lelang</th>
                        <th>Status</th>
                        @if(auth()->user()->level == 'petugas')
                        <th></th>
                        @else
                        @endif
                        @if(auth()->user()->level == 'admin')
                        <th></th>
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
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('J-F-Y') }}</td>
                    <td>
                        <span class="badge {{ $item->status == 'pending' ? 'bg-warning' : 'bg-success' }}">{{ Str::title($item->status) }}</span>
                    </td>
                    @if(auth()->user()->level == 'admin')
                    <td>
                        <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-eye"></i>
                        Detail
                        </a>
                    </td>
                    @endif
                    @if(auth()->user()->level == 'petugas')
                    <td>
                        <form action="/datapenawar/{lelang}" method="POST">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-eye"></i>
                                Detail
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Edit
                            </a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit" value="Delete">
                                <i class="fas fa-trash"></i>
                                Delete
                            </button>
                        </form>
                    </td>
                    @else
                    @endif
                </tr>
                @empty
                <tr>
                    <td>Data masih kosong</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</section>
@endsection
