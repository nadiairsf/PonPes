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
                           <input type="text" name="id_santris" id="" value="{{$d->id_santris}}" hidden>
									<input class="form-control" rows="5" name="riwayat_konsumsi" value="{{ $d->riwayat_konsumsi }}" ></input>
                           <span class="text-danger">@error('riwayat_konsumsi'){{ $message }}@enderror</span>
								</div>
							</div>
                     <div class="col-md-4 mt-2">
								<div class="mb-3">
									<label class="form-label">Makanan Terakhir yang dikonsumsi ( < 6 Jam)</label>
									<input class="form-control" rows="5" name="makanan_terakhir" value="{{ $d->makanan_terakhir }}"></input>
								</div>
							</div>
                     <div class="col-md-4 mt-2">
								<div class="mb-3">
									<label class="form-label">Minuman Terakhir yang dikonsumsi ( < 6 Jam)</label>
									<input class="form-control" rows="5" name="minuman_terakhir" value="{{ $d->minuman_terakhir }}"></input>
								</div>
							</div>
                     <div class="col-sm-12 col-md-12 mt-3">
								<div class="mb-0">
									<label class="form-label"><b>Keluhan / Anamnesa</b></label>
			
								</div>
							</div>
                     <div class="col-md-6 mt-2">
								<div class="mb-3">
                        <label class="form-label">Keluhan</label>
                        @if($data[0]->keluhan == 'null')
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
                        @else
                        @php
                           $kel = json_decode($data[0]->keluhan);
                        @endphp
                        <select id="keluhan" name="keluhan[]" class="form-control" multiple="multiple">
                           <option value="batuk"
                           <?php for ($i = 0; $i < count($kel); $i++) {
                              if($kel[$i] == 'batuk') echo 'selected';} ?>>Batuk
                           </option>
                           <option value="pusing"
                           <?php for ($i = 0; $i < count($kel); $i++) {
                              if($kel[$i] == 'pusing') echo 'selected';} ?>>Pusing</option>
                           <option value="sakit kepala berputar"
                           <?php for ($i = 0; $i < count($kel); $i++) {
                              if($kel[$i] == 'sakit kepala berputar') echo 'selected';} ?>>Sakit Kepala Berputar</option>
                           <option value="gatal - gatal"
                           <?php for ($i = 0; $i < count($kel); $i++) {
                              if($kel[$i] == 'gatal - gatal') echo 'selected';} ?>>Gatal - gatal</option>        
                           <option value="bintik kemerahan"
                           <?php for ($i = 0; $i < count($kel); $i++) {
                              if($kel[$i] == 'bintik kemerahan') echo 'selected';} ?>>Bintik Kemerahan</option>
                           <option value="nyeri pada persendian"
                           <?php for ($i = 0; $i < count($kel); $i++) {
                              if($kel[$i] == 'nyeri pada persendian') echo 'selected';} ?>>Nyeri Pada Persendian</option>
                           <option value="panas/demam"
                           <?php for ($i = 0; $i < count($kel); $i++) {
                              if($kel[$i] == 'panas/demam') echo 'selected';} ?>>Panas/Demam</option>       
                           <option value="pilek/hidung tersumbat"
                           <?php for ($i = 0; $i < count($kel); $i++) {
                              if($kel[$i] == 'pilek/hidung tersumbat') echo 'selected';} ?>>Pilek/Hidung Tersumbat</option>
                           <option value="sakit tenggorokan"
                           <?php for ($i = 0; $i < count($kel); $i++) {
                              if($kel[$i] == 'sakit tenggorokan') echo 'selected';} ?>>Sakit Tenggorokan</option>
                           <option value="menggigil"
                           <?php for ($i = 0; $i < count($kel); $i++) {
                              if($kel[$i] == 'menggigil') echo 'selected';} ?>>Menggigil</option>
                           <option value="sakit perut"
                           <?php for ($i = 0; $i < count($kel); $i++) {
                              if($kel[$i] == 'sakit perut') echo 'selected';} ?>>Sakit Perut</option>
                           <option value="diare"
                           <?php for ($i = 0; $i < count($kel); $i++) {
                              if($kel[$i] == 'diare') echo 'selected';} ?>>Diare</option>
                           <option value="sembelit"
                           <?php for ($i = 0; $i < count($kel); $i++) {
                              if($kel[$i] == 'sembelit') echo 'selected';} ?>>Sembelit</option>
                        </select>
                        @endif
                        
								</div>
							</div>
                     <div class="col-md-4 mt-2">
								<div class="mb-3">
									
								</div>
							</div>
                     <div class="col-md-6 mb-2">
								<div>
									<label class="form-label">Lainnya</label>
									<textarea class="form-control" rows="3" name="ket_keluhan" value="">{{ $d->ket_keluhan }}</textarea>
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
                           @if($data[0]->kondisi_umum == 'null')
                           <select id="kondisi_umum" name="kondisi_umum[]" class="form-select" multiple="multiple">
                              <option value="baik">Baik</option>
                              <option value="tampak sakit">Tampak Sakit</option>
                              <option value="sesak">Sesak</option>
                              <option value="pucat">Pucat</option>        
                              <option value="lemah">Lemah</option>
                              <option value="kejang">Kejang</option>
                           </select>
                           @else
                           @php
                              $kon = json_decode($data[0]->kondisi_umum);
                           @endphp
                           <select id="kondisi_umum" name="kondisi_umum[]" class="form-select" multiple="multiple">
                              <option value="baik" 
                              <?php for ($i = 0; $i < count($kon); $i++) {
                              if($kon[$i] == 'baik') echo 'selected';} ?>>Baik
                              </option>
                              <option value="tamoak sakit" 
                              <?php for ($i = 0; $i < count($kon); $i++) {
                              if($kon[$i] == 'tampak sakit') echo 'selected';} ?>>Tampak Sakit
                              </option>
                              <option value="sesak"
                              <?php for ($i = 0; $i < count($kon); $i++) {
                              if($kon[$i] == 'sesak') echo 'selected';} ?>>Sesak
                              </option>
                              <option value="pucat"
                              <?php for ($i = 0; $i < count($kon); $i++) {
                              if($kon[$i] == 'pucat') echo 'selected';} ?>>Pucat
                              </option>        
                              <option value="lemah"
                              <?php for ($i = 0; $i < count($kon); $i++) {
                              if($kon[$i] == 'lemah') echo 'selected';} ?>>Lemah
                              </option>
                              <option value="kejang"
                              <?php for ($i = 0; $i < count($kon); $i++) {
                              if($kon[$i] == 'kejang') echo 'selected';} ?>>Kejang
                              </option>
                           </select>
                           @endif
                          
                        </div>
							</div>
                     <div class="col-sm-6 col-md-6">
								<div class="mb-3">
                           
                        </div>
							</div>
                     <div class="col-sm-6 col-md-6">
                        <div>
									<label class="form-label">Lainnya</label>
									<textarea class="form-control" rows="3" name="ket_kondisi" value="">{{ $d->ket_kondisi }}</textarea>
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
                                    <select  name="nyeri_haid" class="form-select" >
                                       <option value="{{$d->nyeri_haid}}">{{$d->nyeri_haid}}</option>
                                       <option value="Tidak ada nyeri">Tidak ada nyeri</option>
                                       <option value="Sebelum Haid">Sebelum Haid</option>
                                       <option value="Ketika Haid">Ketika Haid</option>
                                       <option value="Setelah Haid">Setelah Haid</option>        
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="row">
                              <label for=""><b>Lama Nyeri Haid</b></label>
                                 <div class="col-md-12">
                                    <select  name="lama_nyeri" class="form-select">
                                       <option value="{{$d->lama_nyeri}}">{{$d->lama_nyeri}}</option>
                                       <option value="Tidak ada nyeri">Tidak ada nyeri</option>
                                       <option value="1-3 Hari">1-3 Hari</option>
                                       <option value="4-7 Hari">4-7 Hari</option>
                                       <option value="Lebih dari 7 Hari">Lebih dari 7 Hari</option>        
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="row">
                              <label for=""><b>Lama Haid</b></label>
                                 <div class="col-md-12">
                                    <select  name="lama_haid" class="form-select" >
                                       <option value="{{$d->lama_haid}}">{{$d->lama_haid}}</option>
                                       <option value="Kurang dari 3 Hari">Kurang dari 3 Hari</option>
                                       <option value="Kurang dari 7 Hari">Kurang dari 7 Hari</option>
                                       <option value="7-14 Hari">7-14 Hari</option>
                                       <option value="Lebih dari 14 Hari">Lebih dari 14 Hari</option> 
                                       <option value="Tidak Haid">Tidak Haid</option>        
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="row">
                              <label for=""><b>Warna darah Haid</b></label>
                                 <div class="col-md-12">
                                    <select  name="warna_haid" class="form-select" >
                                       <option value="{{$d->warna_haid}}">{{$d->warna_haid}}</option>
                                       <option value="Warna Kehitaman">Warna Kehitaman</option>
                                       <option value="Merah Muda">Merah Muda</option>
                                       <option value="Merah Menyala">Merah Menyala</option>
                                       <option value="Darah Coklat">Darah Coklat</option>     
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="row">
                              <label for=""><b>Nyeri pada Payudara</b></label>
                                 <div class="col-md-12">
                                 <select  name="nyeri_payudara" class="form-select" >
                                       <option value="{{$d->nyeri_payudara}}">{{$d->nyeri_payudara}}</option>
                                       <option value="Tidak ada nyeri">Tidak ada nyeri</option>
                                       <option value="Ada nyeri menjalar pada payudara">Ada nyeri menjalar pada payudara</option>
                                       <option value="Ada nyeri menusuk pada payudara">Ada nyeri menusuk pada payudara</option>
                                       <option value="Ada nyeri menyebar pada payudara">Ada nyeri menyebar pada payudara</option>     
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="row">
                              <label for=""><b>Benjolan pada payudara</b></label>
                                 <div class="col-md-12">
                                    <select  name="benjolan_payudara" class="form-select">
                                       <option value="{{$d->benjolan_payudara}}">{{$d->benjolan_payudara}}</option>
                                       <option value="Tidak ada benjolan">Tidak ada benjolan</option>
                                       <option value="Ada benjolan pada payudara">Ada benjolan pada payudara</option>     
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12"> <label for="" class="mt-3"><b>Keluar cairan dari Vagina</b></label></div>
                           <div class="col-md-6">
                              <div class="row">
                              <label for=""><b>Warna</b></label>
                                 <div class="col-md-6 ">
                                    <select  name="warna_cairan" class="form-select">
                                       <option value="{{$d->warna_cairan}}">{{$d->warna_cairan}}</option>
                                       <option value="Jernih">Jernih</option>
                                       <option value="Putih Susu">Putih Susu</option>
                                       <option value="Merah Kecoklatan">Merah Kecoklatan</option>
                                       <option value="Kuning Pucat / Kehijauan">Kuning Pucat / Kehijauan</option>    
                                       <option value="Merah Muda / Pink">Merah Muda / Pink</option>    
                                       <option value="Abu - abu">Abu - abu</option>     
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="row">
                              <label for=""><b>Bau</b></label>
                                 <div class="col-md-6">
                                    <select name="bau_cairan"  class="form-select">
                                       <option value="{{$d->bau_cairan}}">{{$d->bau_cairan}}</option>
                                       <option value="Tidak Berbau">Tidak Berbau</option>
                                       <option value="Berbau">Berbau</option>
                                    </select>
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
                                    @if($data[0]->gatal == 'null')
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
                                          <textarea class="form-control mt-3" rows="3" placeholder="Keterangan Lainnya" name="ket_gatal" value="{{ old('ket_gatal') }}" ></textarea>
                                    </div>
                                    @else
                                    @php
                                       $gat = json_decode($data[0]->gatal);
                                    @endphp
                                    <div class="col-md-6">
                                       <select id="gatal" name="gatal[]" class="form-select mb-3" multiple="multiple">
                                          <option value="tangan"
                                          <?php for ($i = 0; $i < count($gat); $i++) {
                                          if($gat[$i] == 'tangan') echo 'selected';} ?>>Tangan</option>
                                          <option value="dada"
                                          <?php for ($i = 0; $i < count($gat); $i++) {
                                          if($gat[$i] == 'dada') echo 'selected';} ?>>Dada</option>
                                          <option value="belakang punggung"
                                          <?php for ($i = 0; $i < count($gat); $i++) {
                                          if($gat[$i] == 'belakang punggung') echo 'selected';} ?>>Belakang Punggung</option>
                                          <option value="jari tangan"
                                          <?php for ($i = 0; $i < count($gat); $i++) {
                                          if($gat[$i] == 'jari tangan') echo 'selected';} ?>>Jari Tangan</option>    
                                          <option value="selangkangan"
                                          <?php for ($i = 0; $i < count($gat); $i++) {
                                          if($gat[$i] == 'selangkangan') echo 'selected';} ?>>Selangkangan</option>    
                                          <option value="betis"
                                          <?php for ($i = 0; $i < count($gat); $i++) {
                                          if($gat[$i] == 'betis') echo 'selected';} ?>>Betis</option>   
                                          <option value="jari kaki"
                                          <?php for ($i = 0; $i < count($gat); $i++) {
                                          if($gat[$i] == 'jari kaki') echo 'selected';} ?>>Jari Kaki</option> 
                                          <option value="lainnya"
                                          <?php for ($i = 0; $i < count($gat); $i++) {
                                          if($gat[$i] == 'lainnya') echo 'selected';} ?>>Lainnya</option>     
                                       </select>
                                          <textarea class="form-control mt-3" rows="3" placeholder="Keterangan Lainnya" name="ket_gatal" value="{{ $d->ket_gatal }}" >{{ $d->ket_gatal }}</textarea>
                                    </div>
                                    @endif
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="row">
                                    <label for=""></label>
                                       <div class="col-md-6">
                                          <div>
                                             <label class="form-label">Mulai merasakan gatal tersebut saat</label>
                                             <textarea class="form-control" rows="3" name="waktu_gatal" value="" >{{ $d->waktu_gatal }}</textarea>
                                          </div>
                                          <div>
                                             <label class="form-label">Lama (dalam hari) merasakan gatal tersebut</label>
                                             <textarea class="form-control" rows="3" name="lama_gatal" value="">{{ $d->lama_gatal }}</textarea>
                                          </div>
                                          <label for="">Gatal tersebut menyebabkan bentuk kulit seperti</label>
                                          @if($data[0]->bentuk_kulit == 'null')
                                          <select id="bentuk_kulit" name="bentuk_kulit[]" class="form-select" multiple="multiple">
                                             <option value="kemerahan tidak bersisik">Kemerahan tidak bersisik</option>
                                             <option value="kemereahan dan bersisik">Kemereahan dan bersisik </option>
                                             <option value="kemerahan, bersisik dan berdarah">Kemerahan, bersisik dan berdarah</option>
                                             <option value="bintik bintik ">Bintik bintik   </option>    
                                             <option value="putih bersisik">Putih bersisik </option>        
                                          </select>
                                          @else
                                          @php
                                          $ben = json_decode($data[0]->bentuk_kulit);
                                          @endphp
                                          <select id="bentuk_kulit" name="bentuk_kulit[]" class="form-select" multiple="multiple">
                                             <option value="kemerahan tidak bersisik"
                                             <?php for ($i = 0; $i < count($ben); $i++) {
                                             if($ben[$i] == 'kemerahan tidak bersisik') echo 'selected';} ?>>Kemerahan tidak bersisik</option>
                                             <option value="kemereahan dan bersisik"
                                             <?php for ($i = 0; $i < count($ben); $i++) {
                                             if($ben[$i] == 'kemereahan dan bersisik') echo 'selected';} ?>>Kemereahan dan bersisik </option>
                                             <option value="kemerahan, bersisik dan berdarah"
                                             <?php for ($i = 0; $i < count($ben); $i++) {
                                             if($ben[$i] == 'kemerahan, bersisik dan berdarah') echo 'selected';} ?>>Kemerahan, bersisik dan berdarah</option>
                                             <option value="bintik bintik"
                                             <?php for ($i = 0; $i < count($ben); $i++) {
                                             if($ben[$i] == 'bintik bintik') echo 'selected';} ?>>Bintik bintik   </option>    
                                             <option value="putih bersisik"
                                             <?php for ($i = 0; $i < count($ben); $i++) {
                                             if($ben[$i] == 'putih bersisik') echo 'selected';} ?>>Putih bersisik </option>        
                                          </select>  
                                          @endif
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