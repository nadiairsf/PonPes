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
<h3>Capaian</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Capaian</li>
<li class="breadcrumb-item active">Jadwal Pelajaran</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-xl-9">
			<div class="row">
				<div class="col-sm-12">
            <div class="card">
                 
                  <form class="form theme-form"  action="#" method="post">
                  @csrf
                  {{ csrf_field() }}
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
   
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><b>Kategori Nilai</b></label>
                            <div class="col-sm-4">
                             @foreach ($kategori as $k )
                             <input class="form-control" type="text" placeholder="{{$k->nama}} {{$k->tahun}}">
                             @endforeach
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Mata Pelajaran</label>
                            <div class="col-sm-1">
                               <label class=" col-form-label">TGS 1</label>
                            </div>
                            <div class="col-sm-1">
                               <label class=" col-form-label">TGS 2</label>
                            </div>
                            <div class="col-sm-1">
                               <label class=" col-form-label">TGS 3</label>
                            </div>
                            <div class="col-sm-1">
                               <label class=" col-form-label">PH 1</label>
                            </div>
                            <div class="col-sm-1">
                               <label class=" col-form-label">PH 2</label>
                            </div>
                            <div class="col-sm-1">
                               <label class=" col-form-label">PH 3</label>
                            </div>
                            <div class="col-sm-2">
                            <label class=" col-form-label">UTS / UAS</label>
                            </div>
                        </div>
                        @foreach ($nilai as $d )
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">{{$d->mapel}}</label>
                            <input class="form-control" type="text" data-bs-original-title="" title="" value="{{$d->id_mapel}}" name="id_mapel[]" hidden>
                         
                            <input class="form-control" type="text" data-bs-original-title="" title="" value="{{$id}}" name="id_santri[]" hidden>
                         
                            @foreach ($kategori as $k )
                            <input class="form-control" type="text" data-bs-original-title="" title="" value="{{$k->id}}" name="id_kat[]" hidden>
                            @endforeach
                            <div class="col-sm-1">
                              <input class="form-control" type="text" data-bs-original-title="" title="" name="tg1[]" value="{{ $d->tg1 }}" disabled>
                            </div>
                            <div class="col-sm-1">
                              <input class="form-control" type="text" data-bs-original-title="" title="" name="tg2[]" value="{{ $d->tg2 }}" disabled>
                            </div>
                            <div class="col-sm-1">
                              <input class="form-control" type="text" data-bs-original-title="" title="" name="tg3[]" value="{{ $d->tg3 }}" disabled>
                            </div>
                            <div class="col-sm-1">
                              <input class="form-control" type="text" data-bs-original-title="" title="" name="ph1[]" value="{{ $d->ph1 }}" disabled>
                            </div>
                            <div class="col-sm-1">
                              <input class="form-control" type="text" data-bs-original-title="" title="" name="ph2[]" value="{{ $d->ph2 }}" disabled>
                            </div>
                            <div class="col-sm-1">
                              <input class="form-control" type="text" data-bs-original-title="" title="" name="ph3[]" value="{{ $d->ph3 }}" disabled>
                            </div>
                            <div class="col-sm-2">
                              <input class="form-control" type="text" data-bs-original-title="" title="" name="final[]" value="{{ $d->final }}" disabled>
                            </div>
                        </div>
                        @endforeach
                          
                          
                          
                        </div>
                      </div>
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