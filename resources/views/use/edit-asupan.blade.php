@extends('layouts.simple.master')
@section('title', 'Edit Profile')

@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Edit Asupan</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Edit Asupan</li>
<li class="breadcrumb-item active">Edit Asupan</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-xl-6">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h5>Edit Asupan</h5>
						</div>
						<div class="card-body">
                        @foreach ( $data as $d )
						<form  class="theme-form mega-form" action="/admin/diary/update-asupan/{{$d->id}}" method="post"  >
                            @csrf
                            {{ csrf_field() }}
                            <input class="form-control p-3" name="id_santri" value="{{$d->id_santri}}" hidden></input>
                            <input class="form-control p-3" name="created_at" value="{{$d->created_at}}" hidden></input>

                            <div class="mb-3">
                                <label class="col-form-label">Jam</label>
                                <select name="jam" id="" class="form-select">
                                    <option value="{{$d->jam}}">{{$d->jam}}</option>
                                    <option value="Sarapan">Sarapan</option>
                                    <option value="Makan Siang">Makan Siang</option>
                                    <option value="Makan Malam">Makan Malam</option>
                                    <option value="Jajan">Jajan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Waktu</label>
                                <input class="form-control p-3" type="time" name="waktu" value="{{$d->waktu}}"></input>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Keterangan</label>
                                <input class="form-control p-3" type="text" name="ket" value="{{$d->ket}}"></input>
                            </div>
						</div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <button class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                        @endforeach
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
        
<script type="text/javascript">
        $('.livesearch-guru').select2({
            placeholder: 'Pilih...',
            ajax: {
                url: '/admin/capaian/selectGuru',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.nama,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>

@endsection