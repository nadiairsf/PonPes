@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Data Giziku</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Profil</li>
<li class="breadcrumb-item active">Data Giziku</li>
@endsection

@section('content')
<div class="container-fluid">
<div class="row">
   <div class="col-sm-12">
      <div class="card">
      <div class="card-body">
         <div class="dt-ext table-responsive">
            <div id="custom-button_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
               <!-- <div class="dt-buttons btn-group">
                  <a href="/admin/diary/tambah-giziku">
                     <button class="btn btn-primary" tabindex="0" aria-controls="custom-button" data-bs-original-title="" title="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
                        </svg>
                        <span>Tambah Data Giziku</span>
                     </button> 
                  </a>
               </div> -->
               <div id="custom-button_filter" class="dataTables_filter">\
                  <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="custom-button" data-bs-original-title="" title=""></label>
               </div>
               <table class="display dataTable" id="myTable" role="grid" aria-describedby="custom-button_info">
                  <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>TTL</th>
                     <th>Jenis Kelamin</th>
                     <th>Kelas</th>
              
                     <th>Aksi</th>
                  </tr>
               </thead>
               @php
                  $no=1;
               @endphp
               @foreach ( $data as $d )
               <tbody>
                  <tr>
                     <td>{{ $no++ }}</td>
                     <td>{{ $d->nama }}</td>
                     <td>{{ $d->tempat_lahir}}, {{ $d->tgl_lahir }}</td>
                     <td>{{ $d->jenis_kelamin}}</td>
                     <td>{{ $d->kelaz  }}</td>
                
                     <td>
                     <a href="/admin/diary/detail-giziku/{{$d->id}}">
                     <button class="btn btn-primary btn-sm" tabindex="0" aria-controls="custom-button" data-bs-original-title="" title="">
                        <span>Tambah Giziku</span>
                     </button> 
                     </a></td>
                  </tr>
               </tbody> 
               @endforeach
            </table>
            <div class="dataTables_info" id="custom-button_info" role="status" aria-live="polite">Jumlah Data {{ $data->total() }}</div>
            <div class="dataTables_paginate paging_simple_numbers" id="custom-button_paginate">
               <ul class="pagination">
               {!! $data->links() !!}
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
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection