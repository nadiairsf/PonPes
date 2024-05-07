@extends('layouts-santri.simple.master')
@section('title', 'Edit Profile')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Profil</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Profil</li>
<li class="breadcrumb-item active">Edit Profil</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="edit-profile">
		<div class="row">
			<div class="col-xl-12">
				@foreach ($data as $d )
				<form class="card" action="/santri/update-profil/{{$d->id}}" method="post" >
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
						<h4 class="card-title mb-0">Edit Profil</h4>
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					
					<div class="card-body">
						<div class="row">
							<input class="form-control" type="email" name="email" value="{{$d->email}}" hidden>
							<input class="form-control" type="date" name="tgl_keluar" value="$d->tgl_keluar" hidden>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">NIS</label>
									<input class="form-control" type="number" name="nis" value="{{$d->nis}}" disabled>
									<input class="form-control" type="number" name="nis" value="{{$d->nis}}" hidden>
									<span class="text-danger">@error('nis'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-3 col-md-3">
								<div class="mb-3">
									<label class="form-label">Kelas</label>
									 <input class="form-control" type="text" name="kelas" value="{{$d->kelas}}" hidden>								
									 <input class="form-control" type="text" value="{{$d->kelaz}}" disabled>								
								</div>
							</div>
							<div class="col-sm-3 col-md-3">
								<div class="mb-3">
									<label class="form-label">Tahun</label>
									 <input class="form-control" type="text"  value="{{$d->tahun}}" disabled>								
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Status</label>
									<input class="form-control" type="text" value="{{$d->status}}" disabled>
									<input class="form-control" type="text" name="status" value="{{$d->status}}" hidden>
									<span class="text-danger">@error('status'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-md-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Tanggal Masuk</label>
									<input class="form-control" type="date" value="{{$d->tgl_masuk}}" disabled>
									<input class="form-control" type="date" name="tgl_masuk" value="{{$d->tgl_masuk}}" hidden>
									<span class="text-danger">@error('tgl_masuk'){{ $message }}@enderror</span>
								</div>
							</div>
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
									<input class="form-control" type="text" name="tempat_lahir" value="{{$d->tempat_lahir}}">
									<span class="text-danger">@error('tempat_lahir'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Tanggal Lahir</label>
									<input class="form-control" type="date" name="tgl_lahir" value="{{$d->tgl_lahir}}">
									<span class="text-danger">@error('tgl_lahir'){{ $message }}@enderror</span>
								</div>
							</div>
                    
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Jenis Kelamin</label>
									<select class="form-select" required="" name="jk" >
									 <option value="{{$d->jenis_kelamin}}">{{$d->jenis_kelamin}}</option>
                            <option value="laki-laki">Laki - laki</option>
									 <option value="perempuan">Perempuan</option>
                          </select>
								</div>
							</div>
						
                     
                     <div class="col-md-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Nama Orang Tua</label>
									<input class="form-control" type="text" name="nama_ortu" value="{{$d->nama_ortu}}">
									<span class="text-danger">@error('nama_ortu'){{ $message }}@enderror</span>
								</div>
							</div>
                     <div class="col-md-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Alamat Tempat Tinggal</label>
									<input class="form-control" type="text" name="tempat_tinggal" value="{{$d->tempat_tinggal}}">
									<span class="text-danger">@error('tempat_tinggal'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Nomor HP Orang Tua</label>
									<input class="form-control" type="text" name="noHp_ortu" value="{{$d->noHp_ortu}}">
									<span class="text-danger">@error('noHp_ortu'){{ $message }}@enderror</span>
								</div>
							</div>
							
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									
									<textarea class="form-control" type="text" name="ket" style=" height: 150px;" hidden>{{$d->ket}}</textarea>
									<span class="text-danger">@error('ket'){{ $message }}@enderror</span>
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