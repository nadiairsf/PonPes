@extends('layouts.simple.master')
@section('title', 'Edit Profile')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Profil</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Data Pengajar</li>
<li class="breadcrumb-item active">Tambah Data Pengajar</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="edit-profile">
		<div class="row">
			<div class="col-xl-12">
				@foreach ($data as $d )
				<form class="card" action="/admin/profil/data-pengajar/update/{{$d->id}}" method="post" >
					@if (Session::get('success'))
					<div class="alert alert-success">
						{{ Session::get('success') }}
					</div>
					@endif
					@if (Session::get('fail'))
					<div class="alert alert-danger">
						{{ Session::get('fail') }}
					</div>
					@endif
					@csrf
					{{ csrf_field() }}
					<div class="card-header">
						<h4 class="card-title mb-0">Tambah Pengajar</h4>
						<input class="form-control" type="text" name="id" placeholder="{{$d->id_guru}}" hidden>
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
						<div class="row">
							<!-- <div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Email</label>
									<input class="form-control" type="email" name="email" placeholder="{{$d->email}}">
									<span class="text-danger">@error('email'){{ $message }}@enderror</span>
								</div>
							</div> -->
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Nama Lengkap</label>
									<input class="form-control" type="text" name="name" value="{{$d->nama}}">
									<span class="text-danger">@error('name'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Tempat Lahir</label>
									<input class="form-control" type="text" name="tempat_lahir"  value="{{$d->tempat_lahir}}">
									<span class="text-danger">@error('tempat_lahir'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-md-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Tanggal Lahir</label>
									<input class="form-control" type="date" name="tgl_lahir" value="{{$d->tgl_lahir}}">
									<span class="text-danger">@error('tgl_lahir'){{ $message }}@enderror</span>
								</div>
							</div>
                     <div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Status</label>
									<input class="form-control" type="text" name="status" value="{{$d->status}}">
									<span class="text-danger">@error('status'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Jenis Kelamin</label>
									<select class="form-select" name="jk" id="">
										<option value="{{$d->jenis_kelamin}}">{{$d->jenis_kelamin}}</option>
										<option value="Laki - laki">Laki - laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
									<span class="text-danger">@error('jk'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-md-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Tanggal Masuk</label>
									<input class="form-control" type="date" name="tgl_masuk" value="{{$d->tgl_masuk}}">
									<span class="text-danger">@error('tgl_masuk'){{ $message }}@enderror</span>
								</div>
							</div>
                     <div class="col-md-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Tanggal Keluar</label>
									<input class="form-control" type="date" name="tgl_keluar" value="{{$d->tgl_keluar}}">
									<span class="text-danger">@error('tgl_keluar'){{ $message }}@enderror</span>
								</div>
							</div>
                     <div class="col-md-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Tempat Tinggal</label>
									<input class="form-control" type="text" name="tempat_tinggal"  value="{{$d->tempat_tinggal}}">
									<span class="text-danger">@error('tempat_tinggal'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Nomor HP</label>
									<input class="form-control" type="text" name="noHp"  value="{{$d->noHp}}">
									<span class="text-danger">@error('noHp'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Riwayat Pendidikan</label>
									<input class="form-control" type="text" name="riwayat_pendidikan"  value="{{$d->riwayat_pendidikan}}">
									<span class="text-danger">@error('riwayat_pendidikan'){{ $message }}@enderror</span>
								</div>
							</div>
							
						</div>
					</div>
					<div class="card-footer text-end">
						<button class="btn btn-primary" type="submit">Simpan</button>
					</div>
				</form>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')

@endsection