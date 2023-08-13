@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Properties Table</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Data Table</li>
                        <li class="breadcrumb-item active">Properties Table</li>
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
                            <h4><a href="{{ route('property.create', $owner) }}" class="btn btn-primary">Add New
                                    Property</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive theme-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Property Name</th>
                                            <th>Property Image</th>
                                            <th>Property Type</th>
                                            <th>Price</th>
                                            <th>City</th>
                                            <th>Code</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            @foreach ($properties as $key => $item)
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->property_name }}</td>
                                                <td><img src="{{ asset($item->property_thumbnail) }}"
                                                        style="width:70px; height:40px;"> </td>
                                                <td>{{ $item['type']['type_name'] }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->city }}</td>
                                                <td>{{ $item->property_code }}</td>
                                                <td>
                                                    @if ($item->property_status == 1)
                                                        <span class="badge rounded-pill bg-success">Active</span>
                                                    @else
                                                        <span class="badge rounded-pill bg-danger">Inactive</span>
                                                    @endif
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit"> <a
                                                                href="{{ route('property.edit', [$owner, $item->id]) }}">Edit<i
                                                                    class="icon-pencil-alt"></i></a>
                                                        </li>
                                                        <li class="delete">
                                                            <a href="{{ route('property.destroy', [$owner, $item->id]) }}"
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
