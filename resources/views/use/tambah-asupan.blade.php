@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Riwayat Gizi</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Profil</li>
<li class="breadcrumb-item active">Data Santri</li>
@endsection

@section('content')
<div class="container-fluid">
<div class="row">
   <div class="col-sm-12">
      <div class="card">
      <div class="card-header">
         <a href="/admin/diary/data-asupan/{{$data}}">
         <button type="button" name="remove" id="" class="btn btn-secondary">Kembali Data Riwayat Giziku</button>
         </a>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <form method="post" id="dynamic_form">
            <span id="result"></span>
               <table class="table table-bordered table-striped" id="user_table">
                  <thead>
                     <tr>
                        <th width="35%">Makan</th>
                        <th width="35%">Jam Makan</th>
                        <th width="30%">Keterangan</th>
                     </tr>
                  </thead>
                  <tbody>

                  </tbody>
                  <tfoot>
                     <tr>
                        <td colspan="4" align="right">&nbsp;</td>
                        <td>
                        @csrf
                        <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                     </td>
                     </tr>
                  </tfoot>
               </table>
            </form>
         </div>
      </div>
      </div>
   </div>
</div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function(){

 var count = 1;

 dynamic_field(count);

 function dynamic_field(number)
 {
  html = '<tr>';
         html += '<td><select name="jam[]" class="form-select" style="width: 100%; height: max;" ><option value="Sarapan">Sarapan</option><option value="Makan Siang">Makan Siang</option><option value="Makan Malam">Makan Malam</option><option value="Jajan">Jajan</option></select></td>';
         html += '<td><input type="time" name="waktu[]" class="form-control" /></td>';
         html += '<td><input type="text" name="ket[]" class="form-control" /></td>';
         html += '<td><input type="text" name="id_santri[]" value="{{$data}}" hidden  /></td>';
        if(number > 1)
        {
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Hapus</button></td></tr>';
            $('tbody').append(html);
        }
        else
        {   
            html += '<td><button type="button" name="add" id="add" class="btn btn-success">Tambah</button></td></tr>';
            $('tbody').html(html);
        }
 }

 $(document).on('click', '#add', function(){
  count++;
  dynamic_field(count);
 });

 $(document).on('click', '.remove', function(){
  count--;
  $(this).closest("tr").remove();
 });

 $('#dynamic_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:'{{ route("admin.createAsupan") }}',
            method:'post',
            data:$(this).serialize(),
            dataType:'json',
            beforeSend:function(){
                $('#save').attr('disabled','disabled');
            },
            success:function(data)
            {
                if(data.error)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<p>'+data.error[count]+'</p>';
                    }
                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                }
                else
                {
                    dynamic_field(1);
                    $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                }
                $('#save').attr('disabled', false);
            }
            
        })
 });

});
</script>
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection