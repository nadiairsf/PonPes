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
<li class="breadcrumb-item">Keluhan Kesakitan</li>
<li class="breadcrumb-item active">Tambah Keluhan Kesakitan</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="edit-profile">
		<div class="row">
			<div class="col-xl-12">
            <form class="card" action="{{ route('admin.createPria') }}" method="post" >
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
                           <input type="text" name="id_santris" id="" value="{{$id}}" hidden>
									<input class="form-control" rows="5" name="riwayat_konsumsi" value="{{ old('riwayat_konsumsi') }}" ></input>
                           <span class="text-danger">@error('riwayat_konsumsi'){{ $message }}@enderror</span>
								</div>
							</div>
                     <div class="col-md-4 mt-2">
								<div class="mb-3">
									<label class="form-label">Makanan Terakhir yang dikonsumsi ( < 6 Jam)</label>
									<input class="form-control" rows="5" name="makanan_terakhir" value="{{ old('makanan_terakhir') }}"  ></input>
								</div>
							</div>
                     <div class="col-md-4 mt-2">
								<div class="mb-3">
									<label class="form-label">Minuman Terakhir yang dikonsumsi ( < 6 Jam)</label>
									<input class="form-control" rows="5" name="minuman_terakhir" value="{{ old('minuman_terakhir') }}" ></input>
								</div>
							</div>
                     <div class="col-sm-12 col-md-12 mt-3">
								<div class="mb-0">
									<label class="form-label"><b>Keluhan / Anamnesa</b></label>
                           <span class="text-danger">@error('keluhan'){{ $message }}@enderror</span>
								</div>
							</div>
                     <div class="col-md-6 mt-2">
								<div class="mb-3">
                        <label class="form-label">Keluahan</label>
                        <select id="keluhan" name="keluhan[]" class="form-control" multiple="multiple">
                           <option value="batuk">Batuk</option>
                           <option value="pusing">Pusing</option>
                           <option value="sakit kepala berputar">Sakit Kepala Berputar</option>
                           <option value="gatal - gatal">Gatal - gatal</option>        
                           <option value="bintik kemerahan">Bintik Kemerahan</option>
                           <option value="nyeri pada persendian">Nyeri Pada Persendian</option>
                           <option value="panas/demam">Panas/Demam</option>       
                           <option value="pilek/ hidung tersumbat">Pilek/Hidung Tersumbat</option>
                           <option value="sakit ternggorokan">Sakit Tenggorokan</option>
                           <option value="menggigil">Menggigil</option>
                           <option value="sakit perut">Sakit Perut</option>
                           <option value="diare">Diare</option>
                           <option value="sembelit">Sembelit</option>
                        </select>
								</div>
							</div>
                     <div class="col-md-4 mt-2">
								<div class="mb-3">
									
								</div>
							</div>
                     <div class="col-md-6 mb-2">
								<div>
									<label class="form-label">Lainnya</label>
									<textarea class="form-control" rows="3" name="ket_keluhan" value="{{ old('ket_keluhan') }}"></textarea>
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
                           <span class="text-danger">@error('kondisi_umum'){{ $message }}@enderror</span>
                           <select id="kondisi_umum" name="kondisi_umum[]" class="form-select" multiple="multiple">
                              <option value="baik">Baik</option>
                              <option value="tampak sakit">Tampak Sakit</option>
                              <option value="sesak">Sesak</option>
                              <option value="pucat">Pucat</option>        
                              <option value="lemah">Lemah</option>
                              <option value="kejang">Kejang</option>
                           </select>
                        </div>
							</div>
                     <div class="col-sm-6 col-md-6">
								<div class="mb-3">
                           
                        </div>
							</div>
                     <div class="col-sm-6 col-md-6">
                        <div>
									<label class="form-label">Lainnya</label>
									<textarea class="form-control" rows="3" name="ket_kondisi" value="{{ old('ket_kondisi') }}"></textarea>
								</div>
							</div>
                    
                    <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12 mt-2">
                              <div>
                                 <label class="form-label"><b><h6>Kesehatan Reproduksi (Khusus Laki - laki)</h6></b></label>
                              </div>
                           </div>
                           <div class="container-fluid">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="row">
                                    <label for="">Perubahan Fisik pada Bagian Reporoduksi</label>        
                                    <span class="text-danger">@error('fisik_pria'){{ $message }}@enderror</span>     
                                       <div class="col-md-12">
                                          <select id="fisik_pria" name="fisik_pria[]" class="form-select" multiple="multiple">
                                             
                                             <option value="terdapat perubahan suara">Terdapat perubahan suara (suara lebih dalam/serak)</option>
                                             <option value="tumbuh kumis/jenggot">Tumbuh kumis/jenggot</option>
                                             <option value="tumbuh jakun">Tumbuh jakun</option>
                                             <option value="tumbuh rambut kemaluan">Tumbuh rambut kemaluan</option>    
                                             <option value="sudah mimpi basah">Sudah mimpi basah </option>    
                                             <option value="memiliki daya tarik dengan lawan jenis">Memiliki daya tarik dengan lawan jenis </option>   
                                             <option value="lainnya">Lainnya</option>     
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="row">
                                    <label for="">Pernah Melakukan Mastrubasi</label>
                                       <div class="col-md-6">
                                          <select name="mastrubasi" id="" class="form-select">
                                             <option value="">Pilih Keluhan</option>
                                             <option value="Ya">Ya</option>
                                             <option value="Tidak">Tidak</option>
                                          </select>
                                          <label for="">Seberapa sering melakukan mastrubasi</label>
                                          <select name="jml_mastrubasi" id="" class="form-select">
                                             <option value="">Pilih Keluhan</option>
                                             <option value="Seminggu 1 kali">Seminggu 1 Kali</option>
                                             <option value="Seminggu lebih 1 kali">Seminggu Lebih 1 Kali</option>
                                          </select>
                                       </div>
                                    </div>
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
                                    <span class="text-danger">@error('gatal'){{ $message }}@enderror</span>
                                       <div class="col-md-6">
                                          <select id="gatal" name="gatal[]" class="form-select mb-3" multiple="multiple">
                                             <option value="tangan">Tangan</option>
                                             <option value="dada">Dada</option>
                                             <option value="belakang punggung">Belakang Punggung</option>
                                             <option value="jari tangan">Jari Tangan</option>    
                                             <option value="selangkangan">Selangkangan</option>    
                                             <option value="betis">Betis</option>   
                                             <option value="jari kaki">Jari Kaki</option> 
                                             <option value="lainnya">Lainnya</option>       
                                          </select>
                                             <textarea class="form-control mt-3" rows="3" placeholder="Keterangan Lainnya" name="ket_gatal" value="{{ old('ket_gatal') }}"></textarea>
                                       </div>
                                       
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="row">
                                    <label for=""></label>
                                       <div class="col-md-6">
                                          <div>
                                             <label class="form-label">Mulai merasakan gatal tersebut saat</label>
                                             <textarea class="form-control" rows="3" name="waktu_gatal" value="{{ old('waktu_gatal') }}"></textarea>
                                          </div>
                                          <div>
                                             <label class="form-label">Lama (dalam hari) merasakan gatal tersebut</label>
                                             <textarea class="form-control" rows="3" name="lama_gatal" value="{{ old('lama_gatal') }}"></textarea>
                                          </div>
                                          <label for="">Gatal tersebut menyebabkan bentuk kulit seperti</label>
                                          <span class="text-danger">@error('bentuk_kulit'){{ $message }}@enderror</span>
                                          <select id="bentuk_kulit" name="bentuk_kulit[]" class="form-select" multiple="multiple">
                                             <option value="kemerahan tidak bersisik">Kemerahan tidak bersisik</option>
                                             <option value="kemereahan dan bersisik">Kemereahan dan bersisik </option>
                                             <option value="kemerahan, bersisik dan berdarah">Kemerahan, bersisik dan berdarah</option>
                                             <option value="bintik bintik">Bintik bintik   </option>    
                                             <option value="putih bersisik">Putih bersisik </option>        
                                          </select>
                                       </div>
                                    </div>
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
				</form>
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
<script>
   $(document).ready(function () {
         $("#fisik_pria").select2({
            placeholder: "Silahkan Pilih Keluahan"
         });
   });
</script>
@endsection