 
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.dashboards'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Dashboard
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
        Dashboard
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col">

            <div class="h-100">
                <!--end row-->
                <div class="row ">
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body bg-primary bg-opacity-25">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                            <i class="ri-group-2-fill align-middle"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Customer</p>
                                        <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo e($totalCustomers); ?>"><?php echo e($totalCustomers); ?></span></h4>
                                    </div>
                                    
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body bg-danger bg-opacity-25">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-light text-danger text-opacity-75 rounded-circle fs-3">
                                            <i class="ri-user-add-fill align-middle"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Foreman</p>
                                        <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo e($totalForemans); ?>"><?php echo e($totalForemans); ?></span></h4>
                                    </div>

                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body bg-success bg-opacity-25">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-light text-success rounded-circle fs-3">
                                            <i class="ri-file-fill align-middle"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Total Project</p>
                                        <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo e($totalProjects); ?>"><?php echo e($totalProjects); ?></span></h4>
                                    </div>

                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div><!-- end row -->
                <div class="row ">
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body bg-warning bg-opacity-25">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-light text-warning rounded-circle fs-3">
                                            <i class="ri-file-fill align-middle"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Completed Project</p>
                                        <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo e($totalCompleteds); ?>"><?php echo e($totalCompleteds); ?></span></h4>
                                    </div>

                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body bg-info bg-opacity-25">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-light text-info rounded-circle fs-3">
                                            <i class="ri-file-fill align-middle"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Progress Project</p>
                                        <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo e($totalProgress); ?>"><?php echo e($totalProgress); ?></span></h4>
                                    </div>

                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body bg-danger bg-opacity-50">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-light text-danger rounded-circle fs-3">
                                            <i class="ri-file-fill align-middle"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Total Pending Project</p>
                                        <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo e($totalPendings); ?>"><?php echo e($totalPendings); ?></span></h4>
                                    </div>

                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div><!-- end row -->

            </div> <!-- end .h-100-->

        </div> <!-- end col -->

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/jsvectormap/maps/world-merc.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>
    <!-- dashboard init -->
    <script src="<?php echo e(URL::asset('build/js/pages/dashboard-ecommerce.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\build_marker\resources\views/index.blade.php ENDPATH**/ ?>