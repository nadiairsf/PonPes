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
						<a class="sidebar-link sidebar-title {{ Route::currentRouteName()=='/' ? 'active' : '' }}" href="{{route('admin.home')}}">
							<i data-feather="home"></i><span>Dashboard</span>
						</a>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/profil' ? 'active' : '' }}" href="#"><i data-feather="airplay"></i><span>Profil</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/profil' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{request()->route()->getPrefix() == '/profil' ? 'block' : 'none;' }};">
									<li><a href="{{route('admin.data-pengajar')}}" class="{{ Route::currentRouteName()=='data-pengajar' ? 'active' : '' }}">Data Pengajar</a></li>
	                        <li><a href="{{route('admin.data-santri')}}" class="{{ Route::currentRouteName()=='data-santri' ? 'active' : '' }}">Data Santri</a></li>
						</ul>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/diary' ? 'active' : '' }}" href="#">
							<i data-feather="shield"></i><span>Diary Sehatku</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/diary' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{request()->route()->getPrefix() == '/diary' ? 'block' : 'none;' }};">
		                    <li><a href="{{route('admin.data-generalcheckup')}}" class="{{ Route::currentRouteName()=='data-generalcheckup' ? 'active' : '' }}">General Check Up</a></li>
		                    <li><a href="{{route('admin.data-keluhan')}}" class="{{ Route::currentRouteName()=='data-keluhan' ? 'active' : '' }}">Keluhan Kesakitan</a></li>
								  <li><a href="{{route('admin.data-giziku')}}" class="{{ Route::currentRouteName()=='data-giziku' ? 'active' : '' }}">Giziku</a></li>
		            </ul>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/capaian' ? 'active' : '' }}" href="#">
							<i data-feather="heart"></i><span>Capaian</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/capaian' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{request()->route()->getPrefix() == '/capaian' ? 'block' : 'none;' }};">
									<li><a href="{{route('admin.data-pelajaran')}}" class="{{ Route::currentRouteName()=='data-pelajaran' ? 'active' : '' }}">Data Pelajaran</a></li>
									<li><a href="{{route('admin.data-japel')}}" class="{{ Route::currentRouteName()=='data-pelajaran' ? 'active' : '' }}">Jadwal Pelajaran</a></li>
                     		<li><a href="{{route('admin.data-semester')}}" class="{{ Route::currentRouteName()=='data-semester' ? 'active' : '' }}">Data Semester</a></li>
									<li><a href="{{route('admin.data-kelas')}}" class="{{ Route::currentRouteName()=='data-kelas' ? 'active' : '' }}">Data Kelas</a></li>
						</ul>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ Route::currentRouteName()=='konsultasi' ? 'active' : '' }}" href="{{route('admin.data-konsultasi')}}">
							<i data-feather="users"></i><span>Jadwal Konsultasi</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div>