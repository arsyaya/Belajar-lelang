@extends('template.master')
@section('atas', 'LelanginAja | Register User')

@section('content')
<form action="{{ route('user.store') }}" method="post" class="mb-5">
    @csrf

    <div class="card-body">
    <div class="row">
        <div class="col-12">
      <div class="form-group">
                    <label for="inputnama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama">
                  </div>
      
      <div class="form-group">
                    <label for="inputusername">Username</label>
                    <input type="text" name="username" class="form-control" id="inputusername" placeholder="Masukkan Username">
                 </div>

      <div class="form-group">
                    <label for="inputpassword">Password</label>
                    <input type="password" name="password" class="form-control" id="inputpassword" placeholder="Password">
                 </div>
     
     <div class="form-group">
                    <label for="level">Level</label>
                   <select class="form-control" name="level" id="level">
                        <option selected disabled>Pilih Level</option>
                        <option value="petugas">Petugas</option>
                        <option value="masyarakat">Masyarakat</option>
                   </select>
                  </div>
    <div class="form-group">
            <label for="level">Telepon</label>
            <input type="text"  name="tlp" class="form-control" id="inputtlp" placeholder="Masukkan No Telepon">
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