<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('root')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('root')}}" class="logo logo-light mt-4">
            <span class="logo-sm">
                {{-- <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22"> --}}
                <h5 class="mt-4 mb-4 text-white">BM</h5>

            </span>
            <span class="logo-lg ">
                {{-- <img src="{{ URL::asset('build/images/Engagement_MM.png') }}" alt="" height="50" width="90%"> --}}
                <h2 class="mt-4 mb-4 text-white">BUILD MARKER</h2>

            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title mt-2"><span>@lang('translation.menu')</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link  {{ Route::currentRouteNamed('root') ? 'active' : '' }}" href="{{ url('/') }}">
                        <i class="ri-dashboard-2-line"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::currentRouteNamed('foreman') ? 'active' : '' }}" href="{{ url('foreman') }}">
                        <i class="ri-user-add-fill"></i> <span>Foreman</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::currentRouteNamed('customer') ? 'active' : '' }}" href="{{ url('customer') }}">
                        <i class="ri-group-2-fill"></i> <span>Customers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::currentRouteNamed('project') ? 'active' : '' }}" href="{{ url('project') }}">
                        <i class=" ri-file-fill"></i> <span>Projects</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::currentRouteNamed('project_image') ? 'active' : '' }}" href="{{ url('project_image') }}">
                        <i class="ri-folder-open-line"></i> <span>Project images</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::currentRouteNamed('password') ? 'active' : '' }}" href="{{ url('password') }}">
                        <i class="ri-lock-password-line"></i> <span>Change Password</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
