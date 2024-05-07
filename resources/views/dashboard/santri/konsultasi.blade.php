@extends('layouts-santri.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Data Konsultasi</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Jadwak Konsultasi</li>
<li class="breadcrumb-item active">Data Konsultasi</li>
@endsection

@section('content')
<div class="col-sm-6 col-xl-3 col-lg-6">
   <div class="card o-hidden">
   <a href="/santri/tambah-konsultasi">
      <div class="bg-primary b-r-4 card-body">
         <div class="media static-top-widget">
            <div class="align-self-center text-center">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-heart" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5ZM1 14V4h14v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1Zm7-6.507c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
               </svg>
            </div>
            <div class="media-body"><span class="m-0">Buat Jadwal Konsultasi</span>
            <h4 class="mb-0 counter"> </h4>
            </div>
         </div>
      </div>
   </a>
   </div>
</div>
<div class="container-fluid">
<div class="row">
   <div class="col-sm-12">
      <div class="card">
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
         
               <table class="display dataTable" id="custom-button" role="grid" aria-describedby="custom-button_info">
                  <thead>
                  <tr>
                     <th>No</th>
                     <th>Tanggal</th>                                      
                     <th>Konsultasi Menngenai</th>
                     <th>Tanggal Konsultasi</th>
                     <th>Ustadz</th>
                     <th>Status</th>
                  </tr>
               </thead>
               @php
                  $no = 1;
               @endphp
               @foreach ($data as $d )
               <tbody>
                  <tr>
                     <td>{{ $no++ }}</td>
                     <td>{{ date('d-m-y', strtotime($d->created_at)) }}</td>
                     <td>{{ $d->konsultasi }}</td>
                     <td>{{ $d->tgl_konsul }}, {{$d->jam_konsul}}</td>
                     <td>{{ $d->guru }}</td>
                     
                     @if ($d->status == 0)
                     <td class="font-warning">Menunggu Konfirmasi</td>
                     @elseif ($d->status == 1)
                     <td class="font-success">Konfirmasi</td>
                     @else
                     <td class="font-danger">Tolak</td>
                     @endif
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection