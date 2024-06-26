@extends('layouts.master')
@section('title')
Project
@endsection
@section('css')
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Project
        @endslot
        @slot('title')
        Project
        @endslot
    @endcomponent
    <div class="row">

  <div class="col-lg-12">
            @if (Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }} text-center" id="alert-message">
                {{ Session::get('message') }}
            </div>

            <script>
                // Add a timer to automatically dismiss the alert after 5 seconds (adjust as needed)
                setTimeout(function() {
                    document.getElementById('alert-message').style.display = 'none';
                }, 5000); // 5000 milliseconds = 5 seconds
            </script>
        @endif
        @error('name')
            <div class="alert alert-danger" id="alert-message">
                {{ $message }}
            </div>

            <script>
                // Add a timer to automatically dismiss the alert after 5 seconds (adjust as needed)
                setTimeout(function() {
                    document.getElementById('alert-message').style.display = 'none';
                }, 5000); //
            </script>
        @enderror
        @if ($errors->any())
    <div class="alert alert-danger text-center">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <button type="button" class="btn btn-primary add-btn align-item-end ms-auto" data-bs-toggle="modal"
                    id="create-btn" data-bs-target="#showModal"><i
                        class="ri-add-line align-bottom me-1 "></i> Add
                    Project</button>
                    {{-- <h5 class="card-title mb-0">Buttons Datatables</h5> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table  id="buttons-datatables"  class="table align-middle table-nowrap mb-0" style="width:100%">
                            <thead class="table-light">
                            <tr>
                                <th class="text-center px-2">Index</th>
                                <th>Project Name</th>
                                <th>Customer Name</th>
                                <th>Foreman Name</th>
                                <th>Status</th>
                                <th class="text-center px-5">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr  @if ($loop->even) class="bg-light bg-opacity-50" @endif>
                                    <td class="text-center ">{{ $loop->iteration }}</td>
                                    <td class="">{{ $project->name }}</td>
                                    <td>{{ $project->user ? $project->user->name : 'No user assigned' }}</td>
                                    <td>{{ $project->foreman ? $project->foreman->name : 'No foreman assigned' }}</td>

                                    <td class="">{{ $project->status }}</td>
                                    <td class="text-center ">
                                        <ul class="gap-2 mb-0 p-0">
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                <a href="{{ url('/project_images/'.$project->id) }}"><i class=" ri-eye-fill align-bottom text-muted"></i></a>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                <a class="edit-item-btn" data-id="{{ $project->id }}"  href="#showModal" data-bs-toggle="modal"><i
                                                            class="ri-pencil-fill align-bottom text-muted"></i></a>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip"
                                                data-bs-trigger="hover" data-bs-placement="top" title="Delete">
                                                <a class="remove-item-btn" data-id="{{ $project->id }}"  data-bs-toggle="modal"
                                                    href="#deleteRecordModal">
                                                    <i class="ri-delete-bin-fill align-bottom text-muted"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
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
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add project</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form class="tablelist-form preloaderForm"  id="leadtype_form" action="{{ url('/add_project') }}"
                    method="Post" autocomplete="off" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">

                        <input type="hidden" id="id-field" />
                        <div class="row g-3">
                            <!-- Row 1 -->
                                <div class="col-lg-12">
                                    <div>
                                        <label for="project_name" class="form-label">Project Name</label>
                                        <input type="text" id="project_name" {{old('project_name')}} name="project_name" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <label for="address" class="form-label">Project Address</label>
                                        <input type="text" id="project_address" name="project_address" {{old('project_address')}} class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-2">
                                    <label for="project_name" class="form-label">Select Customer for Project</label>
                                    <select class="js-example-basic-multiple" name="customer_id" id="customer_id">
                                        @foreach ($customers as $customer )
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12 mt-2">
                                    <label for="project_name" class="form-label">Select Foreman for Project</label>
                                    <select class="js-example-basic-multiple" name="foreman_id" id="foreman_id">
                                        @foreach ($foremans as $foreman )
                                            <option value="{{ $foreman->id }}">{{ $foreman->name }}</option>
                                        @endforeach
                                    </select>
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
                        <h4 class="fs-semibold">You are about to delete a project ?</h4>
                        <p class="text-muted fs-14 mb-4 pt-1">Deleting your project will
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
@endsection
@section('script')


    {{-- <script src="{{ URL::asset('build/js/app.js') }}"></script> --}}
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

    <script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script src="{{ URL::asset('build/js/app.js') }}"></script>
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
            // Get the ID from the data category

            var itemId = $(this).data('id');
            var url = '{{ url("/project_edit") }}' + '/' + itemId + '/edit';
            $.ajax({
                    url: url, // Adjust the route as needed
                    type: 'GET',
                    success: function(response) {
                        var project = response.project;
                        $('#id-field').val(project.id);
                        $('#project_name').val(project.name);
                        $('#project_address').val(project.address);

                        $('#exampleModalLabel').html("Edit Project");

                        $('#showModal .modal-footer').css('display', 'block');

                        $('#add-btn').html("Update");
                        var form = $('#leadtype_form');

                        $('#leadtype_form').attr('action', '{{ url("/project_update") }}/' + itemId);


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
            $('#leadtype_form').attr('action', '{{ url("/categories") }}');

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
    var url = '/project_delete/' + itemId; // Use the correct delete route

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
    <script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>
@endsection
