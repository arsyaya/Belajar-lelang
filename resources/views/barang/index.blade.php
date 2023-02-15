@extends('template.master')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LelanginAja | Lelang</title>
</head>
<body>
    @section('title')
    <h1>Mari Lelang</h1>
    @endsection
    
@section('content')
<div class="card">
    <div class="card-header">
    <a class="btn btn-primary" href="{{ route('barang.create')}}">
        <i class="fas fa-plus"></i>
         Tambah Barang
    </a>
    </div>

<div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>    
                <th>Foto</th>          
                <th>Harga Awal</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $barang)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $barang->nama_barang }}</td> 
                <td>
                    @if($barang->image)
                        <img src="{{ asset('storage/' . $barang->image)}}" alt="{{ $barang->nama_barang }}" class="img-fluid mt-3" width="75">
                    @endif
                </td>              
                <td>{{ $barang->harga_awal }}</td>
                <td>{{ \Carbon\Carbon::parse($barang->tgl)->format('j-F-Y') }}</td>
                <td>
                    <form action="{{ route('barang.destroy', [$barang->id]) }}" method="post">
                        <a class="btn btn-info mr-3" href="{{ route('barang.show', $barang->id) }}">Detail</a>
                        <a class="btn btn-warning mr-3" href="{{ route('barang.edit', $barang->id) }}">Edit</a>
                        @csrf
                        @method ('DELETE')
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</body>
</html>