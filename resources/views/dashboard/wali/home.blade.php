@extends('layouts-wali.simple.master')
@section('title', 'Chart')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/prism.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Dashboard</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Sistem Informasi</li>
<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
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
<div class="container-fluid">
	<div class="edit-profile">
		<div class="row">
			<div class="col-xl-6">
				<div class="card">
					<div class="card-body">
						<div class="row">
							@foreach ( $data as $d )
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Nama</label>
									<input class="form-control" type="text" value="{{$d->nama}}" disabled>
									<!-- <select class="livesearch form-group" name="livesearch"></select> -->
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Kelas</label>
									<input class="form-control" type="text" value="{{$d->kelas}}" disabled>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Jenis Kelamin</label>
									<input class="form-control" type="text"value="{{$d->jenis_kelamin}}" disabled>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Tempat Tanggal Lahir</label>
									<input class="form-control" type="text" value="{{$d->tempat_lahir}}, {{$d->tgl_lahir}}" disabled>
								</div>
							</div>
                     @endforeach
						</div>
					</div>
            </div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
   <!-- Chart widget top Start-->
   <?php
   $id =  Auth::id();
   $countg = DB::table('walis')->where('walis.id',$id)
           ->join('santris','walis.id_santri','=','santris.id')
           ->join('data_santris','santris.id','=','data_santris.id_santris')
           ->join('general_checks','data_santris.id','=','general_checks.id_santris')
           ->count();
   ?>

   <?php
   $id =  Auth::id();
   $countk =  DB::table('walis')->where('walis.id',$id)
           ->join('santris','walis.id_santri','=','santris.id')
           ->join('data_santris','santris.id','=','data_santris.id_santris')
           ->join('keluhans','data_santris.id','=','keluhans.id_santris')
           ->count();
   ?>

   <?php
   $id =  Auth::id();
   $countz = DB::table('walis')->where('walis.id',$id)
           ->join('santris','walis.id_santri','=','santris.id')
           ->join('data_santris','santris.id','=','data_santris.id_santris')
           ->join('gizikus','data_santris.id','=','gizikus.id_santris')
           ->count();
   ?>
   <div class="row">
      <div class="col-sm-6 col-xl-3 col-lg-6">
         <div class="card o-hidden">
         <div class="bg-primary b-r-4 card-body">
            <div class="media static-top-widget">
               <div class="align-self-center text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg></div>
               <div class="media-body"><span class="m-0">General Check Up</span>
               <h4 class="mb-0 counter"> {{$countg}}</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database icon-bg"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
               </div>
            </div>
         </div>
         </div>
      </div>
      <div class="col-sm-6 col-xl-3 col-lg-6">
         <div class="card o-hidden">
         <div class="bg-secondary b-r-4 card-body">
            <div class="media static-top-widget">
               <div class="align-self-center text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg></div>
               <div class="media-body"><span class="m-0">Keluhan Kesakitan</span>
               <h4 class="mb-0 counter"> {{$countk}}</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus icon-bg"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
               </div>
            </div>
         </div>
         </div>
      </div>
      <div class="col-sm-6 col-xl-3 col-lg-6">
         <div class="card o-hidden">
         <div class="bg-warning b-r-4 card-body">
            <div class="media static-top-widget">
               <div class="align-self-center text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg></div>
               <div class="media-body"><span class="m-0">Giziku</span>
               <h4 class="mb-0 counter"> {{$countz}}</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus icon-bg"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
               </div>
            </div>
         </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/chart/apex-chart/moment.min.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
<script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
<script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
<script src="{{asset('assets/js/chart-widget.js')}}"></script>
@endsection