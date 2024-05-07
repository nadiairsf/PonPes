@extends('layouts.simple.master')
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
               <div id="custom-button_filter" class="dataTables_filter">\
                  <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="custom-button" data-bs-original-title="" title=""></label>
               </div>
               <table class="display dataTable" id="custom-button" role="grid" aria-describedby="custom-button_info">
                  <thead>
                  <tr>
                     <th>No</th>
                     <th>Tanggal</th>
                     <th>Nama Siswa</th>
                     <th>Kelas</th>
                     <th>Konsultasi Menngenai</th>
                     <th>Tanggal Konsultasi</th>
                     <th>Ustadz</th>
                     <th>Status</th>
                     <th>Aksi</th>
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
                     <td>{{ $d->santri }}</td>
                     <td>{{ $d->kelas }}</td>
                     <td>{{ $d->konsultasi }}</td>
                     <td>{{ $d->tgl_konsul }}, {{$d->jam_konsul}}</td>
                     <td>{{ $d->guru }}</td>
                     @if ($d->status == 0)
                     <td class="font-warning">Menunggu</td>
                     @elseif ($d->status == 1)
                     <td class="font-success">Konfirmasi</td>
                     @else
                     <td class="font-danger">Tolak</td>
                     @endif
                     
                     <td>
                        <div class="btn-group">
                            <a href="/admin/konsultasi/konfirmasi/{{$d->id}}">
                                <button class="btn btn-success btn-lg"  data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Konfirmasi"><i class="fa fa-check"></i></button>
                            </a>
                            <a href="/admin/konsultasi/tolak/{{$d->id}}">
                                <button class="btn btn-secondary btn-lg"  data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Tolak"><i class="fa fa-times"></i></button>
                            </a>
                            <a href="/admin/konsultasi/edit/{{$d->id}}">
                                <button class="btn btn-warning btn-lg"  data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Ubah Jadwal"><i class="fa fa-edit"></i></button>
                            </a>
                            <a href="/admin/konsultasi/hasil/{{$d->id}}">
                                <button class="btn btn-info btn-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Hasil Konsultasi"><i class="fa fa-comments-o"></i></button>
                            </a>
                      </div>
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection