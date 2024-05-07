@extends('layouts-guru.simple.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/prism.css')}}">
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Update Profil</li>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Update Profil
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('guru.postChangeAccount')}}">
                  
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Update Profil</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$user[0]->name) }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user[0]->email) }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection