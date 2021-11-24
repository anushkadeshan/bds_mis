<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="{{route('dashboard')}}"><img class="img-fluid for-light" src="{{asset('assets/admin/images/logo/logo.jpg')}}" alt=""><img class="img-fluid for-dark" src="{{asset('assets/admin/images/logo/logo.jpg')}}" alt=""></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-toggle="sidebar-show" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="{{route('dashboard')}}"><img class="img-fluid" src="{{asset('images/favicon-32x32.png')}}" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn">
						<a href="{{route('dashboard')}}"><img class="img-fluid" src="{{asset('images/favicon-32x32.png')}}" alt=""></a>
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>

					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'dashboard' ? 'active' : ''}}" href="{{ route('dashboard') }}"><i class="icon-home"></i> </i><span> Dashboard</span></a></li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'dashboard-bss' ? 'active' : ''}}" href="{{ route('dashboard-bss') }}"><i class="icon-crown"></i> </i><span>  BSS Database</span></a></li>

                    <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/admin' ? 'active' : '' }}" href="#"><i class="icon-lock"></i><span> Admin</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/admin' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{request()->route()->getPrefix() == '/admin' ? 'block' : 'none;' }};">
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'users.index'  ? 'active' : ''}}" href="{{ route('users.index') }}"><i class="icon-user"></i><span> Users</span></a></li>
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'roles.index'  ? 'active' : ''}}" href="{{ route('roles.index') }}"><i class="icon-settings"></i><span> Roles</span></a></li>
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'permissions.index'  ? 'active' : ''}}" href="{{ route('permissions.index') }}"><i class="icon-lock"></i><span> Permissions</span></a></li>
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'tasks.index'  ? 'active' : ''}}" href="{{ route('tasks.index') }}"><i class="icon-calendar"></i><span> Tasks</span></a></li>
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'budget-types.index'  ? 'active' : ''}}" href="{{ route('budget-types.index') }}"><i class="icon-money"></i><span> Budget Types</span></a></li>
						</ul>
					</li>
                    <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/program' ? 'active' : '' }}" href="#"><i class="icon-direction-alt"></i><span> Program</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/program' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{request()->route()->getPrefix() == '/program' ? 'block' : 'none;' }};">
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'logframe-activities.index'  ? 'active' : ''}}" href="{{ route('logframe-activities.index') }}"><i class="icon-direction"></i><span> Logframe Activities</span></a></li>
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'completion-reports.index'  ? 'active' : ''}}" href="{{ route('completion-reports.index') }}"><i class="icon-timer"></i><span> Completion Reports</span></a></li>
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'budget.index'  ? 'active' : ''}}" href="{{ route('budget.index') }}"><i class="icon-money"></i><span> Budgets</span></a></li>
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'progress.index'  ? 'active' : ''}}" href="{{ route('progress.index') }}"><i class="icon-stats-up"></i><span> Progress</span></a></li>
						</ul>
					</li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'activities.index' ? 'active' : ''}}" href="{{ route('activities.index') }}"><i class="icon-clipboard"></i> </i><span>  User Activities</span></a></li>

                    <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/working-areas' ? 'active' : '' }}" href="#"><i class="icon-map"></i><span> Working Areas</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/working-areas' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{request()->route()->getPrefix() == '/working-areas' ? 'block' : 'none;' }};">
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'gn-divisions.index' ? 'active' : ''}}" href="{{ route('gn-divisions.index') }}"><i class="icon-map-alt"></i> </i><span>  GN Divisions</span></a></li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'dsd-divisions.index' ? 'active' : ''}}" href="{{ route('dsd-divisions.index') }}"><i class="icon-location-pin"></i> </i><span>  DSD Divisions</span></a></li>
						</ul>
					</li>
                    <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/families' ? 'active' : '' }}" href="#"><i class="icon-home"></i><span> Families</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/families' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{request()->route()->getPrefix() == '/families' ? 'block' : 'none;' }};">
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'house-hold-families.index'  ? 'active' : ''}}" href="{{ route('house-hold-families.index') }}"><i class="icon-home"></i><span> House Hold Families</span></a></li>
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'resourse-people.index'  ? 'active' : ''}}" href="{{ route('resourse-people.index') }}"><i class="icon-headphone"></i><span> Resourse People</span></a></li>
						</ul>
					</li>
                    <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/skill-development' ? 'active' : '' }}" href="#"><i class="icon-cup"></i><span> Skill Development</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/skill-development' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{request()->route()->getPrefix() == '/skill-development' ? 'block' : 'none;' }};">
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'courses.index'  ? 'active' : ''}}" href="{{ route('courses.index') }}"><i class="icon-briefcase"></i><span> Courses</span></a></li>
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'institutes.index'  ? 'active' : ''}}" href="{{ route('institutes.index') }}"><i class="icon-desktop"></i><span> Institutes</span></a></li>
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'employers.index'  ? 'active' : ''}}" href="{{ route('employers.index') }}"><i class="icon-money"></i><span> Employers</span></a></li>
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'vacancies.index'  ? 'active' : ''}}" href="{{ route('vacancies.index') }}"><i class="icon-briefcase"></i><span> Vacancies</span></a></li>
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'vacancies.index'  ? 'active' : ''}}" href="{{ route('youths.index') }}"><i class="icon-user"></i><span> Youths</span></a></li>
						</ul>
					</li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'eip-clients' ? 'active' : ''}}" href="{{ route('eip-clients') }}"><i class="icon-wheelchair"></i> </i><span>  EIP Clients</span></a></li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'cso.index' ? 'active' : ''}}" href="{{ route('cso.index') }}"><i class="icon-announcement"></i> </i><span>  CSO Profiles</span></a></li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'money-orders' ? 'active' : ''}}" href="{{ route('money-orders') }}"><i class="icon-money"></i> </i><span>  Money Order Documents</span></a></li>
                    <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/mobile-app' ? 'active' : '' }}" href="#"><i class="icon-mobile"></i><span> Mobile App</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/mobile-app' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{request()->route()->getPrefix() == '/mobile-app' ? 'block' : 'none;' }};">
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'sessions.index'  ? 'active' : ''}}" href="{{ route('sessions.index') }}"><i class="icon-target"></i><span> Field Sessions</span></a></li>
					        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'trips.index'  ? 'active' : ''}}" href="{{ route('trips.index') }}"><i class="icon-car"></i><span> Field Trips</span></a></li>

						</ul>
					</li>
                </ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div>
