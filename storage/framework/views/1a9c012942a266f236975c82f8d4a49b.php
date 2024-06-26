<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="<?php echo e(route('root')); ?>" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('build/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('build/images/logo-dark.png')); ?>" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="<?php echo e(route('root')); ?>" class="logo logo-light mt-4">
            <span class="logo-sm">
                
                <h5 class="mt-4 mb-4 text-white">BM</h5>

            </span>
            <span class="logo-lg ">
                
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
                <li class="menu-title mt-2"><span><?php echo app('translator')->get('translation.menu'); ?></span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link  <?php echo e(Route::currentRouteNamed('root') ? 'active' : ''); ?>" href="<?php echo e(url('/')); ?>">
                        <i class="ri-dashboard-2-line"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(Route::currentRouteNamed('foreman') ? 'active' : ''); ?>" href="<?php echo e(url('foreman')); ?>">
                        <i class="ri-user-add-fill"></i> <span>Foreman</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(Route::currentRouteNamed('customer') ? 'active' : ''); ?>" href="<?php echo e(url('customer')); ?>">
                        <i class="ri-group-2-fill"></i> <span>Customers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(Route::currentRouteNamed('project') ? 'active' : ''); ?>" href="<?php echo e(url('project')); ?>">
                        <i class=" ri-file-fill"></i> <span>Projects</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(Route::currentRouteNamed('password') ? 'active' : ''); ?>" href="<?php echo e(url('password')); ?>">
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
<?php /**PATH C:\xampp\htdocs\build_marker\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>