<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.gallery'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/glightbox/css/glightbox.min.css')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Project
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Gallery
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if(Session::has('message')): ?>
                <div class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?> text-center" id="alert-message">
                    <?php echo e(Session::get('message')); ?>

                </div>

                <script>
                    // Add a timer to automatically dismiss the alert after 5 seconds (adjust as needed)
                    setTimeout(function() {
                        document.getElementById('alert-message').style.display = 'none';
                    }, 5000); // 5000 milliseconds = 5 seconds
                </script>
            <?php endif; ?>
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger" id="alert-message">
                    <?php echo e($message); ?>

                </div>

                <script>
                    // Add a timer to automatically dismiss the alert after 5 seconds (adjust as needed)
                    setTimeout(function() {
                        document.getElementById('alert-message').style.display = 'none';
                    }, 5000); //
                </script>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger text-center">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="row gallery-wrapper">
                                <?php if(count($projectImages)): ?>
                                <?php $__currentLoopData = $projectImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development"
                                        data-category="designing development">
                                        <div class="gallery-box card card-border-effect-none">
                                            <div class="gallery-container">
                                                <a class="image-popup"
                                                    href="<?php echo e(asset('storage/' . $projectImage->image)); ?>" title="">
                                                    <img class="gallery-img img-fluid mx-auto" src="<?php echo e(asset('storage/' . $projectImage->image)); ?>" alt="" />
                                                </a>
                                            </div>
                                            <div class="box-content">
                                                <div class="d-flex align-items-center mt-1">
                                                    <div class="flex-grow-1 text-muted"> <a href=""
                                                            class="text-body text-truncate"></a></div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex gap-3">
                                                            <ul class="gap-2 mb-0 p-0">
                                                                
                                                                <li class="list-inline-item" data-bs-toggle="tooltip"
                                                                    data-bs-trigger="hover" data-bs-placement="top"
                                                                    title="Delete">
                                                                    <a class="remove-item-btn"
                                                                        data-id="<?php echo e($projectImage->id); ?>"
                                                                        data-bs-toggle="modal" href="#deleteRecordModal">
                                                                        <i
                                                                            class="ri-delete-bin-fill align-bottom text-muted"></i>
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <h1 class="text-center">No Images</h1>
                                <?php endif; ?>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- ene card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <!-- Modal -->
    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-labelledby="deleteRecordLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="btn-close"></button>
                </div>
                <div class="modal-body p-5 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                        colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px">
                    </lord-icon>
                    <div class="mt-4 text-center">
                        <h4 class="fs-semibold">You are about to delete a Image ?</h4>
                        <p class="text-muted fs-14 mb-4 pt-1">Deleting your Image will
                            remove all of your information from our database.</p>
                        <div class="hstack gap-2 justify-content-center remove">
                            <button class="btn btn-link link-success fw-medium text-decoration-none shadow-none"
                                data-bs-dismiss="modal" id="deleteRecord-close"><i
                                    class="ri-close-line me-1 align-middle"></i>
                                Close</button>
                            <button class="btn btn-danger" id="delete-record">Yes,
                                Delete It!!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?php echo e(URL::asset('build/libs/glightbox/js/glightbox.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/isotope-layout/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/gallery.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            $('.remove-item-btn').on('click', function() {
            var itemId = $(this).data('id');
            $('#delete-record').attr('data-id', itemId);
        });
            $('#delete-record').on('click', function() {
                var itemId = $(this).data('id');
                console.log(itemId);
                var url = '/project_image_delete/' + itemId; // Use the correct delete route

                $.ajax({
                    url: url,
                    type: 'DELETE', // Send a DELETE request
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        $('#deleteRecordModal').modal('hide');
                        Swal.fire('Deleted!',
                                'Your Data has been deleted.',
                                'success')
                            .then((result) => {
                                location.reload();
                            });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr, status, error);
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\build_marker\resources\views/frontend/projects/project-images.blade.php ENDPATH**/ ?>