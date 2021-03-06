@extends('layouts.temp')
@section('breadcrumb')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Data Akun</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Data Akun</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	@endsection
	@section('content')
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
	@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
	@endif
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
		<i class="fa fa-plus"></i> Tambah Akun
	</button>
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Data Akun</h3>
			<div class="float-right">
				<a href="{{ url('cetakDataAkun') }}" class="btn btn-danger"><i class="fa fa-print"></i>Print PDF</a>
				<a href="{{ url('exportDataAkun') }}" class="btn btn-success"><i class="fa fa-print"></i>Print Excel</a></div>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Level</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $item)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$item->name}}</td>
						<td>{{$item->email}}</td>
						<td>@if ($item->role == 1)
							Admin
							@else
							Calon Siswa
							@endif
						</td>
						<th>
							<a href="{{url('admin/editAdmin/'.$item->id)}}" title="" class="btn btn-success"> 
								<i class="fa fa-edit"></i>Edit</a>
								<form action="{{url('admin', $item->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
									@method('delete')
									@csrf
									<button type="submit" class="btn btn-danger">
										<i class="fa fa-trash"></i>Hapus
									</button>
								</form>
							</th>			
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
	
		<div class="modal fade" id="modal-xl">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Tambah Data Akun</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('admin')}}" method="POST">

							<div class="form-group">
								@csrf
								<label>Nama Lengkap</label>
								<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" required>
								@error('nama_barang')
								<div class="invalid-feedback">
									{{$message}}
								</div>
								@enderror
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Email" required>
								@error('jumlah')
								<div class="invalid-feedback">
									{{$message}}
								</div>
								@enderror
							</div>
							<div class="form-group">
								<label>Level</label>
								<select name="role" class="form-control" required>
									<option value="">--Pilih Level--</option>
									<option value="1">Admin</option>
									<option value="2">Calon Siswa</option>
								</select>
								@error('jumlah')
								<div class="invalid-feedback">
									{{$message}}
								</div>
								@enderror
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Password" required>
								@error('jumlah')
								<div class="invalid-feedback">
									{{$message}}
								</div>
								@enderror
							</div>
							<div class="form-group">
								<label>Konfirmasi Password</label>
								<input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"  placeholder="Konfirmasi Password" required>
								@error('jumlah')
								<div class="invalid-feedback">
									{{$message}}
								</div>
								@enderror
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-primary" value="Simpan" name="">
						</form>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
			@endsection
