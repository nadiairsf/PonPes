@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
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
<div class="container-fluid">
<div class="row">
   <div class="col-sm-12">
      <div class="card">
      <div class="card-header">
         <h5 class="mb-0">Data Kelas</h5>
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
            
               <div class="dt-buttons btn-group">
                  <button class="btn btn-primary" tabindex="0" aria-controls="custom-button"  data-bs-toggle="modal" data-bs-target="#exampleModalfat" data-whatever="@mdo">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
                     <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                     <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
                     </svg>
                     <span>Tambah Kelas</span>
                  </button> 
               </div>
               <div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel2">Tambah Kelas</h5>
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

               <div id="custom-button_filter" class="dataTables_filter">\
                  <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="custom-button" data-bs-original-title="" title=""></label>
               </div>
              
               <table class="display dataTable" id="custom-button" role="grid" aria-describedby="custom-button_info">
                  <thead>
                  <tr>
                     <th>No</th>
                     <th>Tingkat Kelas</th>
                     <th>Nama Kelas</th>
                     <th>Tahun Ajaran</th>
                     
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
                     <td>{{ $d->tingkat }}</td>
                     <td>{{ $d->nama }}</td>
                     <td>{{ $d->tahun}}</td>
                     
                     <td>
                     <a href="listSantri/{{$d->id}}">
                        <button class="btn btn-primary">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                              <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
                              <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                              <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                           </svg>
                           <span>Detail Siswa</span>
                        </button> 
                     </a>
                     <a href="/admin/capaian/kelas/hapus/{{$d->id}}" class="button delete-confirm">
                        <button class="btn btn-danger">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                           </svg>
                           <span>Hapus</span>
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