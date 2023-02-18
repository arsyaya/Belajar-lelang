@extends('template.master')
@section('atas', 'LelanginAja | Edit User')

@section('content')
<form action="{{ route('user.update', [$users->id]) }}" method="post" class="mb-5">
    @csrf
    @method('PUT')
    <div class="card-body">
    <div class="row">
        <div class="col-12">
      <div class="form-group">
                    <label for="inputnama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $users->nama }}">
                  </div>
      
      <div class="form-group">
                    <label for="inputusername">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ $users->username }}">
                 </div>
     
     <div class="form-group">
                    <label for="level">Level</label>
                   <select class="form-control" value="{{ $users->level }}" old="{{$users->level}}" name="level" id="level">
                        <option selected disabled>{{ $users->level }}</option>
                        <option value="petugas">Petugas</option>
                        <option value="masyarakat">Masyarakat</option>
                   </select>
                  </div>
    <div class="form-group">
            <label for="level">Telepon</label>
            <input type="text"  name="tlp" class="form-control" value="{{ $users->tlp }}">
    </div>
    </div>
        </div>
     
    <div class="row">
    <div class="col-11 d-flex justify-content-start">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <!-- </div> -->
     <a class="btn btn-warning" href="{{ route('user.index') }}">Kembali</a>
      
    </div>
  </form>
  </div>
  @endsection