@extends('template.master')
@section('atas', 'LelanginAja | Bid')

@section('title')
<h1>Detail barang</h1>
@endsection
@section('content')
<div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#detail" data-toggle="tab">Detail</a></li>
                  <li class="nav-item"><a class="nav-link" href="#bid" data-toggle="tab">Penawaran</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="detail">
                    <div class="card-body">
                    <div class="tab-content">
                        @if(!empty($lelangs))
                        <form action="{{ route('listlelang.store', $lelangs->id) }}" method="POST"  data-parsley-validate>
                            @csrf
                        @if( $lelangs->barang->image )
                                <div class="form-group">
                                <label>Gambar Barang</label>
                                <br>
                                    <img src="{{ asset('storage/' . $lelangs->barang->image)}}" alt="{{ $lelangs->barang->nama_barang }}" class="img-fluid mt-3" width="30%">
                                </div>
                        @else

                        @endif
                    <div class="form-group">
                        <label for="inputnama">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" id="inputnama" value="{{ $lelangs->barang->nama_barang }}" disabled>
                    </div>
                        <div class="form-group">
                            <label for="inputdate">Tanggal</label>
                            <input type="text" name="tgl" class="form-control" id="inputdate" value="{{ $lelangs->barang->tgl }}" disabled>
                        </div>
                            <div class="form-group">
                                <label for="inputharga">Harga Awal</label>
                                <input type="text" name="harga_awal" class="form-control" id="inputharga" value="@currency($lelangs->barang->harga_awal)" disabled>
                            </div>
                                <div class="form-group">
                                    <label for="inputdesk">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi_barang" id="inputdesk" cols="160" rows="6" disabled>{{ $lelangs->barang->deskripsi_barang }}</textarea>
                                </div>
                                    <div class="form-group">
                                        <div class="col-4">
                                        <label for="inputhargap">Bid</label>
                                        <input type="text" name="harga" class="form-control" placeholder="Masukkan Penawaran Bid">
                                    </div>
                                    </div>
                                        <button type="submit" class="btn btn-success">Tawar</button>

                                <a class="btn btn-primary" href="{{ route('listlelang.index') }}">Kembali</a>
                                </form>
                                </div>
                            @endif
                        </div>
                        </div>
                  <!-- /.tab-pane -->

                <div class="tab-pane" id="bid">
                        <div class="card-header">
                        <strong>Data Pelelangan {{ $lelangs->barang->nama_barang }}</strong>
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
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
                                <td>
                                    <span class="badge {{ $item->status == 'pending' ? 'bg-warning' : 'bg-success' }}">{{ Str::title($item->status) }}</span>
                                </td>

                                @if (auth()->user()->level == 'admin')
                                <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('lelangadmin.show', $item->id)}}">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                </td>
                                @endif
                                @if (auth()->user()->level == 'petugas')
                                <td>
                                <form action="{{ route('barang.destroy', [$item->id]) }}"method="POST">
                                {{-- <a class="btn btn-primary"href="{{ route('barang.show', $item->id)}}">Detail</a>
                                <a class="btn btn-warning"href="{{ route('barang.edit', $item->id)}}">Edit</a> --}}

                                <a class="btn btn-primary btn-sm" href="{{ route('lelangpetugas.show', $item->id)}}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit"value="Delete">
                                <i class="fas fa-trash">
                                </i>
                                Delete
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
                  </div>
                  <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
@endsection
