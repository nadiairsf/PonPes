@extends('layouts-wali.simple.master')
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
<li class="breadcrumb-item">Keluhan Kesakitan</li>
<li class="breadcrumb-item active">Tambah Keluhan Kesakitan</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="edit-profile">
		<div class="row">
			<div class="col-xl-12">
            @foreach ($data as $d )
            <form class="card" action="/admin/diary/update-keluhan-wanita/{{$d->id}}" method="post" >
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
						<h4 class="card-title mb-0">Tambah Keluhan Kesakitan</h4>
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
						<div class="row">
                     <div class="col-md-4 mt-2">
								<div class="mb-3">
									<label class="form-label">Riwayat Konsumsi</label>
                           <input type="text" name="id_santris" id="" value="{{$d->id}}" hidden>
									<input class="form-control" rows="5" name="riwayat_konsumsi" value="{{ $d->riwayat_konsumsi }}" disabled></input>
                           <span class="text-danger">@error('riwayat_konsumsi'){{ $message }}@enderror</span>
								</div>
							</div>
                     <div class="col-md-4 mt-2">
								<div class="mb-3">
									<label class="form-label">Makanan Terakhir yang dikonsumsi ( < 6 Jam)</label>
									<input class="form-control" rows="5" name="makanan_terakhir" value="{{ $d->makanan_terakhir }}" disabled></input>
								</div>
							</div>
                     <div class="col-md-4 mt-2">
								<div class="mb-3">
									<label class="form-label">Minuman Terakhir yang dikonsumsi ( < 6 Jam)</label>
									<input class="form-control" rows="5" name="minuman_terakhir" value="{{ $d->minuman_terakhir }}" disabled></input>
								</div>
							</div>
                     <div class="col-sm-12 col-md-12 mt-3">
								<div class="mb-0">
									<label class="form-label"><b>Keluhan / Anamnesa</b></label>
			
								</div>
							</div>
                     <div class="col-md-6 mt-2">
								<div class="mb-3">
                        <label class="form-label">Keluahan</label>
                        <input class="form-control" rows="5"  value="{{$d->keluhan}}" disabled>
                        <input class="form-control" rows="5"  name="keluhan[]" value="{{$d->keluhan}}" hidden>
                       
								</div>
							</div>
                     <div class="col-md-4 mt-2">
								<div class="mb-3">
									
								</div>
							</div>
                     <div class="col-md-6 mb-2">
								<div>
									<label class="form-label">Lainnya</label>
									<textarea class="form-control" rows="3" name="ket_keluhan" disabled>{{ $d->ket_keluhan }}</textarea>
								</div>
							</div>
                     <div class="col-md-4 mb-2">
								<div>
									
								</div>
							</div>
                     <div class="col-md-12 mt-2">
								<div>
									<label class="form-label"><b>Pemeriksaan Fisik:</b></label>
									
								</div>
							</div>
                     <div class="col-sm-6 col-md-6">
								<div class="mb-3">
                           <label for="">Kondisi Umum</label>
                           <input class="form-control" rows="5"  value="{{$d->kondisi_umum}}" disabled>
                           <input class="form-control" rows="5"  name="kondisi_umum[]" value="{{$d->kondisi_umum}}" hidden>
                          
                        </div>
							</div>
                     <div class="col-sm-6 col-md-6">
								<div class="mb-3">
                           
                        </div>
							</div>
                     <div class="col-sm-6 col-md-6">
                        <div>
									<label class="form-label">Lainnya</label>
									<textarea class="form-control" rows="3" name="ket_kondisi" disabled>{{ $d->ket_kondisi }}</textarea>
								</div>
							</div>
                     <div class="col-md-12 mt-2">
								<div>
									<label class="form-label"><b><h6>Kesehatan Reproduksi (Khusus Perempuan)</h6></b></label>
									
								</div>
							</div>
   
                    <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="row">
                              <label for=""><b>Nyeri Ketika Haid</b></label>
                                 <div class="col-md-12">
                                    <input class="form-control"  value="{{$d->nyeri_haid}}" disabled>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="row">
                              <label for=""><b>Lama Nyeri Haid</b></label>
                                 <div class="col-md-12">
                                    <input class="form-control"  value="{{$d->lama_nyeri}}" disabled>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="row">
                              <label for=""><b>Lama Haid</b></label>
                                 <div class="col-md-12">
                                    <input class="form-control"  value="{{$d->lama_haid}}" disabled>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="row">
                              <label for=""><b>Warna darah Haid</b></label>
                                 <div class="col-md-12">
                                    <input class="form-control"  value="{{$d->warna_haid}}" disabled>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="row">
                              <label for=""><b>Nyeri pada Payudara</b></label>
                                 <div class="col-md-12">
                                    <input class="form-control"  value="{{$d->nyeri_payudara}}" disabled>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="row">
                              <label for=""><b>Benjolan pada payudara</b></label>
                                 <div class="col-md-12">
                                    <input class="form-control"  value="{{$d->benjolan_payudara}}" disabled>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12"> <label for="" class="mt-3"><b>Keluar cairan dari Vagina</b></label></div>
                           <div class="col-md-6">
                              <div class="row">
                              <label for=""><b>Warna</b></label>
                                 <div class="col-md-6 ">
                                    <input class="form-control"  value="{{$d->warna_cairan}}" disabled>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="row">
                              <label for=""><b>Bau</b></label>
                                 <div class="col-md-6">
                                     <input class="form-control"  value="{{$d->bau_cairan}}" disabled>
                                 </div>
                              </div>
                           </div>
                  
                        
                           <div class="col-md-12 mt-2">
                              <div>
                                 <label class="form-label"><b>Penyakit Kulit</b></label>    
                              </div>
                           </div>
                           <div class="container-fluid">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="row">
                                    <label for="">Gatal pada kulit bagian</label>
                                   
                                       <div class="col-md-6">
                                          <textarea class="form-control mt-3" rows="3" placeholder="Keterangan Lainnya" name="ket_gatal" disabled >{{ $d->gatal }}</textarea>     
                                          <textarea class="form-control mt-3" rows="3" placeholder="Keterangan Lainnya" name="ket_gatal" disabled >{{ $d->ket_gatal }}</textarea>
                                       </div>
                                       
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="row">
                                    <label for=""></label>
                                       <div class="col-md-6">
                                          <div>
                                             <label class="form-label">Mulai merasakan gatal tersebut saat</label>
                                             <textarea class="form-control" rows="3" name="waktu_gatal"disabled >{{ $d->waktu_gatal }}</textarea>
                                          </div>
                                          <div>
                                             <label class="form-label">Lama (dalam hari) merasakan gatal tersebut</label>
                                             <textarea class="form-control" rows="3" name="lama_gatal" disabled>{{ $d->lama_gatal }}</textarea>
                                          </div>
                                          <label for="">Gatal tersebut menyebabkan bentuk kulit seperti</label>
                                          <textarea class="form-control" rows="3" name="lama_gatal" disabled>{{ $d->bentuk_kulit }}</textarea>
                                        
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
   $(document).ready(function () {
         $("#riwayat_konsumsi").select2({
            placeholder: "Silahkan Pilih Keluahan"
         });
   });
</script>
<script>
   $(document).ready(function () {
         $("#kondisi_umum").select2({
            placeholder: "Silahkan Pilih Keluahan"
         });
   });
</script>
<script>
   $(document).ready(function () {
         $("#nyeri_haid").select2({
            placeholder: "Silahkan Pilih Keluahan"
         });
   });
</script>
<script>
   $(document).ready(function () {
         $("#warna_haid").select2({
            placeholder: "Silahkan Pilih Keluahan"
         });
   });
</script>
<script>
   $(document).ready(function () {
         $("#lama_nyeri").select2({
            placeholder: "Silahkan Pilih Keluahan"
         });
   });
</script>
<script>
   $(document).ready(function () {
         $("#lama_haid").select2({
            placeholder: "Silahkan Pilih Keluahan"
         });
   });
</script>
<script>
   $(document).ready(function () {
         $("#warna_cairan").select2({
            placeholder: "Silahkan Pilih Keluahan"
         });
   });
</script>
<script>
   $(document).ready(function () {
         $("#keluhan").select2({
            placeholder: "Silahkan Pilih Keluahan"
         });
   });
</script>
<script>
   $(document).ready(function () {
         $("#nyeri_payudara").select2({
            placeholder: "Silahkan Pilih Keluahan"
         });
   });
</script>
<script>
   $(document).ready(function () {
         $("#benjolan_payudara").select2({
            placeholder: "Silahkan Pilih Keluahan"
         });
   });
</script>
<script>
   $(document).ready(function () {
         $("#gatal").select2({
            placeholder: "Silahkan Pilih Keluahan"
         });
   });
</script>
<script>
   $(document).ready(function () {
         $("#bentuk_kulit").select2({
            placeholder: "Silahkan Pilih Keluahan"
         });
   });
</script>
@endsection