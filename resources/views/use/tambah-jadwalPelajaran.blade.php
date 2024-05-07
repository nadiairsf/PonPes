@extends('layouts.simple.master')
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
<h3>Capaian</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Capaian</li>
<li class="breadcrumb-item active">Jadwal Pelajaran</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-xl-6">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h5>Jadwal Konsultasi</h5>
						</div>
						<div class="card-body">
						<form  class="theme-form mega-form" action="{{ route('admin.createJadwal') }}" method="post"  >
                            @csrf
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label class="col-form-label">Mata Pelajaran</label>
                                <select class="livesearch-mapel form-control p-3" name="mapel"></select>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Guru</label>
                                <select class="livesearch-guru form-control p-3" name="guru"></select>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Kelas</label>
                                <select class="livesearch-kelas form-control p-3" name="kelas"></select>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Keterangan Jam | Hari</label>
                                <textarea class="form-control" type="Number" placeholder="Senin | 10:00, Selasa | 07:00" style="height:100px" name="waktu"></textarea>
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

<script>
   $(document).ready(function () {
         $("#perubahan").select2({
            placeholder: "Silahkan Pilih "
         });
   });
</script>
<script>
   $(document).ready(function () {
         $("#gastrointestinal").select2({
            placeholder: "Silahkan Pilih "
         });
   });
</script>
<script>
   $(document).ready(function () {
         $("#bab").select2({
            placeholder: "Silahkan Pilih "
         });
   });
</script>
<script>
   $(document).ready(function () {
         $("#bak").select2({
            placeholder: "Silahkan Pilih Keluahan"
         });
   });
</script>

@endsection