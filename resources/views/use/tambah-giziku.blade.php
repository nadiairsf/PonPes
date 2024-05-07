@extends('layouts.simple.master')
@section('title', 'Edit Profile')

@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Diary Sehatku</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Giziku</li>
<li class="breadcrumb-item active">Tambah Giziku</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="edit-profile">
		<div class="row">
		<form class="card" action="{{route('admin.createGiziku')}}" method="post">
			<div class="col-xl-12">
				@csrf
				{{ csrf_field() }}
					<div class="card-header">
						<h4 class="card-title mb-0">Tambah Giziku</h4>
						<input type="text" name="id_santris" id="" value="{{$data}}" hidden>
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="container-fluid mt-3">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<label for="">1. Perubahan berat badan dalam 2 minggu terakhir bila pasien / keluarga tidak tahu, tanyakan:</label>
											<div class="col-md-12 mb-3">
												<select id="perubahan" name="perubahan[]" class="form-control" multiple="">
													<option value="Perubahan ukuran pakaian">Perubahan ukuran pakaian  </option>
													<option value="Apakah terlihat lebih kurus">Apakah "terlihat lebih kurus</option>
													<option value="Muscle washing / oedem / asitens">Muscle washing / oedem / asitens</option>        
												</select>
												<span class="text-danger">@error('perubahan'){{ $message }}@enderror</span>
											</div>
											<label for="">2. Gejala gastrointestinal minimal 1 gejala dalam 2 minggu terakhir</label>
											<div class="col-md-12">
												<select id="gastrointestinal" name="gastrointestinal[]" class="form-control" multiple="multiple">
													<option value="Mual">Mual</option>
													<option value="Muntah">Muntah</option>
													<option value="Diare">Diare</option>
													<option value="Anoreksia">Anoreksia</option>
													<option value="Asupan">Asupan</option>
													<option value="Makan Kurang">Makan kurang</option>       
												</select>
												<span class="text-danger">@error('gastrointestinal'){{ $message }}@enderror</span>
											</div>
										</div>
									</div>
									<div class="col-md-6 mb-3"></div>
									<div class="col-md-6 mt-3">
										<div class="row">
										<label for=""></label>
											<div class="col-md-9">
												<label for="">1. Buang air besar:</label>
												<select id="bab" name="bab[]" class="form-control" multiple="multiple">
													<option value="Tidak ada keluhan">Tidak ada keluhan</option>
													<option value="Inkontinensia">Inkontinensia</option>
													<option value="Kolostomi">Kolostomi</option>
													<option value="Diare">Diare</option>
													<option value="Konstipasi">Konstipasi</option>
													<option value="Dengan Pencahar">Dengan Pencahar</option> 
													<option value="Feces berdarah">Feces berdarah</option> 
													<option value="Keterangan Lain">Keterangan Lain</option>       
												</select>
												<span class="text-danger">@error('bab'){{ $message }}@enderror</span>
												<input class="form-control mt-3" type="text" placeholder="Keterangan Lain" name="ket_bab">
												<span class="text-danger">@error('ket_bab'){{ $message }}@enderror</span>
											</div>
										</div>
									</div>
									<div class="col-md-6 mt-3">
										<div class="row">
										<label for=""></label>
											<div class="col-md-9">
												<label for="">2. Buang air kecil:</label>
												<select id="bak" name="bak[]" class="form-control" multiple="multiple">
													<option value="Tidak ada keluhan">Tidak ada keluhan</option>
													<option value="Oligouria">Oligouria</option>
													<option value="Poliuria">Poliuria</option>
													<option value="Disuria">Disuria</option>
													<option value="Hematuri">Hematuri</option>
													<option value="Nokturia">Nokturia</option> 
													<option value="Inkontinensi">Inkontinensi</option> 
													<option value="Keterangan Lain">Keterangan Lain</option>       
												</select>
												<span class="text-danger">@error('bak'){{ $message }}@enderror</span>
												<input class="form-control mt-3" type="text" placeholder="Keterangan Lain" name="ket_bak">
												<span class="text-danger">@error('ket_bak'){{ $message }}@enderror</span>
											</div>
										</div>
									</div>
									<div class="col-md-12 mt-3">
                              <div>
                                 <label class="form-label" for="validationCustom04"><b>Tidur dan Istirahat</b></label>
                              </div>
                           </div>
									<div class="col-md-6 mt-1">
										<div class="row">
										<label for=""></label>
											<div class="col-md-9">
												<label for="" class="mt-2">1. Mengalami sulit tidur</label>
												<select class="form-select" name="sulit_tidur" id="">
													<option value="">Pilih</option>
													<option value="Tidak">Tidak</option>
													<option value="Ya">Ya, diatasi dengan</option>
												</select>
												<span class="text-danger">@error('sulit_tidur'){{ $message }}@enderror</span>
												<input class="form-control mt-3" type="text" placeholder="Keterangan Lain" name="ket_sulittidur">
												<span class="text-danger">@error('ket_sulittidur'){{ $message }}@enderror</span>
											</div>
										</div>
									</div>
									<div class="col-md-6 mt-1">
										<div class="row">
										<label for=""></label>
											<div class="col-md-9">
												<label for="" class="mt-2">2. Ketergantungan Obat</label>
													<div class="m-t-0 m-checkbox-inline">
													<select class="form-select" name="ketergantungan" id="">
														<option value="">Pilih</option>
														<option value="Tidak">Tidak</option>
														<option value="Ya">Ya, Nama Obat</option>
													</select>
													<span class="text-danger">@error('ketergantungan'){{ $message }}@enderror</span>
													<input class="form-control mt-3" type="text" placeholder="Keterangan Lain" name="ket_ketergantungan">
													<span class="text-danger">@error('ket_ketergantungan'){{ $message }}@enderror</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 mt-1">
										<div class="row">
										<label for=""></label>
											<div class="col-md-9">
												<label for="">3. Rata - rata tidur sehari:</label>
												<input class="form-control" type="text" name="rata_tidur" placeholder="Keterangan Lain">
												<span class="text-danger">@error('rata_tidur'){{ $message }}@enderror</span>
											</div>
										</div>
									</div>
									<div class="col-md-6 mt-3">
										<div class="row">
											<div class="col-md-9">
												
											</div>
										</div>
									</div>
									<div class="col-md-6 mt-3">
										<div class="row">
										<label for=""></label>
											<div class="col-md-9">
												<label for="" class="mt-2"><b>Masalah Keperawatan</b></label>
												<div class="m-t-0 m-checkbox-inline">
													<select class="form-select" name="keperawatan" id="">
														<option value="">Pilih</option>
														<option value="Gangguan pola tidur">Gangguan Pola Tidur</option>
														<option value="Keterangan Lain">Keterangan Lain</option>
													</select>
													<span class="text-danger">@error('keperawatan'){{ $message }}@enderror</span>
													<input class="form-control mt-3" type="text" placeholder="Keterangan Lain" name="ket_keperawatan">
													<span class="text-danger">@error('ket_keperawatan'){{ $message }}@enderror</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 mt-3">
										<div class="row">
										<label for=""></label>
											<div class="col-md-9">
													<label for=""><b>Riwayat Alergi</b></label>
														<select class="form-select" id="validationCustom04"  name="alergi">
															<option value="">Pilih</option>
															<option value="Makanan">Makanan</option>
															<option value="Obat">Obat</option>
															<option value="Lainnya">Lainnya</option>
														</select>
														<span class="text-danger">@error('alergi'){{ $message }}@enderror</span>
													<input class="form-control mt-3" type="text" placeholder="Keterangan Lain" name="ket_alergi">
													<span class="text-danger">@error('ket_alergi'){{ $message }}@enderror</span>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer text-end">
						<button class="btn btn-primary" type="submit">Simpan</button>
					</div>
			
			</div>
			</form>
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