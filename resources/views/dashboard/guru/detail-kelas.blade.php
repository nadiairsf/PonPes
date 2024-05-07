@extends('layouts-guru.simple.master')
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
                     <a href="/guru/nilai/{{$l->id}}">
                        <button class="btn btn-secondary">
                           <span>Data Nilai</span>
                        </button> 
                     </a>
                     <a href="/guru/edit-hafalan/{{$l->id}}">
                        <button class="btn btn-primary">
                           <span>Data Hafalan</span>
                        </button> 
                     </a>
                     <a href="/guru/edit-prestasi/{{$l->id}}">
                        <button class="btn btn-warning">
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