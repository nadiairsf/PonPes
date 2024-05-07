@extends('layouts-wali.simple.master')
@section('title', 'Edit Profile')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Riwayat Gizi</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Giziku</li>
<li class="breadcrumb-item active">Detail Giziku</li>
@endsection

@section('content')
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
                     <th>Jam Makan</th>
                     <th>Waktu Makan</th>
                     <th>Keterangan</th>
							
                  </tr>
               </thead>
               @php $no = 1; @endphp
               @foreach ($table as $t )
               <tbody>
                  <tr>
                     <td>{{ $no++ }}</td>
                     <td>{{ date('d-m-y', strtotime($t->created_at)) }}</td>
                     <td>{{  $t->jam }}</td>
                     <td>{{  $t->waktu }}</td>
                     <td>{{  $t->ket }}</td>
                    
                  </tr>
               </tbody> 
              @endforeach
            </table>
         </div>
         </div>
      </div>
      </div>
   </div>
</div>
</div>
@endsection

@section('script')

@endsection