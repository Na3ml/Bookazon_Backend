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
                                            <th>Room Code Number</th>
                                            <th>Room Image</th>
                                            <th>Room Type</th>
                                            <th>Price</th>
                                            <th>Room Video</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @php $i=0; @endphp
                                            @foreach ($rooms as $key => $item)
                                                @php $i++; @endphp
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->room_number }}</td>
                                                <td>
                                                    <img src="{{ URL::asset($item->featured_photo) }}" alt=""
                                                        width="100" height="100">
                                                </td>
                                                <td>{{ $item->room_type }}</td>

                                                <td>{{ $item->price }}</td>

                                                <td>
                                                    <video width="140" height="140" controls>
                                                        <source src="{{ URL::asset($item->video_id) }}" type="video/mp4">
                                                    </video>
                                                </td>
                                                <td>
                                                    <ul class="action">
                                                        <li> <!-- Vertically centered modal-->
                                                            <button class="btn btn-primary mx-3" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalCenter">Details</button>
                                                            </i>
                                                            </a>
                                                        </li>
                                                        <li class="edit"> <a
                                                                href="{{ route('rooms.edit', $item->id) }}">Edit<i
                                                                    class="icon-pencil-alt"></i></a>
                                                        </li>
                                                        <li class="delete">
                                                            <a href="{{ route('rooms.destroy', $item->id) }}"
                                                                data-confirm-delete="true">Delete</a><i
                                                                class="icon-trash"></i>

                                                        </li>
                                                    </ul>
                                                </td>


                                        </tr>
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenter" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Room Details</h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Photo</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <img src="{{ asset($item->featured_photo) }}"
                                                                    alt="" class="w_200">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Room
                                                                    Number</label>
                                                            </div>
                                                            <div class="col-md-8">{{ $item->room_number }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label
                                                                    class="form-label">Description</label></div>
                                                            <div class="col-md-8">{!! $item->description !!}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Price (per
                                                                    night)</label></div>
                                                            <div class="col-md-8">${{ $item->price }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Belonges TO
                                                                    Property</label></div>
                                                            <div class="col-md-8">
                                                                {{ $item->property->property_name }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Availability
                                                                    start Date</label></div>
                                                            <div class="col-md-8">{{ $item->availability_date_start }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Availability
                                                                    End Date</label></div>
                                                            <div class="col-md-8">{{ $item->availability_date_end }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Total
                                                                    Amenities</label></div>
                                                            <div class="col-md-8">
                                                                @php
                                                                    $arr = explode(',', $item->amenities);
                                                                    for ($j = 0; $j < count($arr); $j++) {
                                                                        $temp_row = \App\Models\Amenity::where('id', $arr[$j])->first();
                                                                        echo $temp_row->amenities_name . '<br>';
                                                                    }
                                                                @endphp
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Occupancy
                                                                    Limit</label>
                                                            </div>
                                                            <div class="col-md-8">{{ $item->occupancy_limit }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Total
                                                                    Beds</label></div>
                                                            <div class="col-md-8">{{ $item->total_beds }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Total
                                                                    Bathrooms</label></div>
                                                            <div class="col-md-8">{{ $item->total_bathrooms }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Total
                                                                    Balconies</label></div>
                                                            <div class="col-md-8">{{ $item->total_balconies }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Total
                                                                    Guests</label></div>
                                                            <div class="col-md-8">{{ $item->total_guests }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Video</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="iframe-container1">
                                                                    <video width="280" height="200" controls>
                                                                        <source src="{{ URL::asset($item->video_id) }}"
                                                                            type="video/mp4">
                                                                    </video>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-bs-dismiss="modal">Close</button>

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
