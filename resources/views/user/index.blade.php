@extends('template.master')
@section('atas', 'LelanginAja | Data User')

@section('content')
<div class="card">
    <div class="card-header">
    <a class="btn btn-primary" href="{{ route('user.create')}}">
        <i class="fas fa-plus"></i>
         Registrasi User
    </a>
    </div>

<div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>    
                <th>Username</th> 
                <th>Telepon</th>         
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->nama }}</td> 
                <td>{{ $user->username }}</td> 
                <td>{{ $user->tlp }}</td>
                <td>{{ $user->level }}</td>
                <td>
                    <form action="{{ route('user.destroy', [$user->id]) }}" method="post">
                        <a class="btn btn-warning mr-3" href="{{ route('user.edit', $user->id) }}">Edit
                        <i class="fas fa-edit"></i>
                        </a>
                        @csrf
                        @method ('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">Delete
             <i class="fas fa-trash"></i>
            </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection