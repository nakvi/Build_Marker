<?php $__env->startSection('title'); ?>
Customer
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Customer
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
        Customer
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
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <button type="button" class="btn btn-primary add-btn align-item-end ms-auto" data-bs-toggle="modal"
                    id="create-btn" data-bs-target="#showModal"><i
                        class="ri-add-line align-bottom me-1 "></i> Add
                    Customer</button>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table  id="buttons-datatables"  class="table align-middle  mb-0" style="width:100%">
                            <thead class="table-light">
                            <tr>
                                <th class="text-center px-2">Index</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Project Name</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Module</th>
                                <th>Percentage</th>
                                <th>Project Foreman</th>
                                <th class="text-center px-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $customer->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr <?php if($loop->parent->even): ?> class="bg-light bg-opacity-50" <?php endif; ?>>
                                    <td class="text-center"><?php echo e($loop->parent->iteration); ?></td>
                                    <td class="p-1"><?php echo e($customer->name); ?></td>
                                    <td class="p-1"><?php echo e($customer->email); ?></td>
                                    <td class="p-1"><?php echo e($project->name); ?></td>
                                    <td class="p-1"><?php echo e($project->address); ?></td>
                                    <td class="p-1"><?php echo e($project->status); ?></td>
                                    <td class="p-1"><?php echo e($project->module); ?></td>
                                    <td class="text-center p-1"><?php echo e($project->percentage); ?>%</td>
                                    <td class="p-1"><?php echo e($project->foreman ? $project->foreman->name : 'No foreman assigned'); ?></td>
                                    <td class="text-center p-1">
                                        <ul class="gap-2 mb-0 p-0">
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                <a href="<?php echo e(url('/customer_edit/'.$project->id)); ?>"><i class="ri-pencil-fill align-bottom text-muted"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>

                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary p-3">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add customer</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form class="tablelist-form preloaderForm"  id="leadtype_form" action="<?php echo e(url('/add_customer')); ?>"
                    method="Post" autocomplete="off" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="modal-body">

                        <input type="hidden" id="id-field" />
                        <div class="row g-3">
                            <!-- Row 1 -->
                            

                                <div class="col-lg-12">
                                    <div>
                                        <label for="name" class="form-label">Customer Name</label>
                                        <input type="text" id="name" name="name"  <?php echo e(old('name')); ?> class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <label for="email" class="form-label">Customer Email</label>
                                        <input type="email" id="email" <?php echo e(old('email')); ?> name="email" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-2">
                                    <label for="project_name" class="form-label">Select Foreman for Project</label>
                                    <select class="js-example-basic-multiple" name="foreman_id" id="foreman_id">
                                        <?php $__currentLoopData = $foremans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foreman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($foreman->id); ?>"><?php echo e($foreman->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <label for="project_name" class="form-label">Project Name</label>
                                        <input type="text" id="project_name" <?php echo e(old('project_name')); ?> name="project_name" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <label for="address" class="form-label">Project Address</label>
                                        <input type="text" id="project_address" name="project_address" <?php echo e(old('project_address')); ?> class="form-control" required />
                                    </div>
                                </div>


                            <!-- Row 2 -->

                        </div>
                        <!--end row-->
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="add-btn">Add </button>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!--end modal-->

<!-- Modal -->
    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1"
        aria-labelledby="deleteRecordLabel" aria-hidden="true">
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
                        <h4 class="fs-semibold">You are about to delete a customer ?</h4>
                        <p class="text-muted fs-14 mb-4 pt-1">Deleting your customer will
                            remove all of your information from our database.</p>
                        <div class="hstack gap-2 justify-content-center remove">
                            <button
                                class="btn btn-link link-success fw-medium text-decoration-none shadow-none"
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

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="<?php echo e(URL::asset('build/js/pages/datatables.init.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
    <script>
          $(document).ready(function () {
            // Function to add a new input field and delete button
            function newInput() {
                var newItem =
                        // '<label for="attribute_values" class="form-label">Attribute Value</label>' +
                        '<div class="input-group">' +
                        '<input type="text" class="form-control attribute-value mt-1" id="attribute_values"  name="attribute_values[]" required />' +
                        '<button type="button" class="btn btn-danger btn-sm delete-item mt-1">Delete</button>' +
                        '</div>';
                        // '</div>';
                $('#attribute-item').append(newItem);
            }

            // Function to remove the parent element (item) when delete button is clicked
            $('#attribute-item').on('click', '.delete-item', function () {
                $(this).closest('.input-group').remove();
            });

            // Event handler for the "Add Item" link
            $('#add-item').on('click', function () {
                newInput();
            });
        });
    jQuery(document).ready(function($) {



        // When the document is ready, attach a click event to the "Edit" button
        $('.edit-item-btn').on('click', function() {
            // Get the ID from the data customer

            var itemId = $(this).data('id');
            var url = '<?php echo e(url("/categories")); ?>' + '/' + itemId + '/edit';


            $.ajax({
                    url: url, // Adjust the route as needed
                    type: 'GET',
                    success: function(response) {
                        var category = response.category;

                        $('#id-field').val(category.id);
                        $('#name').val(category.name);
                        $('#parent_id').val(category.parent_id).trigger('change');
                         // Update checkbox state
                        $('#is_active').prop('checked', category.is_active === 1);

                        // Update category.is_active when checkbox state changes
                        $('#is_active').off('change').on('change', function() {
                            category.is_active = $(this).is(':checked') ? 1 : 0;
                        });

                        $('#exampleModalLabel').html("Edit Category");

                        $('#showModal .modal-footer').css('display', 'block');

                        $('#add-btn').html("Update");
                        var form = $('#leadtype_form');

                        $('#leadtype_form').attr('action', '<?php echo e(url("/categories")); ?>/' + itemId);


                    },
                    error: function(xhr, status, error) {
                        console.error(xhr, status, error);
                    }
                });
        });

        function resetModal() {
            $('#exampleModalLabel').html("Add Category");

            $('#showModal .modal-footer').css('display', 'block');

            $('#add-btn').html("Add");
            $('#leadtype_form').attr('action', '<?php echo e(url("/categories")); ?>');

            $('#id-field').val('');
            $('#name').val('');
            $('#attribute_code').val('');
            $('#sort_order').val('').trigger('change');
            $('#attribute_values').val('');
            $('#attribute-item').empty();
            var newItem =
                        // '<label for="attribute_values" class="form-label">Attribute Value</label>' +
                        '<div class="input-group">' +
                        '<input type="text" class="form-control attribute-value mt-1" id="attribute_values"  name="attribute_values[]" required />' +
                        // '<button type="button" class="btn btn-danger btn-sm delete-item mt-1">Delete</button>' +
                        '</div>';
                        // '</div>';
                $('#attribute-item').append(newItem);
            // $('#is_active').prop('checked', true);
            // Reset select box with ID "parent_id"
            $('#parent_id').val('').trigger('change');

            // Reset checkbox with ID "is_active"
            $('#is_active').prop('checked', false);
        }

        $('#showModal').on('hidden.bs.modal', function () {
            resetModal();
        });

        $('.remove-item-btn').on('click', function() {
            var itemId = $(this).data('id');
            $('#delete-record').attr('data-id', itemId);
        });

        $('#delete-record').on('click', function() {
    var itemId = $(this).data('id');
    var url = '/customer_delete/' + itemId; // Use the correct delete route

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



        $('#close-modal').on('click', function() {
            resetModal();
        });
    });


    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/select2.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\build_marker\resources\views/frontend/customer/customer.blade.php ENDPATH**/ ?>