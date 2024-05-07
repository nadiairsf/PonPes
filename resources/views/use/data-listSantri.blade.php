@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Data Kelas</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Capaian</li>
<li class="breadcrumb-item active">Data Kelas</li>
@endsection

@section('content')
<!-- <div class="container-fluid">
	<div class="edit-profile">
		<div class="row">
			<div class="col-xl-6">
				<form class="card" action="" method="post" >
					@csrf
					{{ csrf_field() }}
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 ">
								<div class="mb-1">
									<label class="form-label mb-2"><h6>Masukan Santri</h6></label>
                           <select class="livesearch-santri form-control" name="santri"></select>
								</div>
                        <div class="card-footer text-end">
                           <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div> -->

<div class="container-fluid">
<div class="row">
   <div class="col-sm-8">
      <div class="card">
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
      <div class="card-body">
         <div class="dt-ext table-responsive">
            <div id="custom-button_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
               <!-- <div class="dt-buttons btn-group">
                  <button class="btn btn-primary" tabindex="0" aria-controls="custom-button"  data-bs-toggle="modal" data-bs-target="#exampleModalfat" data-whatever="@mdo">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
                     <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                     <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
                     </svg>
                     <span>Tambah Santri</span>
                  </button> 
               </div> -->
               <div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel2">Tambah Santri</h5>
                           <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <form class="card" action="{{ route('admin.createKelas') }}" method="post" >
                           @csrf
					            {{ csrf_field() }}
                              <div class="mb-3">
                                 <label class="col-form-label" for="recipient-name">Tingkatan Kelas</label><br>
                                 <select class="form-select" name="tingkat" id="">
                                    <option value="">Pilih</option>
                                    <option value="VII">VII</option>
                                    <option value="VIII">VIII</option>
                                    <option value="IX">IX</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                 </select>
                              </div>
                              <div class="mb-3">
                                 <label class="col-form-label" for="message-text">Nama Kelas</label>
                                 <input class="form-control" id="message-text" name="name">
                              </div>
                              <div class="mb-3">
                                 <label class="col-form-label" for="message-text">Tahun Ajaran</label>
                                 <input class="form-control" id="message-text" name="tahun">
                              </div>
                        </div>
                        <div class="modal-footer">
                           <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                           <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                        </form>
                     </div>
                  </div>
               </div>

               <div id="custom-button_filter" class="dataTables_filter">
                  <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="custom-button" data-bs-original-title="" title=""></label>
               </div>
              
               <table class="display dataTable" id="custom-button" role="grid" aria-describedby="custom-button_info">
                  <thead>
                  <tr>
                     <th>No</th>
                     <th>NIS</th>
                     <th>Nama</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               @php
                  $no=1;
               @endphp
               @foreach ($list as $l )
               <tbody>
                  <tr>
                     <td>{{$no++}}</td>
                     <td>{{$l->nis}}</td>
                     <td>{{$l->nama}}</td>
                     <td>
                     <a href="/admin/profil/data-santri/detail/{{$l->id}}">
                        <button class="btn btn-success">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                           </svg>
                        </button> 
                     </a>
                     <a href="/admin/capaian/data-nilai/{{$l->id}}">
                        <button class="btn btn-secondary">
                           <span>Data Nilai</span>
                        </button> 
                     </a>
                     <a href="/admin/capaian/tambah-hafalan/{{$l->id}}">
                        <button class="btn btn-secondary">
                           <span>Data Hafalan</span>
                        </button> 
                     </a>
                     <a href="/admin/capaian/tambah-prestasi/{{$l->id}}">
                        <button class="btn btn-secondary">
                           <span>Data Prestasi</span>
                        </button> 
                     </a></td>
                  </tr>
               </tbody> 
               @endforeach
            </table>
            <div class="dataTables_info" id="custom-button_info" role="status" aria-live="polite">Jumlah Data {{ $list->total() }}</div>
            <div class="dataTables_paginate paging_simple_numbers" id="custom-button_paginate">
               <ul class="pagination">
               {!! $list->links() !!}
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection