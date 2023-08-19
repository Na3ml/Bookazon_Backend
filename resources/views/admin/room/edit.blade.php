@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/vector-map.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
@endsection


@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Edit Room</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Room</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid form-validate">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">
                        <form class="needs-validation" novalidate="" action="{{ route('rooms.update', $room_data->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="mb-4">
                                    <label class="form-label">Existing Featured Photo</label>
                                    <div>
                                        <img src="{{ asset($room_data->featured_photo) }}" alt="" class="w_200">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change Featured Photo</label>
                                    <input class="form-control" type="file" name="featured_photo" id="validationCustom02"
                                        type="text" required="">
                                    <div class="invalid-feedback">Please Select Room Image.</div>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="validationCustomUsername">Price *</label>
                                    <div class="input-group"><span class="input-group-text">0.00</span>
                                        <input class="form-control" id="validationCustomUsername" type="number"
                                            name="price" aria-label="Amount (to the nearest dollar)"
                                            aria-describedby="inputGroupPrepend" required=""
                                            value="{{ $room_data->price }}">
                                        <div class="invalid-feedback">Please Enter Room Nightly Price.</div>

                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom04">Room Type</label>
                                    <select class="form-select" name="room_type" id="validationCustom04" required="">
                                        <option selected="" disabled="" value="">Choose...</option>

                                        <option {{ $room_data->room_type == 'single' ? 'selected="selected"' : '' }}
                                            value="single">
                                            {{ $room_data->room_type }}</option>
                                        <option value="double"
                                            {{ $room_data->room_type == 'double' ? 'selected="selected"' : '' }}>
                                            double
                                        </option>
                                        <option value="deluxe"
                                            {{ $room_data->room_type == 'deluxe' ? 'selected="selected"' : '' }}>
                                            deluxe
                                        </option>
                                        <option value="suite"
                                            {{ $room_data->room_type == 'suite' ? 'selected="selected"' : '' }}>
                                            suite
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">Please select a valid state.</div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Amenities</label>
                                    @php $i=0; @endphp
                                    @foreach ($all_amenities as $item)
                                        @if (in_array($item->id, $existing_amenities))
                                            @php $checked_type = 'checked'; @endphp
                                        @else
                                            @php $checked_type = ''; @endphp
                                        @endif

                                        @php $i++; @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                                id="defaultCheck{{ $i }}" name="arr_amenities[]"
                                                {{ $checked_type }}>
                                            <label class="form-check-label" for="defaultCheck{{ $i }}">
                                                {{ $item->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="mb-3 row g-3">
                                        <label class="col-sm-3 col-form-label text-sm-end">Availability Date
                                            range</label>
                                        <div class="col-xl-5 col-sm-9">
                                            <input class="datepicker-here form-control digits" type="text"
                                                data-range="true" data-multiple-dates-separator=" - " data-language="en"
                                                name="date_range" value="{{ $room_data->date_range }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustomUsername">Nightly Rate
                                            *</label>
                                        <div class="input-group"><span class="input-group-text">0.00</span>
                                            <input class="form-control" id="validationCustomUsername" type="number"
                                                name="nightly_rate" aria-label="Amount (to the nearest dollar)"
                                                aria-describedby="inputGroupPrepend" required=""
                                                value="{{ $room_data->nightly_rate }}">
                                            <div class="invalid-feedback">Please Enter Room Nightly Price.</div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 row g-3">
                                        <label class="form-label" for="validationCustom03">Occupancy Limit
                                            *</label>
                                        <div class="input-group"><span class="input-group-text">0.00</span>
                                            <input class="form-control" id="validationCustomUsername" type="number"
                                                name="occupancy_limit" aria-label="Amount (to the nearest dollar)"
                                                aria-describedby="inputGroupPrepend" required=""
                                                value="{{ $room_data->occupancy_limit }}">
                                            <div class="invalid-feedback">Please Enter Occupancy Limit.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 row g-3">
                                        <label class="form-label" for="validationCustom03">Additional
                                            fees*</label>
                                        <div class="input-group"><span class="input-group-text">0.00</span>
                                            <input class="form-control" id="validationCustomUsername" type="number"
                                                name=" Additional_fees" aria-label="Amount (to the nearest dollar)"
                                                aria-describedby="inputGroupPrepend" required=""
                                                value="{{ $room_data->Additional_fees }}">
                                            <div class="invalid-feedback">Please Enter Additional fees .</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 row g-3">
                                        <label class="form-label" for="validationCustom04">Attach To
                                            Property</label>
                                        <select class="form-select" name="property_id" id="validationCustom04"
                                            required="">
                                            <option selected="" disabled="" value="">Choose...
                                            </option>

                                            @if ($owner_properties->count())
                                                @foreach ($owner_properties as $property)
                                                    <option value="{{ $property->id }}"
                                                        {{ $property->id == $room_data->property_id ? 'selected="selected"' : '' }}>
                                                        {{ $property->property_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="invalid-feedback">Please select a valid Property.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3 row g-3">
                                        <label class="form-label" for="validationCustom03">Total Beds*</label>
                                        <div class="input-group"><span class="input-group-text">0.00</span>
                                            <input class="form-control" id="validationCustomUsername" type="number"
                                                name=" total_beds" aria-label="Amount (to the nearest dollar)"
                                                aria-describedby="inputGroupPrepend" required=""
                                                value="{{ $room_data->total_beds }}">
                                            <div class="invalid-feedback">Please Enter Total Beds .</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 row g-3">
                                        <label class="form-label" for="validationCustom03">Total
                                            Bathrooms*</label>
                                        <div class="input-group"><span class="input-group-text">0.00</span>
                                            <input class="form-control" id="validationCustomUsername" type="number"
                                                name=" total_bathrooms" aria-label="Amount (to the nearest dollar)"
                                                aria-describedby="inputGroupPrepend" required=""
                                                value="{{ $room_data->total_bathrooms }}">
                                            <div class="invalid-feedback">Please Enter Total Bathrooms .</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 row g-3">
                                        <label class="form-label" for="validationCustom03">Total
                                            Balconies*</label>
                                        <div class="input-group"><span class="input-group-text">0.00</span>
                                            <input class="form-control" id="validationCustomUsername" type="number"
                                                name=" total_balconies" aria-label="Amount (to the nearest dollar)"
                                                aria-describedby="inputGroupPrepend" required=""
                                                value="{{ $room_data->total_balconies }}">
                                            <div class="invalid-feedback">Please Enter Additional fees .</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 row g-3">
                                        <label class="form-label" for="validationCustom03">Total guests*</label>
                                        <div class="input-group"><span class="input-group-text">0.00</span>
                                            <input class="form-control" id="validationCustomUsername" type="number"
                                                name=" total_guests" aria-label="Amount (to the nearest dollar)"
                                                aria-describedby="inputGroupPrepend" required=""
                                                value="{{ $room_data->total_guests }}">
                                            <div class="invalid-feedback">Please Enter Total guests .</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="validationCustomUsername">description</label>
                                <textarea id="editor1" name="description" cols="30" rows="10" required>{{ $room_data->description }}</textarea>

                                <div class="invalid-feedback">Please Enter description.</div>
                            </div>
                            <div id="html_container"></div>

                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Video Preview</label>
                                    <div class="iframe-container1">
                                        <video width="140" height="140" controls>
                                            <source src="{{ URL::asset($room_data->video_id) }}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                                <div class="mb-3 row g-3">
                                    <label class="form-label" for="validationCustom02">Video *</label>
                                    <input class="form-control" type="file" name="video_id" id="validationCustom02"
                                        value="{{ $room_data->video_id }}">
                                    <div class="invalid-feedback">Please Select Room Video.</div>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>



                            <div class="mb-3 text-center m-t-5">
                                <button class="btn btn-primary w-25" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/chart/chartist/chartist.js') }}"></script>
    <script src="{{ asset('assets/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/vector-map/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js') }}"></script>
    <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js') }}"></script>
    <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-au-mill.js') }}"></script>
    <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js') }}"></script>
    <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-in-mill.js') }}"></script>
    <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-asia-mill.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
    <script src="{{ asset('assets/js/notify/index.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
    <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/js/editor/ckeditor/adapters/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/editor/ckeditor/styles.js') }}"></script>
    <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
@endsection
