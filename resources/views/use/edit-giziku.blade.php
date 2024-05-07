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
		@foreach ($table as $t )
		<form class="card" action="/admin/diary/update-giziku/{{$t->id}}" method="post" >
			<div class="col-xl-12">
				@csrf
				{{ csrf_field() }}
					<div class="card-header">
						<h4 class="card-title mb-0">Tambah Giziku</h4>
						<input type="text" name="id" id="" value="{{$t->id}}" hidden>
						<input type="text" name="id_santris" id="" value="{{$t->id_santris}}" hidden>
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
												@if($table[0]->perubahan == 'null')
												<select id="perubahan" name="perubahan[]" class="form-control" multiple="">
													<option value="Perubahan ukuran pakaian">Perubahan ukuran pakaian  </option>
													<option value="Apakah terlihat lebih kurus">Apakah "terlihat lebih kurus</option>
													<option value="Muscle washing / oedem / asitens">Muscle washing / oedem / asitens</option>        
												</select>
												@else
												@php
													$per = json_decode($table[0]->perubahan);
												@endphp
												<select id="perubahan" name="perubahan[]" class="form-control" multiple="multiple">
													<option value="Perubahan ukuran pakaian"
													<?php for ($i = 0; $i < count($per); $i++) {
                                       if($per[$i] == 'Perubahan ukuran pakaian') echo 'selected';} ?>>Perubahan ukuran pakaian</option>
													<option value="Apakah terlihat lebih kurus"
													<?php for ($i = 0; $i < count($per); $i++) {
                                       if($per[$i] == 'Apakah terlihat lebih kurus') echo 'selected';} ?>>Apakah "terlihat lebih kurus</option>
													<option value="Muscle washing / oedem / asitens"
													<?php for ($i = 0; $i < count($per); $i++) {
                                       if($per[$i] == 'Muscle washing / oedem / asitens') echo 'selected';} ?>>Muscle washing / oedem / asitens</option>        
												</select>
												@endif
											</div>
											<label for="">2. Gejala gastrointestinal minimal 1 gejala dalam 2 minggu terakhir</label>
											<div class="col-md-12">
												@if($table[0]->gastrointestinal == 'null')
												<select id="gastrointestinal" name="gastrointestinal[]" class="form-control" multiple="multiple">
													<option value="Mual">Mual</option>
													<option value="Muntah">Muntah</option>
													<option value="Diare">Diare</option>
													<option value="Anoreksia">Anoreksia</option>
													<option value="Asupan">Asupan</option>
													<option value="Makan Kurang">Makan kurang</option>       
												</select>
												@else
												@php
													$gas = json_decode($table[0]->gastrointestinal);
												@endphp	
												<select id="gastrointestinal" name="gastrointestinal[]" class="form-control" multiple="multiple">
													<option value="Mual"
													<?php for ($i = 0; $i < count($gas); $i++) {
                                       if($gas[$i] == 'Mual') echo 'selected';} ?>>Mual</option>
													<option value="Muntah"
													<?php for ($i = 0; $i < count($gas); $i++) {
                                       if($gas[$i] == 'Muntah') echo 'selected';} ?>>Muntah</option>
													<option value="Diare"
													<?php for ($i = 0; $i < count($gas); $i++) {
                                       if($gas[$i] == 'Diare') echo 'selected';} ?>>Diare</option>
													<option value="Anoreksia"
													<?php for ($i = 0; $i < count($gas); $i++) {
                                       if($gas[$i] == 'Anoreksia') echo 'selected';} ?>>Anoreksia</option>
													<option value="Asupan"
													<?php for ($i = 0; $i < count($gas); $i++) {
                                       if($gas[$i] == 'Asupan') echo 'selected';} ?>>Asupan</option>
													<option value="Makan Kurang"
													<?php for ($i = 0; $i < count($gas); $i++) {
                                       if($gas[$i] == 'Makan Kurang') echo 'selected';} ?>>Makan kurang</option>       
												</select>
												@endif										
											</div>
										</div>
									</div>
									<div class="col-md-6 mb-3"></div>
									<div class="col-md-6 mt-3">
										<div class="row">
										<label for=""></label>
											<div class="col-md-9">
												<label for="">1. Buang air besar:</label>
												@if($table[0]->bab == 'null')
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
												@else
												@php
													$bab = json_decode($table[0]->bab);
												@endphp
												<select id="bab" name="bab[]" class="form-control" multiple="multiple">
													<option value="Tidak ada keluhan"
													<?php for ($i = 0; $i < count($bab); $i++) {
                                       if($bab[$i] == 'Tidak ada keluhan') echo 'selected';} ?>>Tidak ada keluhan</option>
													<option value="Inkontinensia"
													<?php for ($i = 0; $i < count($bab); $i++) {
                                       if($bab[$i] == 'Inkontinesia') echo 'selected';} ?>>Inkontinensia</option>
													<option value="Kolostomi"
													<?php for ($i = 0; $i < count($bab); $i++) {
                                       if($bab[$i] == 'Kolostomi') echo 'selected';} ?>>Kolostomi</option>
													<option value="Diare"
													<?php for ($i = 0; $i < count($bab); $i++) {
                                       if($bab[$i] == 'Diare') echo 'selected';} ?>>Diare</option>
													<option value="Konstipasi"
													<?php for ($i = 0; $i < count($bab); $i++) {
                                       if($bab[$i] == 'Konstipasi') echo 'selected';} ?>>Konstipasi</option>
													<option value="Dengan Pencahar"
													<?php for ($i = 0; $i < count($bab); $i++) {
                                       if($bab[$i] == 'Dengan Pencahar') echo 'selected';} ?>>Dengan Pencahar</option> 
													<option value="Feces berdarah"
													<?php for ($i = 0; $i < count($bab); $i++) {
                                       if($bab[$i] == 'Faces berdarah') echo 'selected';} ?>>Feces berdarah</option> 
													<option value="Keterangan Lain"
													<?php for ($i = 0; $i < count($bab); $i++) {
                                       if($bab[$i] == 'Keterangan Lain') echo 'selected';} ?>>Keterangan Lain</option>       
												</select>
												@endif
												<input class="form-control mt-3" type="text" placeholder="Keterangan Lain" name="ket_bab" value="{{$t->ket_bab}}">
											</div>
										</div>
									</div>
									<div class="col-md-6 mt-3">
										<div class="row">
										<label for=""></label>
											<div class="col-md-9">
												<label for="">2. Buang air kecil:</label>
												@if($table[0]->bak == 'null')
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
												@else
												@php
													$bak = json_decode($table[0]->bak);
												@endphp
												<select id="bak" name="bak[]" class="form-control" multiple="multiple">
													<option value="Tidak ada keluhan"
													<?php for ($i = 0; $i < count($bak); $i++) {
                                       if($bak[$i] == 'Tidak ada keluhan') echo 'selected';} ?>>Tidak ada keluhan</option>
													<option value="Oligouria"
													<?php for ($i = 0; $i < count($bak); $i++) {
                                       if($bak[$i] == 'Oligouria') echo 'selected';} ?>>Oligouria</option>
													<option value="Poliuria"
													<?php for ($i = 0; $i < count($bak); $i++) {
                                       if($bak[$i] == 'Poliuria') echo 'selected';} ?>>Poliuria</option>
													<option value="Disuria"
													<?php for ($i = 0; $i < count($bak); $i++) {
                                       if($bak[$i] == 'Disuria') echo 'selected';} ?>>Disuria</option>
													<option value="Hematuri"
													<?php for ($i = 0; $i < count($bak); $i++) {
                                       if($bak[$i] == 'Hematuri') echo 'selected';} ?>>Hematuri</option>
													<option value="Nokturia"
													<?php for ($i = 0; $i < count($bak); $i++) {
                                       if($bak[$i] == 'Nokturia') echo 'selected';} ?>>Nokturia</option> 
													<option value="Inkontinensi"
													<?php for ($i = 0; $i < count($bak); $i++) {
                                       if($bak[$i] == 'Inkontinensi') echo 'selected';} ?>>Inkontinensi</option> 
													<option value="Keterangan Lain"
													<?php for ($i = 0; $i < count($bak); $i++) {
                                       if($bak[$i] == 'Keterangan Lain') echo 'selected';} ?>>Keterangan Lain</option>       
												</select>
												@endif
												<input class="form-control mt-3" type="text" placeholder="Keterangan Lain" name="ket_bak" value="{{$t->ket_bak}}">
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
													<option value="{{$t->sulit_tidur}}">{{$t->sulit_tidur}}</option>
													<option value="Tidak">Tidak</option>
													<option value="Ya">Ya, diatasi dengan</option>
												</select>
												<input class="form-control mt-3" type="text" placeholder="Keterangan Lain" name="ket_sulittidur" value="{{$t->ket_sulittidur}}">
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
														<option value="{{$t->ketergantungan}}">{{$t->ketergantungan}}</option>
														<option value="Tidak">Tidak</option>
														<option value="Ya">Ya, Nama Obat</option>
													</select>
													<input class="form-control mt-3" type="text" placeholder="Keterangan Lain" name="ket_ketergantungan" value="{{$t->ket_ketergantungan}}">
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 mt-1">
										<div class="row">
										<label for=""></label>
											<div class="col-md-9">
												<label for="">3. Rata - rata tidur sehari:</label>
												<input class="form-control" type="text" name="rata_tidur" value="{{$t->rata_tidur}}">
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
														<option value="{{$t->keperawatan}}">{{$t->keperawatan}}</option>
														<option value="Gangguan pola tidur">Gangguan Pola Tidur</option>
														<option value="Keterangan Lain">Keterangan Lain</option>
													</select>
													<input class="form-control mt-3" type="text" placeholder="Keterangan Lain" name="ket_keperawatan" value="{{$t->ket_keperawatan}}">
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 mt-3">
										<div class="row">
										<label for=""></label>
											<div class="col-md-9">
													<label for=""><b>Riwayat Alergi</b></label>
														<select class="form-select" id="validationCustom04" required="" name="alergi">
															<option value="{{$t->alergi}}">{{$t->alergi}}</option>
															<option value="Makanan">Makanan</option>
															<option value="Obat">Obat</option>
															<option value="Lainnya">Lainnya</option>
														</select>
													
													<input class="form-control mt-3" type="text" placeholder="Keterangan Lain" name="ket_alergi" value="{{$t->ket_alergi}}">
													
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
			@endforeach
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