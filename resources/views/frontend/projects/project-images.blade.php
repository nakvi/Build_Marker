@extends('layouts.master')
@section('title')
    @lang('translation.gallery')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/glightbox/css/glightbox.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Project
        @endslot
        @slot('title')
            Gallery
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
            <div class="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="row gallery-wrapper">
                                @if (count($projectImages))
                                @foreach ($projectImages as $projectImage)
                                    <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development"
                                        data-category="designing development">
                                        <div class="gallery-box card card-border-effect-none">
                                            <div class="gallery-container">
                                                <a class="image-popup"
                                                    href="{{ asset('storage/' . $projectImage->image) }}" title="">
                                                    <img class="gallery-img img-fluid mx-auto" src="{{ asset('storage/' . $projectImage->image) }}" alt="" />
                                                </a>
                                            </div>
                                            <div class="box-content">
                                                <div class="d-flex align-items-center mt-1">
                                                    <div class="flex-grow-1 text-muted"> <a href=""
                                                            class="text-body text-truncate"></a></div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex gap-3">
                                                            <ul class="gap-2 mb-0 p-0">
                                                                {{-- <li class="list-inline-item" data-bs-toggle="tooltip"
                                                                    data-bs-trigger="hover" data-bs-placement="top"
                                                                    title="Edit">
                                                                    <a class="edit-item-btn" data-id=""
                                                                        href="#showModal" data-bs-toggle="modal"><i
                                                                            class="ri-pencil-fill align-bottom text-muted"></i></a>
                                                                </li> --}}
                                                                <li class="list-inline-item" data-bs-toggle="tooltip"
                                                                    data-bs-trigger="hover" data-bs-placement="top"
                                                                    title="Delete">
                                                                    <a class="remove-item-btn"
                                                                        data-id="{{ $projectImage->id }}"
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
                                @endforeach
                                @else
                                <h1 class="text-center">No Images</h1>
                                @endif
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
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('build/libs/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/gallery.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
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
@endsection
