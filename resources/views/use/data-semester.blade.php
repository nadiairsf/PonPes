@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Data Semester</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Capaian</li>
<li class="breadcrumb-item active">Data Semester</li>
@endsection

@section('content')
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div id="page" class="p-2"></div>
            </div>
      </div>
   </div>
</div>

<div class="container-fluid">
<div class="row">
   <div class="col-sm-12">
      <div class="card">
      <div class="card-header">
         <h5 class="mb-0">Data Semester</h5>
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
               <!-- <div class="dt-buttons btn-group">
                  <select class="form-select" name="" id="">
                     <option value="">Pilih kelas </option>
                  </select>
               </div> -->
               <div class="dt-buttons btn-group">
                  <button class="btn btn-primary" tabindex="0" aria-controls="custom-button"  data-bs-toggle="modal" data-bs-target="#exampleModalfat" data-whatever="@mdo">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
                     <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                     <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
                     </svg>
                     <span>Tambah Semester</span>
                  </button> 
               </div>
               <div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel2">Tambah Semester</h5>
                           <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <form class="card" action="{{ route('admin.createSemester') }}" method="post" >
                           @csrf
					            {{ csrf_field() }}
                              <div class="mb-3">
                                 <label class="col-form-label" for="message-text">Tahun Ajaran</label>
                                 <input class="form-control" id="message-text" name="tahun">
                              </div>
                              <div class="mb-3">
                                 <label class="col-form-label" for="message-text">Semester</label>
                                 <input class="form-control" id="message-text" name="nama">
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

               <div class="modal fade" id="status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel2">Edit Status</h5>
                           <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <form class="card" id="statusdata" >
                           @csrf
					            {{ csrf_field() }}
                              <div class="mb-3">
                                 <label class="col-form-label" for="recipient-name">Status Semester</label><br>
                                 <select class="form-select" name="tingkat" id="">
                                    <option value="">Pilih</option>
                                    <option value="VII">Aktif</option>
                                    <option value="VIII">Non Aktif</option>
                                 </select>
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


               <div id="custom-button_filter" class="dataTables_filter">\
                  <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="custom-button" data-bs-original-title="" title=""></label>
               </div>
              
               <table class="display dataTable" id="custom-button" role="grid" aria-describedby="custom-button_info">
                  <thead>
                  <tr>
                     <th>No</th>
                     <th>Tahun</th>
                     <th>Semester</th>
                     <th>Status</th>
                     
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
                     <td>{{ $d->tahun }}</td>
                     <td>{{ $d->nama }}</td>
                     @if ($d->status == '1')
                     <td style="color:green;">Aktif</td>
                     @else
                     <td style="color:red;">Non Aktif</td>
                     @endif
                     <td>
                     @if ($d->status == '1')
                     <a href="/admin/capaian/non-aktif/{{$d->id}}">
                        <button class="btn btn-warning" >
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capslock" viewBox="0 0 16 16" style="color:black;">
                              <path fill-rule="evenodd" d="M7.27 1.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1H1.654C.78 9.5.326 8.455.924 7.816L7.27 1.047zM14.346 8.5 8 1.731 1.654 8.5H4.5a1 1 0 0 1 1 1v1h5v-1a1 1 0 0 1 1-1h2.846zm-9.846 5a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1zm6 0h-5v1h5v-1z"/>
                           </svg>
                           <span style="color:black;">Non-Aktifkan</span>
                        </button> 
                     </a>
                     @else
                     <a href="/admin/capaian/aktif/{{$d->id}}">
                        <button class="btn btn-success" >
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capslock" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M7.27 1.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1H1.654C.78 9.5.326 8.455.924 7.816L7.27 1.047zM14.346 8.5 8 1.731 1.654 8.5H4.5a1 1 0 0 1 1 1v1h5v-1a1 1 0 0 1 1-1h2.846zm-9.846 5a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1zm6 0h-5v1h5v-1z"/>
                           </svg>
                           <span >Aktifkan</span>
                        </button> 
                     </a>
                     @endif
                     <a href="/admin/capaian/semester/edit/{{$d->id}}">
                        <button class="btn btn-primary">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                           </svg>
                        </button> 
                     </a>
                     <a href="/admin/capaian/semester/hapus/{{$d->id}}" class="button delete-confirm">
                        <button class="btn btn-danger">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                           </svg>
                          
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

 <!-- JavaScript Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
   integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
   integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

   <script>
   $(document).ready(function() {
      read()
   });
   // Untuk modal halaman edit show
   function show(id) {
      $.get("{{ url('show') }}/" + id, {}, function(data, status) {
            $("#exampleModalLabel").html('Edit Product')
            $("#page").html(data);
            $("#exampleModal").modal('show');
      });
   }

   // untuk proses update data
   function update(id) {
      var name = $("#name").val();
      $.ajax({
            type: "get",
            url: "{{ url('update') }}/" + id,
            data: "name=" + name,
            success: function(data) {
               $(".btn-close").click();
               read()
            }
      });
   }
   </script>


@endsection