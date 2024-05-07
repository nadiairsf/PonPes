@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>General Check Up</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Profil</li>
<li class="breadcrumb-item active">General Check Up</li>
@endsection

@section('content')
<div class="container-fluid">
<div class="row">
   <div class="col-sm-12">
      <div class="card">
      <!-- <div class="card-header">
         <h5 class="mb-0">General Check Up</h5>
      </div> -->
      <div class="card-body">
         <div class="dt-ext table-responsive">
            <div id="custom-button_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
               <div class="dt-buttons btn-group mb-3">
                  <input type="text" class="form-control form-control-sm" aria-controls="custom-button" id="myInput" onkeyup="myFunction()" placeholder="Cari nama pengajar">
               </div>
               <!-- <div id="custom-button_filter" class="dataTables_filter"> 
                  <label>Search:
                  <input type="search" class="form-control form-control-sm" placeholder="Cari Nama" aria-controls="responsive" data-bs-original-title="" title="" id="myInput" onkeyup="myFunction()">
               </div> -->
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
                     <td>{{ $d->kelaz }}</td>
                   
                     <td>
                     <a href="/admin/diary/detail-generalcheckup/{{$d->id}}">
                     <button class="btn btn-primary btn-sm" tabindex="0" aria-controls="custom-button" data-bs-original-title="" title="">
                        <span>General Check Up</span>
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
<script>
   function myFunction() {
   var input, filter, table, tr, td, i, txtValue;
   input = document.getElementById("myInput");
   filter = input.value.toUpperCase();
   table = document.getElementById("myTable");
   tr = table.getElementsByTagName("tr");
   for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
         txtValue = td.textContent || td.innerText;
         if (txtValue.toUpperCase().indexOf(filter) > -1) {
         tr[i].style.display = "";
         } else {
         tr[i].style.display = "none";
         }
      }       
   }
   }
</script>


<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection