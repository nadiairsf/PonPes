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
<li class="breadcrumb-item active">Detail Nilai</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-xl-9">
			<div class="row">
				<div class="col-sm-12">
            <div class="card">
                  <div class="card-header">
                    <h5>Data Nilai</h5>
                  </div>
                  @if (Session::get('success'))
                  <div class="alert alert-success inverse alert-dismissible fade show" role="alert"><i class="icon-thumb-up alert-center"></i>
                     <p><b>Berhasil </b>{{ Session::get('success') }}</p>
                     <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                  </div>
                  @endif
                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                     {{ Session::get('fail') }}
                  </div>
                  @endif
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
                            <div class="col-sm-1">
                            <label class=" col-form-label">Edit</label>
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
                              <input class="form-control" type="text" data-bs-original-title="" title="" name="tg1[]" value="{{ $d->tg1 }}">
                            </div>
                            <div class="col-sm-1">
                              <input class="form-control" type="text" data-bs-original-title="" title="" name="tg2[]" value="{{ $d->tg2 }}">
                            </div>
                            <div class="col-sm-1">
                              <input class="form-control" type="text" data-bs-original-title="" title="" name="tg3[]" value="{{ $d->tg3 }}">
                            </div>
                            <div class="col-sm-1">
                              <input class="form-control" type="text" data-bs-original-title="" title="" name="ph1[]" value="{{ $d->ph1 }}">
                            </div>
                            <div class="col-sm-1">
                              <input class="form-control" type="text" data-bs-original-title="" title="" name="ph2[]" value="{{ $d->ph2 }}">
                            </div>
                            <div class="col-sm-1">
                              <input class="form-control" type="text" data-bs-original-title="" title="" name="ph3[]" value="{{ $d->ph3 }}">
                            </div>
                            <div class="col-sm-2">
                              <input class="form-control" type="text" data-bs-original-title="" title="" name="final[]" value="{{ $d->final }}">
                            </div>
                            <div class="col-sm-1">
                              <a href="/admin/capaian/edit-nilai/{{$d->id}}">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                 </svg>
                              </a>
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