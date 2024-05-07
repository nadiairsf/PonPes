@extends('layouts-wali.simple.master')
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
<h3>Data Nilai</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Nilai</li>
<li class="breadcrumb-item active">Data Nilai</li>
@endsection

@section('content')
<div class="container-fluid">
<div class="row">
   <div class="col-sm-8">
      <div class="card">

     
      <div class="card-body">
         <div class="dt-ext table-responsive">
            <div id="custom-button_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
              
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
                     <a href="/wali/detail-nilai/{{$t->kat}}/{{$data[0]->id}}" >
                        <button class="btn btn-primary">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
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