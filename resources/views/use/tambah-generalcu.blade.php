@extends('layouts.simple.master')
@section('title', 'Edit Profile')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Diary Sehatku</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">General Check Up</li>
<li class="breadcrumb-item active">Tambah General Check Up</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="edit-profile">
		<div class="row">
			<div class="col-xl-12">
				<form class="card" action="{{ route('admin.createGeneralCU') }}" method="post" >
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
						<h4 class="card-title mb-0">Tambah General Check Up</h4>
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12 col-md-12">
								<div class="mb-3">
									<label class="form-label"><b>Tanda - tanda vital</b></label>
									<input class="form-control" type="text" name="id_santris" value="{{$id}}" hidden>
								</div>
							</div>
							<div class="col-md-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Tekanan Darah</label>
									<input class="form-control" type="text" name="tekanan_darah" placeholder="mmHg" value="{{ old('tekanan_darah') }}"  required>
									<span class="text-danger">@error('tekanan_darah'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">SPO2</label>
									<input class="form-control" type="number" name="spo2" value="{{ old('spo2') }}"  required>
									<span class="text-danger">@error('spo2'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Suhu</label>
									<input class="form-control" type="number" name="suhu" placeholder="Celcius" value="{{ old('suhu') }}"  required>
									<span class="text-danger">@error('suhu'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Nadi</label>
									<input class="form-control" type="number" name="nadi" placeholder="perMenit" value="{{ old('nadi') }}"  required>
									<span class="text-danger">@error('nadi'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Respiration Rate</label>
									<input class="form-control" type="number" name="respiration_rate" placeholder="siklus perMenit" value="{{ old('respiration_rate') }}"  required>
									<span class="text-danger">@error('respiration_rate'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
								
								</div>
							</div>
							<div class="col-sm-12 col-md-12">
								<div class="mb-3">
									<label class="form-label"><b>Status Gizi</b></label>
								</div>
							</div>
							<div class="col-sm-4 col-md-4">
								<div class="mb-3">
									<label class="form-label">Tinggi Badan</label>
									<input class="form-control" type="number" name="tb" placeholder="CM" value="{{ old('tb') }}"  required>
									<span class="text-danger">@error('tinggi_badan'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-4 col-md-4">
								<div class="mb-3">
									<label class="form-label">Berat Badan</label>
									<input class="form-control" type="number" name="bb" placeholder="Kg" value="{{ old('bb') }}"  required>
									<span class="text-danger">@error('berat_badan'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-4 col-md-4">
								<div class="mb-3">
									<label class="form-label">IMT</label>
									<input class="form-control" type="number" name="imt" disabled>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Riwayat Penyakit</label>
									<input class="form-control" type="text" name="riwayat" value="{{ old('riwayat') }}" >
									<span class="text-danger">@error('riwayat_penyakit'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Obat yang sering dikonsumsi</label>
									<input class="form-control" type="text" name="konsumsi" value="{{ old('konsumsi') }}"  >
									<span class="text-danger">@error('konsumsi'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Riwayat Alergi</label>
									<select class="form-control btn-square" name="alergi">
										<option value="">--Pilih--</option>
										<option value="obat">Obat</option>
										<option value="lainnya">Lainnya</option>
									</select>
									<span class="text-danger">@error('alergi'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="col-md-6">
								<div>
									<label class="form-label">Keterangan</label>
									<textarea class="form-control" rows="5" placeholder="Riwayat alergi" name="keterangan" value="{{ old('riwayat_alergi') }}" ></textarea>
									<span class="text-danger">@error('keterasdasdwsdaangan'){{ $message }}@enderror</span>
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