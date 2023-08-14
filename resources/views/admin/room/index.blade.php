@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Rooms Table</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Data Table</li>
                        <li class="breadcrumb-item active">Rooms Table</li>
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
                            <h4><a href="{{ route('rooms.create') }}" class="btn btn-primary">Add New
                                    Room</a>
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

                                            @php $i=0; @endphp
                                            @foreach ($rooms as $row)
                                                @php $i++; @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/' . $row->featured_photo) }}" alt=""
                                                    class="w_200">
                                            </td>
                                            <td>{{ $row->name }}</td>
                                            <td>${{ $row->price }}</td>
                                            <td class="pt_10 pb_10">

                                                <button class="btn btn-warning" data-toggle="modal"
                                                    data-target="#exampleModal{{ $i }}">Detail</button>

                                                <a href="{{ route('admin_room_gallery', $row->id) }}"
                                                    class="btn btn-success">Gallery</a>

                                                <a href="{{ route('admin_room_edit', $row->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ route('admin_room_delete', $row->id) }}" class="btn btn-danger"
                                                    onClick="return confirm('Are you sure?');">Delete</a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Room Detail</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Photo</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <img src="{{ asset('uploads/' . $row->featured_photo) }}"
                                                                    alt="" class="w_200">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Name</label>
                                                            </div>
                                                            <div class="col-md-8">{{ $row->name }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label
                                                                    class="form-label">Description</label></div>
                                                            <div class="col-md-8">{!! $row->description !!}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Price (per
                                                                    night)</label></div>
                                                            <div class="col-md-8">${{ $row->price }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Total
                                                                    Rooms</label></div>
                                                            <div class="col-md-8">{{ $row->total_rooms }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Total
                                                                    Amenities</label></div>
                                                            <div class="col-md-8">
                                                                @php
                                                                    $arr = explode(',', $row->amenities);
                                                                    for ($j = 0; $j < count($arr); $j++) {
                                                                        $temp_row = \App\Models\Amenity::where('id', $arr[$j])->first();
                                                                        echo $temp_row->name . '<br>';
                                                                    }
                                                                @endphp
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Size</label>
                                                            </div>
                                                            <div class="col-md-8">{{ $row->size }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Total
                                                                    Beds</label></div>
                                                            <div class="col-md-8">{{ $row->total_beds }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Total
                                                                    Bathrooms</label></div>
                                                            <div class="col-md-8">{{ $row->total_bathrooms }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Total
                                                                    Balconies</label></div>
                                                            <div class="col-md-8">{{ $row->total_balconies }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Total
                                                                    Guests</label></div>
                                                            <div class="col-md-8">{{ $row->total_guests }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Video</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="iframe-container1">
                                                                    <iframe width="560" height="315"
                                                                        src="https://www.youtube.com/embed/{{ $row->video_id }}"
                                                                        title="YouTube video player" frameborder="0"
                                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                        allowfullscreen></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
