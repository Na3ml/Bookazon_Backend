@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                    <div class="col-sm-6">
                        <h3>Property Type Table</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                            </li>
                            <li class="breadcrumb-item">Data Table</li>
                            <li class="breadcrumb-item active">Property Type Table</li>
                        </ol>
                    </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <!-- Zero Configuration  Starts-->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><a href="{{ route('propertytype.create') }}" class="btn btn-primary">Add New Property Type</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive theme-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Serial Number</th>
                                            <th>Type Name</th>
                                            <th>Type Icon</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            @foreach ($types as $key => $item)
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->type_name }}</td>
                                                <td><img src="{{ asset($item->type_icon) }}" width="50" /></td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit"> <a
                                                                href="{{ route('propertytype.edit', $item->id) }}">Edit<i
                                                                    class="icon-pencil-alt"></i></a>
                                                        </li>
                                                        <li class="delete">
                                                            <a href="{{ route('propertytype.destroy', $item->id) }}"
                                                                data-confirm-delete="true">Delete</a><i
                                                                class="icon-trash"></i>

                                                        </li>
                                                    </ul>
                                                </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Zero Configuration  Ends-->

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection
