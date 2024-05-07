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
				<form class="card">
					<div class="card-header">
						<h4 class="card-title mb-0">Tambah General Check Up</h4>
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Nama Lengkap</label>
									<input class="form-control" type="text" placeholder="Nama Lengkap">
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Kelas</label>
									<input class="form-control" type="text" placeholder="Kelas">
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Jenis Kelamin</label>
									<input class="form-control" type="text" placeholder="Perempuan / Laki - laki">
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">TTL</label>
									<input class="form-control" type="text" placeholder="Tempat Tanggal Lahir">
								</div>
							</div>
							<div class="col-sm-12 col-md-12">
								<div class="mb-3">
									<label class="form-label"><b>Tanda - tanda vital</b></label>
								</div>
							</div>
							<div class="col-md-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Tekanan Darah</label>
									<input class="form-control" type="text" >
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">SPO2</label>
									<input class="form-control" type="text" >
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Suhu</label>
									<input class="form-control" type="number" >
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Nadi</label>
									<input class="form-control" type="number" >
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Respiration Rate</label>
									<input class="form-control" type="number" >
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
									<label class="form-label">TB</label>
									<input class="form-control" type="number" >
								</div>
							</div>
							<div class="col-sm-4 col-md-4">
								<div class="mb-3">
									<label class="form-label">BB</label>
									<input class="form-control" type="number" >
								</div>
							</div>
							<div class="col-sm-4 col-md-4">
								<div class="mb-3">
									<label class="form-label">IMT</label>
									<input class="form-control" type="number" >
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Riwayat Penyakit</label>
									<input class="form-control" type="text" >
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Obat yang sering dikonsumsi</label>
									<input class="form-control" type="text" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Riwayat Alergi</label>
									<select class="form-control btn-square">
										<option value="0">--Pilih--</option>
										<option value="1">Obat</option>
										<option value="2">Lainnya</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div>
									<label class="form-label">Keterangan</label>
									<textarea class="form-control" rows="5" placeholder="Riwayat alergi"></textarea>
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