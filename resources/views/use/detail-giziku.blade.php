@extends('layouts.simple.master')
@section('title', 'Edit Profile')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Diary Sehatku</h3>
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
							<div class="col-sm-6 col-md-4">
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
                     <div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">IMT</label>
									<input class="form-control" type="text" value="{{$d->imt}}" disabled>
								</div>
							</div>
							<div class="col-sm-6 col-md-4">
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
                     <div class="col-sm-6 col-md-2">
								<div class="mb-3">
									<label class="form-label">Tinngi Badan</label>
									<input class="form-control" type="text" value="{{$d->tinggi_badan}}" disabled>
								</div>
							</div>
                     <div class="col-sm-6 col-md-2">
								<div class="mb-3">
									<label class="form-label">Tinngi Badan</label>
									<input class="form-control" type="text" value="{{$d->berat_badan}}" disabled>
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
<div class="row">
   <div class="col-sm-12">
      <div class="card">
      <div class="card-body">
         <div class="dt-ext table-responsive">
            <div id="custom-button_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
               
               <div class="dt-buttons btn-group mb-3">
                  <a href="/admin/diary/viewtambah-giziku/{{$d->id}}">
                  <button class="btn btn-primary" tabindex="0" aria-controls="custom-button" data-bs-original-title="" title="">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
                     <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                     <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
                     </svg>
                     <span>Tambah Data Giziku</span>
                  </button> 
                  </a>
               </div>

               <div class="dt-buttons btn-group mb-3">
                  <a href="/admin/diary/data-asupan/{{$d->id}}">
                  <button class="btn btn-light" style="color:black;" tabindex="0" aria-controls="custom-button" data-bs-original-title="" title="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-list" viewBox="0 0 16 16">
                        <path d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z"/>
                        </svg>
                     <span>Riwayat Giziku</span>
                  </button> 
                  </a>
               </div>
					
               <table class="display dataTable" id="custom-button" role="grid" aria-describedby="custom-button_info">
                  <thead>
                  <tr>
                     <th>No</th>
							<th>Tanggal</th>
                     <th>Perubahan</th>
                     <th>Gastrointestinal</th>
                     <th>Rata - rata tidur</th>
                     <th>Sulit Tidur</th>
                     <th>Ketergantungan</th>
                     <th>Keperawatan</th>
                     <th>Asupan</th>
                     <th>Alergi</th>
							<th>Aksi</th>
                  </tr>
               </thead>
               @php $no = 1; @endphp
               @foreach ($table as $t)
               <tbody>
                  <tr>
                     <td>{{ $no++ }}</td>
							<td>{{ date('d-m-y', strtotime($t->created_at)) }}</td>
                     <td>{{ $t->perubahan}}</td>
                     <td>{{ $t->gastrointestinal }}</td>
                     <td>{{ $t->rata_tidur }}</td>
                     <td>{{ $t->sulit_tidur	 }}</td>
                     <td>{{ $t->ketergantungan }}</td>
                     <td>{{ $t->keperawatan}}</td>
                     <td>{{ $t->asupan }}</td>
                     <td>{{ $t->alergi }}</td>
                     <td>
                     <a href="/admin/diary/edit-giziku/{{$t->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                           <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                           <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                     </a>
                     <a href="/admin/diary/hapus-giziku/{{$t->id}}" class="button delete-confirm">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                     </svg>
                     </a>
                     </td>
                  </tr>
               </tbody> 
               @endforeach
            </table>
            <div class="dataTables_info" id="custom-button_info" role="status" aria-live="polite">Jumlah Data {{ $table->total() }}</div>
            <div class="dataTables_paginate paging_simple_numbers" id="custom-button_paginate">
               <ul class="pagination">
               {!! $table->links() !!}
               </ul>
            </div>
         </div>
         </div>
      </div>
      </div>
   </div>
</div>
</div>
@endsection

@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
   $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Apakah Anda yakin?',
        text: 'Data ini akan dihapus permanen!',
        icon: 'warning',
        buttons: ["Batal", "Hapus!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>
@endsection