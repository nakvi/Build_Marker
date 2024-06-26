@extends('layouts.master')
@section('title')
Customer
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
            Customer
        @endslot
        @slot('title')
        Edit Customer
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

                <div class="card-body">
                    <form class="tablelist-form preloaderForm"  id="leadtype_form" action="{{ url('/update_customer/'.$customer->user->id) }}"
                    method="Post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="project_id"  value="{{$customer->id}}" />
                        <div class="row g-3">
                            <!-- Row 1 -->
                                <div class="col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">Customer Name</label>
                                        <input type="text" id="name" name="name"  value={{$customer->user->name}} class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <label for="email" class="form-label">Customer Email</label>
                                        <input type="email" id="email" value={{$customer->user->email}} name="email" class="form-control" required />
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div>
                                        <label for="project_name" class="form-label">Project Name</label>
                                        <input type="text" id="project_name" value={{$customer->name}} name="project_name" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">Project Address</label>
                                        <input type="text" id="project_address" name="project_address" value={{$customer->address}} class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="module" class="form-label">Module</label>
                                        <select class="form-control" id="choices-multiple-remove-button" data-choices data-choices-removeItem name="module[]"
                                            multiple>
                                            <option value="foundation" >Foundation</option>
                                            <option value="frame">Frame</option>
                                            <option value="roof">Roof</option>
                                            <option value="door&window">Doors & Windows</option>
                                            <option value="finished">Finished</option>
                                        </select>
                                    </div>
                                </div>
                            <!-- Row 2 -->
                        </div>
                        <!--end row-->
                    </div>
                        <div class="hstack gap-2 justify-content-end p-2">
                            <button type="submit" class="btn btn-primary" id="add-btn">Update Customer </button>

                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>


<!--end modal-->


@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>
@endsection
