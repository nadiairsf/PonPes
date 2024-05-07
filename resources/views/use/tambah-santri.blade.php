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
<li class="breadcrumb-item">Data Santri</li>
<li class="breadcrumb-item active">Tambah Data Santri</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="edit-profile">
		<div class="row">
			<div class="col-xl-12">
				<form class="card" action="/admin/profil/data-santri/create" method="post" >
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
						<h4 class="card-title mb-0">Tambah Santri</h4>
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Email Wali Santri</label>
									<input class="form-control" type="email" name="email_ortu" value="{{ old('email_ortu') }}" id="email_ortu" required>
									<span class="text-danger">@error('email_ortu'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Email Santri</label>
									<input class="form-control" type="email" name="email_santri" value="{{ old('email_santri') }}" id="email_santri" required>
									<span class="text-danger">@error('email_santri'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">NIS</label>
									<input class="form-control" type="number" name="nis" value="{{ old('nis') }}" id="nis" required>
									<span class="text-danger">@error('nis'){{ $message }}@enderror</span>
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
							<div class="col-sm-6 col-md-6">
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
									<select class="form-select" id="jk" required name="jk">
									 <option selected="" disabled="" value="">Pilih</option>
                            <option value="laki-laki">Laki - laki</option>
									 <option value="perempuan">Perempuan</option>
                          </select>
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
									<input class="form-control" type="date" name="tgl_keluar">
								</div>
							</div>
                     <div class="col-md-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Nama Orang Tua</label>
									<input class="form-control" type="text" name="nama_ortu" value="{{ old('nama_ortu') }}" id="nama_ortu" required>
									<span class="text-danger">@error('nama_ortu'){{ $message }}@enderror</span>
								</div>
							</div>
                     <div class="col-md-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Alamat Tempat Tinggal</label>
									<input class="form-control" type="text" name="tempat_tinggal" value="{{ old('temapt_tinggal') }}" id="temapt_tinggal" required>
									<span class="text-danger">@error('tempat_tinggal'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Nomor HP Orang Tua</label>
									<input class="form-control" type="text" name="noHp_ortu" value="{{ old('noHp_ortu') }}" id="noHp_ortu" required>
									<span class="text-danger">@error('noHp_ortu'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Kelas</label>
									<select class="form-select" id="kelas"  name="kelas" 	required>
                            <option selected="" disabled="" value="">Pilih</option>
                            @foreach ( $kelas as $k )
									 <option value="{{$k->id}}">{{$k->nama}}</option>
									 @endforeach			 
                          </select>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Keterangan Tambahan</label>
									<textarea class="form-control" type="text" name="ket" style=" height: 150px;"></textarea>
								
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