<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lelang</title>
</head>
<body>
    <h1>Mari Lelang</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Tanggal</th>
                <th>Harga Awal</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $barang)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->tgl }}</td>
                <td>{{ $barang->harga_awal }}</td>
                <td>{{ $barang->deskripsi_barang }}</td>
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
    
</body>
</html>