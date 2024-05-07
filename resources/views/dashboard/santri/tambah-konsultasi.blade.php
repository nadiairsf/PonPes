@extends('layouts-santri.simple.master')
@section('title', 'Edit Profile')

@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Konsultasi</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Konsultasi</li>
<li class="breadcrumb-item active">Buat Jadwal Konsultasi</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-xl-6">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h5>Buat Jadwal Konsultasi</h5>
						</div>
						<div class="card-body">
						<form  class="theme-form mega-form" action="{{ route('santri.createKonsul') }}" method="post"  >
                            @csrf
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label class="col-form-label">Konsultasi Mengenai</label>
                                <input class="form-control p-3" name="konsultasi" required></input>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Ustadz</label>
                                <select class="livesearch-guru form-control p-3" name="guru" required></select>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Jam</label>
                                <input class="form-control p-3" type="time" name="jam" required></input>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Tanggal</label>
                                <input class="form-control p-3" type="date" name="tgl" required></input>
                            </div>
						</div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <button class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


@endsection