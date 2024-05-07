@extends('layouts.simple.master')
@section('title', 'Edit Profile')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Riwayat Gizi</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Giziku</li>
<li class="breadcrumb-item active">Detail Giziku</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="edit-profile">
		<div class="row">
			<div class="col-xl-12">
            <div class="card">
					<div class="card-body">
						<div class="row">
							@foreach ($data as $d )
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Nama</label>
									<input class="form-control" type="text" value="{{$d->nama}}" disabled>
									<!-- <select class="livesearch form-group" name="livesearch"></select> -->
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Kelas</label>
									<input class="form-control" type="text" value="{{$d->kelaz}}" disabled>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Jenis Kelamin</label>
									<input class="form-control" type="text"value="{{$d->jenis_kelamin}}" disabled>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Tempat Tanggal Lahir</label>
									<input class="form-control" type="text" value="{{$d->tempat_lahir}}, {{$d->tgl_lahir}}" disabled>
								</div>
							</div>
                     <div class="dt-buttons btn-group mb-3">
                        <a href="/admin/diary/detail-generalcheckup/{{$d->id}}">
                        <button class="btn btn-secondary" tabindex="0" aria-controls="custom-button" data-bs-original-title="" title="">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
                           <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                           <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
                           </svg>
                           <span>Cek General Check Up</span>
                        </button> 
                        </a>
                     </div>
							@endforeach
						</div>
					</div>
            </div>
			</div>
		</div>
	</div>
</div>
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
<div class="container-fluid">
<div class="row">
   <div class="col-sm-12">
      <div class="card">
      <div class="card-body">
         <div class="dt-ext table-responsive">
            <div id="custom-button_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            @foreach ($data as $d )
               <div class="dt-buttons btn-group mb-3">
                  <a href="/admin/diary/tambah-asupan/{{$d->id}}">
                  <button class="btn btn-primary" tabindex="0" aria-controls="custom-button" data-bs-original-title="" title="">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
                     <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                     <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
                     </svg>
                     <span>Tambah Riwayat Giziku</span>
                  </button> 
                  </a>
               </div>
				@endforeach
               <table class="display dataTable" id="custom-button" role="grid" aria-describedby="custom-button_info">
                  <thead>
                  <tr>
                     <th>No</th>
							<th>Tanggal</th>
                     <th>Berapa Kali Makan & Jajan</th>
							<th>Aksi</th>
                  </tr>
               </thead>
               @php $no = 1; @endphp
               @foreach ($table as $t )
               <tbody>
                  <tr>
                     <td>{{ $no++ }}</td>
                     <td>{{ date('d-m-y', strtotime($t->date)) }}</td>
                     <td>{{  $t->views  }}x Makan / Jajan</td>
                   
                     <td>
                     <a href="/admin/diary/detail-asupan/{{$d->id}}/{{ date('Y-m-d', strtotime($t->date)) }}">
                     <button class="btn btn-info btn-sm" tabindex="0" aria-controls="custom-button" data-bs-original-title="" title="">
                        <span>Detail</span>
                     </button> 
                     </a></td>
                  </tr>
               </tbody> 
               @endforeach
            </table>
         </div>
         </div>
      </div>
      </div>
   </div>
</div>
</div>
@endsection

@section('script')

@endsection