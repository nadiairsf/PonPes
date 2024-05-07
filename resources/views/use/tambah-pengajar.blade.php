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
				<form class="card" action="{{ route('admin.createPengajar') }}" method="post" >
					@if (Session::get('fail'))
					<div class="alert alert-danger">
						{{ Session::get('fail') }}
					</div>
					@endif
					@csrf
					{{ csrf_field() }}
					<div class="card-header">
						<h4 class="card-title mb-0">Tambah Pengajar</h4>
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Email</label>
									<input class="form-control" type="email" name="email" value="{{ old('email') }}" id="email" required>
									<span class="text-danger">@error('email'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Nama Lengkap</label>
									<input class="form-control" type="text" name="name" value="{{ old('name') }}" id="name" required> 
									<span class="text-danger">@error('name'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Tempat Lahir</label>
									<input class="form-control" type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" id="tempat_lahir" required>
									<span class="text-danger">@error('tempat_lahir'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-md-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Tanggal Lahir</label>
									<input class="form-control" type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" id="tgl_lahir" required>
									<span class="text-danger">@error('tgl_lahir'){{ $message }}@enderror</span>
								</div>
							</div>
                     <div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Status</label>
									<input class="form-control" type="text" name="status" value="{{ old('status') }}" id="status" required>
									<span class="text-danger">@error('status'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Jenis Kelamin</label>
									<select class="form-select" name="jk" id="jk" required>
										<option value="">Pilih</option>
										<option value="Laki - laki">Laki - laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
									<span class="text-danger">@error('jk'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-md-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Tanggal Masuk</label>
									<input class="form-control" type="date" name="tgl_masuk" value="{{ old('tgl_masuk') }}" id="tgl_masuk" required>
									<span class="text-danger">@error('tgl_masuk'){{ $message }}@enderror</span>
								</div>
							</div>
                     <div class="col-md-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Tanggal Keluar</label>
									<input class="form-control" type="date" name="tgl_keluar" value="{{ old('tgl_keluar') }}" id="tgl_keluar">
								
								</div>
							</div>
                     <div class="col-md-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Tempat Tinggal</label>
									<input class="form-control" type="text" name="tempat_tinggal" value="{{ old('tempat_tinggal') }}" id="tempat_tinggal" required>
									<span class="text-danger">@error('tempat_tinggal'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Nomor HP</label>
									<input class="form-control" type="text" name="noHp" value="{{ old('noHp') }}" id="noHp" required>
									<span class="text-danger">@error('noHp'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Riwayat Pendidikan</label>
									<input class="form-control" type="text" name="riwayat_pendidikan" value="{{ old('riwayat_pendidikan') }}" id="riwayat_pendidikan" required>
									<span class="text-danger">@error('riwayat_pendidikan'){{ $message }}@enderror</span>
								</div>
							</div>
							
						</div>
					</div>
					<div class="card-footer text-end">
						<button class="btn btn-primary" type="submit">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')

@endsection