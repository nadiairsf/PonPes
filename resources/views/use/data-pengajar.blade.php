@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Data Pengajar</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Profil</li>
<li class="breadcrumb-item active">Data Pengajar</li>
@endsection

@section('content')
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
      <div class="card-header">
         <h5 class="mb-0">Data Pengajar</h5>
      </div>
      <div class="card-body">
         <div class="dt-ext table-responsive">
            <div id="custom-button_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
               <div class="dt-buttons btn-group">
                  <a href="/admin/profil/tambah-pengajar">
                  <button class="btn btn-primary" tabindex="0" aria-controls="custom-button" data-bs-original-title="" title="">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
                     <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                     <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
                     </svg>
                     <span>Tambah Data Pengajar</span>
                  </button> 
                  </a>
               </div>
               <div id="custom-button_filter" class="dataTables_filter">\
                  <label>Search:<input type="text" class="form-control form-control-sm" aria-controls="custom-button" id="myInput" onkeyup="myFunction()" placeholder="Cari nama pengajar"></label>
               </div>
               <table class="display dataTable" id="myTable" role="grid" aria-describedby="custom-button_info">
                  <thead>
                  <tr>
                     <th>No</th>
                     <th>NIP</th>
                     <th>Nama</th>
                     <th>TTL</th>
                     <th>Status</th>
                     <th>Jenis Kelamin</th>
                     <th>Tanggal Masuk</th>
                 
                     <th>Tempat Tinggal</th>
                     <th>Nomer HP</th>
                     <th>Riwayat Pendidikan</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               @php $no = 1; @endphp
               @foreach ($data as $d)
               <tbody>
                  <tr>
                     <td>{{ $no++ }}</td>
                     <td>{{ $d->nip }}</td>
                     <td>{{ $d->nama }}</td>
                     <td>{{ $d->tempat_lahir }}, {{ $d->tgl_lahir }}</td>
                     <td>{{ $d->status }}</td>
                     <td>{{ $d->jenis_kelamin }}</td>
                     <td>{{ $d->tgl_masuk }}</td>
                 
                     <td>{{ $d->tempat_tinggal }}</td>
                     <td>{{ $d->noHp }}</td>
                     <td>{{ $d->riwayat_pendidikan }}</td>
                     <td>
                     <a href="/admin/profil/data-pengajar/detail/{{$d->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                           <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                           <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                     </a>
                     <a href="/admin/profil/data-pengajar/hapus/{{$d->id_gurus}}" class="button delete-confirm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                           <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                        </svg>
                     </a>
                     </td>
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
      td = tr[i].getElementsByTagName("td")[2];
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


<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection