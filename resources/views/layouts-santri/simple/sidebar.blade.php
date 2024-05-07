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
						<a class="sidebar-link sidebar-title {{ Route::currentRouteName()=='/' ? 'active' : '' }}" href="{{route('santri.home')}}">
							<i data-feather="home"></i><span>Dashboard</span>
						</a>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ Route::currentRouteName()=='/' ? 'active' : '' }}" href="{{route('santri.konsultasi')}}">
							<i data-feather="calendar"></i><span>Konsultasi</span>
						</a>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ Route::currentRouteName()=='/' ? 'active' : '' }}" href="{{route('santri.data-asupan')}}">
							<i data-feather="pocket"></i><span>Asupan</span>
						</a>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ Route::currentRouteName()=='/' ? 'active' : '' }}" href="{{route('santri.data-giziku')}}">
							<i data-feather="pocket"></i><span>Giizku</span>
						</a>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ Route::currentRouteName()=='/' ? 'active' : '' }}" href="{{route('santri.data-general')}}">
							<i data-feather="pocket"></i><span>General Chcek Up</span>
						</a>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ Route::currentRouteName()=='/' ? 'active' : '' }}" href="{{route('santri.data-keluhan')}}">
							<i data-feather="pocket"></i><span>Keluhan Kesakitan</span>
						</a>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/' ? 'active' : '' }}" href="#">
						<i data-feather="monitor"></i><span>Nilai Siswa</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/capaian' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{request()->route()->getPrefix() == '/capaian' ? 'block' : 'none;' }};">
							<li><a href="{{route('santri.data-nilai')}}" class="{{ Route::currentRouteName()=='data-nilai' ? 'active' : '' }}">Nilai</a></li>
							<li><a href="{{route('santri.data-hafalan')}}" class="{{ Route::currentRouteName()=='data-hafalan' ? 'active' : '' }}">Hafalan</a></li>
							<li><a href="{{route('santri.data-prestasi')}}" class="{{ Route::currentRouteName()=='data-prestasi' ? 'active' : '' }}">Prestasi</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div>