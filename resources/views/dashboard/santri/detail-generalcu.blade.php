@extends('layouts-santri.simple.master')
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
				@foreach ($data as $d )
				<form class="card" action="" method="post" >
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
						<h4 class="card-title mb-0">Detail General Check Up</h4>
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12 col-md-12">
								<div class="mb-3">
									<label class="form-label"><b>Tanda - tanda vital</b></label>
									<input class="form-control" type="text" name="id_santris" value="{{$d->id_santris}}" hidden>
								</div>
							</div>
							<div class="col-md-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Tekanan Darah</label>
									<input class="form-control" type="text" name="tekanan_darah" placeholder="mmHg" value="{{$d->tekanan_darah}}" disabled >
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">SPO2</label>
									<input class="form-control" type="number" name="spo2" value="{{$d->spo2}}" disabled>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Suhu</label>
									<input class="form-control" type="number" name="suhu" placeholder="Celcius" value="{{$d->suhu}}" disabled>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Nadi</label>
									<input class="form-control" type="number" name="nadi" placeholder="perMenit" value="{{$d->nadi}}" disabled>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Respiration Rate</label>
									<input class="form-control" type="number" name="respiration_rate" placeholder="siklus perMenit" value="{{$d->respiration_rate}}" disabled>
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
									<input class="form-control" type="number" name="tb" placeholder="CM" value="{{$d->tinggi_badan}}" disabled>
								</div>
							</div>
							<div class="col-sm-4 col-md-4">
								<div class="mb-3">
									<label class="form-label">BB</label>
									<input class="form-control" type="number" name="bb" placeholder="Kg" value="{{$d->berat_badan}}" disabled>
								</div>
							</div>
							<div class="col-sm-4 col-md-4">
								<div class="mb-3">
									<label class="form-label">IMT</label>
									<input class="form-control" type="text" name="imt" disabled value="{{$d->imt}}" disabled>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Riwayat Penyakit</label>
									<input class="form-control" type="text" name="riwayat" value="{{$d->riwayat_penyakit}}" disabled>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Obat yang sering dikonsumsi</label>
									<input class="form-control" type="text" name="konsumsi" value="{{$d->obat_konsumsi}}" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Riwayat Alergi</label>
									<input class="form-control" type="text" name="konsumsi" value="{{$d->obat_konsumsi}}" value="{{$d->alergi}}"disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div>
									<label class="form-label">Keterangan</label>
									<textarea class="form-control" rows="5" placeholder="Riwayat alergi" name="keterangan" value="{{$d->keterangan}}" disabled></textarea>
								</div>
							</div>
						</div>
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