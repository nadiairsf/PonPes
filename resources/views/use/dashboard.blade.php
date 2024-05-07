@extends('layouts.simple.master')
@section('title', 'Chart')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/prism.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Dashboard</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Sistem Informasi</li>
<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<?php
   $countg = DB::table('Data_santris')->where('Data_santris.id_santris',$id)
           ->join('general_checks','data_santris.id','=','general_checks.id_santris')
           ->count();
   ?>

   <?php
   $countk = DB::table('Data_santris')->where('Data_santris.id_santris',$id)
           ->join('keluhans','data_santris.id','=','keluhans.id_santris')
           ->count();
   ?>

   <?php
   $laki = DB::table('Data_santris')->where('Data_santris.jenis_kelamin','laki - laki')
           ->count();
   ?>

   <?php
   $perempuan = DB::table('Data_santris')->where('Data_santris.jenis_kelamin','perempuan')
           ->count();
   ?>
<div class="container-fluid">
   <!-- Chart widget top Start-->
   <div class="row">
      <div class="col-sm-6 col-xl-3 col-lg-6">
         <div class="card o-hidden">
         <div class="bg-primary b-r-4 card-body">
            <div class="media static-top-widget">
               <div class="align-self-center text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg></div>
               <div class="media-body"><span class="m-0">Santri Laki-laki</span>
               <h4 class="mb-0 counter">{{$laki}}</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database icon-bg"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
               </div>
            </div>
         </div>
         </div>
      </div>
      <div class="col-sm-6 col-xl-3 col-lg-6">
         <div class="card o-hidden">
         <div class="bg-primary b-r-4 card-body">
            <div class="media static-top-widget">
               <div class="align-self-center text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg></div>
               <div class="media-body"><span class="m-0">Santri Perempuan</span>
               <h4 class="mb-0 counter">{{$perempuan}}</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus icon-bg"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
               </div>
            </div>
         </div>
         </div>
      </div>
      <!-- <div class="col-xl-4 col-md-12 box-col-12">
         <div class="card o-hidden">
            <div class="chart-widget-top">
               <div class="row card-body">
                  <div class="col-5">
                     <h6 class="f-w-600 font-primary">SALE</h6>
                     <span class="num"><span class="counter">90</span>%<i class="icon-angle-up f-12 ms-1"></i></span>
                  </div>
                  <div class="col-7 text-end">
                     <h4 class="num total-value">$ <span class="counter">3654</span>.00</h4>
                  </div>
               </div>
               <div>
                  <div id="chart-widget1"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-4 col-md-12 box-col-12">
         <div class="card o-hidden">
            <div class="chart-widget-top">
               <div class="row card-body">
                  <div class="col-7">
                     <h6 class="f-w-600 font-secondary">PROJECTS</h6>
                     <span class="num"><span class="counter">30</span>%<i class="icon-angle-up f-12 ms-1"></i></span>
                  </div>
                  <div class="col-5 text-end">
                     <h4 class="num total-value counter">12569</h4>
                  </div>
               </div>
               <div id="chart-widget2">
                  <div class="flot-chart-placeholder" id="chart-widget-top-second"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-4 col-md-12 box-col-12">
         <div class="card o-hidden">
            <div class="chart-widget-top">
               <div class="row card-body">
                  <div class="col-8">
                     <h6 class="f-w-600 font-success">PRODUCTS</h6>
                     <span class="num"><span class="counter">68</span>%<i class="icon-angle-up f-12 ms-1"></i></span>
                  </div>
                  <div class="col-4 text-end">
                     <h4 class="num total-value"><span class="counter">93</span>M</h4>
                  </div>
               </div>
               <div id="chart-widget3">
                  <div class="flot-chart-placeholder" id="chart-widget-top-third"></div>
               </div>
            </div>
         </div>
      </div> -->
   </div>
   <!-- Chart widget top Ends-->
   <!-- Chart widget with bar chart Start-->
   <!-- <div class="row">
      <div class="col-xl-7 col-md-12 box-col-12">
         <div class="card o-hidden">
            <div class="card-header">
               <h5>Marketin Expenses</h5>
            </div>
            <div class="bar-chart-widget">
               <div class="bottom-content card-body">
                  <div class="row">
                     <div class="col-12">
                        <div id="chart-widget4"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-8 col-lg-12 box-col-6 xl-50">
         <div class="card">
            <div class="card-header">
               <div class="row">
                  <div class="col-9">
                     <h5>Order Status</h5>
                  </div>
                  <div class="col-3 text-end"><i class="text-muted" data-feather="shopping-bag"></i></div>
               </div>
            </div>
            <div class="card-body">
               <div class="chart-container">
                  <div id="progress1"></div>
                  <div id="progress2"></div>
                  <div id="progress3"></div>
                  <div id="progress4"></div>
                  <div id="progress5">               </div>
               </div>
            </div>
         </div>
      </div>
   </div> -->
   <!-- Chart widget with bar chart Ends-->
   <!-- small widgets Start-->
   <!-- <div class="row">
      <!-- Live Product chart widget Start-->
      <!-- <div class="xl-50 col-xl-7 col-lg-12">
         <div class="small-chart-widget chart-widgets-small">
            <div class="card">
               <div class="card-header">
                  <h5>Live Products</h5>
                  <div class="card-header-right">
                     <ul class="list-unstyled card-option">
                        <li><i class="fa fa-spin fa-cog"></i></li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                     </ul>
                  </div>
               </div>
               <div class="card-body">
                  <div class="chart-container">
                     <div class="row">
                        <div class="col-12">
                           <div id="chart-widget6"></div>
                        </div>
                     </div>
                  </div>
                  <div class="code-box-copy">
                     <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                     <pre><code class="language-html" id="example-head">&lt;!-- Cod Box Copy begin --&gt;
&lt;div class="chart-container"&gt;
  &lt;div class="row"&gt;
    &lt;div class="col-12"&gt;
      &lt;div id="chart-widget6"&gt;&lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
                  </div>
               </div>
            </div>
         </div>
      </div> --> 
      <!-- Live Product chart widget Ends-->
      <!-- Turnover chart widget Start-->
      <!-- <div class="xl-50 col-xl-5 col-lg-12">
         <div class="small-chart-widget chart-widgets-small">
            <div class="card">
               <div class="card-header">
                  <h5>Turnover</h5>
                  <div class="card-header-right">
                     <ul class="list-unstyled card-option">
                        <li><i class="fa fa-spin fa-cog"></i></li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                     </ul>
                  </div>
               </div>
               <div class="card-body">
                  <div class="chart-container">
                     <div class="row">
                        <div class="col-12">
                           <div id="chart-widget7"></div>
                        </div>
                     </div>
                  </div>
                  <div class="code-box-copy">
                     <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                     <pre><code class="language-html" id="example-head1">&lt;!-- Cod Box Copy begin --&gt;
&lt;div class="chart-container"&gt;
  &lt;div class="row"&gt;
    &lt;div class="col-12"&gt;
      &lt;div id="chart-widget7"&gt;&lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
      <!-- Turnover chart widget Ends-->

      <!-- small widgets Ends-->

      <!-- status widget Start-->
   <!-- </div>
   <div class="row">
      <div class="col-xl-7 col-lg-12 box-col-6">
         <div class="card">
            <div class="card-header">
               <div class="row">
                  <div class="col-9">
                     <h5>Order Status</h5>
                  </div>
                  <div class="col-3 text-end"><i class="text-muted" data-feather="shopping-bag"></i></div>
               </div>
            </div>
            <div class="card-body">
               <div class="chart-container">
                  <div id="linechart"></div>
               </div>
            </div>
         </div>
      </div>
   </div> -->
   <!-- status widget Ends-->
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

