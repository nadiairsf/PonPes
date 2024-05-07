@extends('layouts.simple.master')
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
                     <th>Jam Makan</th>
                     <th>Waktu Makan</th>
                     <th>Keterangan</th>
							<th>Aksi</th>
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
                     <td>
                     <a href="/admin/diary/edit-asupan/{{$t->id}}">
                     <button class="btn btn-info btn-sm" tabindex="0" aria-controls="custom-button" data-bs-original-title="" title="">
                        <span>Edit</span>
                     </button> 
                     </a>
                     <a href="/admin/diary/hapus-asupan/{{$t->id}}" class="button delete-confirm">
                     <button class="btn btn-danger btn-sm" tabindex="0" aria-controls="custom-button" data-bs-original-title="" title="">
                        <span>Hapus</span>
                     </button> 
                     </a></td>
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
<script>
   $(document).on('click','.open_modal',function(){
        var url = "domain.com/yoururl";
        var tour_id= $(this).val();
        $.get(url + '/' + tour_id, function (data) {
            //success data
            console.log(data);
            $('#tour_id').val(data.id);
            $('#name').val(data.name);
            $('#details').val(data.details);
            $('#btn-save').val("update");
            $('#myModal').modal('show');
        }) 
    });
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
@endsection