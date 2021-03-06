@extends('layouts.temp')
@section('title')
Edit Pengumuman
@endsection
@section('breadcrumb')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Pengumuman</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Pengumuman</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')

  <form action="{{ url('/pengumuman/editPengumuman/'.$pengumuman->id) }}" method="post" accept-charset="utf-8">
    @csrf
    @method('patch')
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data Pengumuman</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="form-group">
          <label>Judul</label>
          <input type="text" placeholder="Judul Pengumuman" class="form-control" name="judul" value="{{$pengumuman->judul}}">
        </div>
        <div class="form-group">
          <label>Isi</label>
          <textarea name="isi" placeholder="Isi Pengumuman" class="textarea" rows="5">{{$pengumuman->isi}}</textarea>
        </div>
        <div class="card-footer">
          <button class="btn btn-success"><i class="fas fa-edit mr-1"></i>Edit</button>
          <a class="btn btn-default" href="{{ url('pengumuman') }}"><i class="fa fa-undo mr-1"></i>Kembali</a>
        </div>
    </div>
    <!-- /.card-body -->
</div>
  </form>

@endsection