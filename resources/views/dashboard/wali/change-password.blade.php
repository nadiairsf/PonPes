@extends('layouts-wali.simple.master')
@section('title', 'Chart')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/prism.css')}}">
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Update Password</li>
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
                <div class="card-header">Update Password</div>

                <form action="{{ route('wali.postChangePassword') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="oldPasswordInput" class="form-label">Password Lama</label>
                            <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="current_password" name="current_password"
                                placeholder="Password">
                            @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="newPasswordInput" class="form-label">Password Baru</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password"
                                placeholder="Password">
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirmNewPasswordInput" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation"
                                placeholder="Password">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/chart/apex-chart/moment.min.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
<script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
<script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
<script src="{{asset('assets/js/chart-widget.js')}}"></script>
@endsection