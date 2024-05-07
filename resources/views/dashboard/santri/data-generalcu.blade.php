@extends('layouts-santri.simple.master')
@section('title', 'Edit Profile')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Diary Sehatku</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">General Check Up</li>
<li class="breadcrumb-item active">Tambah General Check Up</li>
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
      <div class="card-body">
         <div class="dt-ext table-responsive">
            <div id="custom-button_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
               <table class="display dataTable" id="custom-button" role="grid" aria-describedby="custom-button_info">
                  <thead>
                  <tr>
                     <th>No</th>
							<th>Tanggal</th>
                     <th>Tekanan Darah</th>
                     <th>SPO2</th>
                     <th>Suhu</th>
                     <th>Nadi</th>
                     <th>Respiration Rate</th>
                     <th>TB</th>
                     <th>BB</th>
                     <th>IMT</th>
                     
							<th>Aksi</th>
                  </tr>
               </thead>
               @php $no = 1; @endphp
               @foreach ($table as $t)
               <tbody>
                  <tr>
                     <td>{{ $no++ }}</td>
							<td>{{ date('d-m-y', strtotime($t->created_at)) }}</td>
                     <td>{{ $t->tekanan_darah }} mmHg</td>
                     <td>{{ $t->spo2 }}%</td>
                     <td>{{ $t->suhu }} <span>&#8451;</span></td>
                     <td>{{ $t->nadi }} / Menit</td>
                     <td>{{ $t->respiration_rate }} / Menit</td>
                     <td>{{ $t->tinggi_badan }}CM</td>
                     <td>{{ $t->berat_badan }}KG</td>
                     <td>{{ $t->imt }}</td>
                    
                     <td>
                   
                     <a href="/santri/detail-general/{{$t->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                           <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                           <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>
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

@endsection