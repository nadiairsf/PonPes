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
<h3>Data Hafalan</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Capaian</li>
<li class="breadcrumb-item active">Data Hafalan</li>
@endsection

@section('content')
<div class="container-fluid">
<div class="row">
   <div class="col-sm-6">
      <div class="card">
      <div class="card-header">
      @foreach ($data as $d )
         <a href="/admin/capaian/listSantri/{{$d->kelas}}">
            <button class="btn btn-secondary" >
               <span>Kembali Data Siswa</span>
            </button> 
         </a>
      @endforeach
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
      <div class="card-body">
         <div class="dt-ext table-responsive">
            <div id="custom-button_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
               <div class="dt-buttons btn-group">
                  <button class="btn btn-primary" tabindex="0" aria-controls="custom-button"  data-bs-toggle="modal" data-bs-target="#exampleModalfat" data-whatever="@mdo">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
                     <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                     <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
                     </svg>
                     <span>Tambah Hafalan</span>
                  </button> 
               </div>
               @foreach ($data as $d )
               <div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel2">Tambah Hafalan</h5>
                           <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <form class="card" action="/admin/capaian/hafalan/create/{{$d->id}}" method="post" >
                           @csrf
					            {{ csrf_field() }}
                              <div class="mb-3">
                                 <label class="col-form-label" for="message-text">Keterangan Hafalan</label>
                                 <input class="form-control" id="message-text" name="ket">
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
               @endforeach

               <div id="custom-button_filter" class="dataTables_filter">
                  <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="custom-button" data-bs-original-title="" title=""></label>
               </div>
              
               <table class="display dataTable" id="custom-button" role="grid" aria-describedby="custom-button_info">
                  <thead>
                  <tr>
                     <th>No</th>
                     <th>tanggal</th>
                     <th>Hafalan</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               @php
                  $no=1;
               @endphp
             @foreach ($table as $t )
               <tbody>
                  <tr>
                     <td>{{$no++}}</td>
                     <td>{{date('d-m-y', strtotime($t->created_at))}}</td>
                     <td>{{$t->ket}}</td>
                     <td>
                     <a href="/admin/capaian/prestasi/hapus/{{$t->id}}" class="button delete-confirm">
                        <button class="btn btn-secondary">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                              <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                           </svg>
                        </button> 
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection