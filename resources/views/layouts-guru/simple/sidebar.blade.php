<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="{{route('/')}}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/logo.png')}}" alt=""><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt=""></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-8">{{ trans('lang.Applications') }}</h6>
                     		<p class="lan-9">{{ trans('lang.Ready to use Apps') }}</p>
						</div>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ Route::currentRouteName()=='/' ? 'active' : '' }}" href="{{route('guru.home')}}">
							<i data-feather="monitor"></i><span>Data Santri</span>
						</a>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ Route::currentRouteName()=='/' ? 'active' : '' }}" href="{{route('guru.konsultasi')}}">
							<i data-feather="heart"></i><span>Konsultasi</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div>