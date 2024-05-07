@extends('layouts.authentication.master')
@section('title', 'Login-one')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-xl-7"><img class="bg-img-cover bg-center" src="{{asset('assets/images/login/2.jpg')}}" alt="looginpage"></div>
      <div class="col-xl-5 p-0">
         <div class="login-card">
            <div>
               <div><a class="logo text-start" href="/"><img class="img-fluid for-light" src="{{asset('assets/images/logo/login.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div>
               <div class="login-main">
               <form class="theme-form"  action="{{ route('wali.check') }}" method="post">
                  @if (Session::get('fail'))
                     <div class="alert alert-danger">
                           {{ Session::get('fail') }}
                     </div>
                  @endif
                  @csrf
                  <h4>Login Santri</h4>
                  <p>Masukan email & password untuk login</p>
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" type="email" required="" placeholder="email@gmail.com" name="email" value="{{ old('email') }}">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" name="password" required="" placeholder="*********">
                      <div class="show-hide"><span class="show">                         </span></div>
                    </div>
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                  </div>
                  <div class="form-group mt-4">
                    <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                  </div>
                  
                  <p class="mt-4 mb-0 text-center"><a class="ms-2" href="{{ route('wali.forgot.password.form') }}">Lupa Password ?</a></p>
               </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
@endsection