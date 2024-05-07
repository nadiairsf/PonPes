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
<h3>Data Prestasi</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Capaian</li>
<li class="breadcrumb-item active">Data Prestasi</li>
@endsection

@section('content')
<div class="container-fluid">
<div class="row">
   <div class="col-sm-6">
      <div class="card">
      <div class="card-header">
         @foreach ($data as $d )
         <a href="/guru/detail-kelas/{{$d->kelas}}">
            <button class="btn btn-secondary" >
               <span>Kembali Data Siswa</span>
            </button> 
         </a>
         @endforeach
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
      <div class="card-body">
         <div class="dt-ext table-responsive">
            <div id="custom-button_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
               @foreach ($data as $d )
               <div class="dt-buttons btn-group">
                  <a href="/guru/tambah-nilai/{{$d->id}}">
                  <button class="btn btn-primary">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
                     <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                     <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
                     </svg>
                     <span>Tambah Nilai</span>
                  </button> 
                  </a>
               </div>
               @endforeach

               <div id="custom-button_filter" class="dataTables_filter">
                  <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="custom-button" data-bs-original-title="" title=""></label>
               </div>
              
               <table class="display dataTable" id="custom-button" role="grid" aria-describedby="custom-button_info">
                  <thead>
                  <tr>
                     <th>No</th>
                     <th>Tanggal</th>
                     <th>Nilai</th>
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
                     <td>{{$t->tahun}} {{$t->nama}} </td>
                     <td>
                     <a href="/guru/detail-nilai/{{$t->id_santri}}/{{$t->kat}}" >
                        <button class="btn btn-primary">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                           </svg>
                        </button> 
                     </a>
                     <a href="/guru/hapus-nilai/{{$t->id_santri}}/{{$t->kat}}"" class="button delete-confirm">
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
            <!-- <div class="dataTables_info" id="custom-button_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div>
            <div class="dataTables_paginate paging_simple_numbers" id="custom-button_paginate">
               <ul class="pagination">
                  <li class="paginate_button page-item previous disabled" id="custom-button_previous">
                     <a href="#" aria-controls="custom-button" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                  </li>
                  <li class="paginate_button page-item active">
                     <a href="#" aria-controls="custom-button" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                  </li>
                  <li class="paginate_button page-item ">
                     <a href="#" aria-controls="custom-button" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                  </li>
                  <li class="paginate_button page-item next" id="custom-button_next">
                     <a href="#" aria-controls="custom-button" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                  </li>
               </ul>
            </div> -->
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