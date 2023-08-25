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
                    <h3>Create Property</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('property.index', $owner) }}">Property</a></li>
                        <li class="breadcrumb-item active">Create</li>
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
                    {{--                <div class="card-header pb-0"> --}}
                    {{--                    <h4>Create Property</h4> --}}
                    {{--                </div> --}}


                    <div class="card-body">
                        <form class="needs-validation" novalidate="" action="{{ route('property.store', $owner) }}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label">Property Name</label>
                                    <input type="text" name="property_name" class="form-control"
                                           value="{{ old('property_name') }}">
                                    @error('property_name')
                                    <div class="invalid font-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Property status</label>

                                    <select name="property_status" class="form-select" type="text" required required>
                                        <option value="">-- Select status --</option>
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>

                                    </select>
                                    @error('property_status')
                                    <div class="invalid font-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Property price</label>
                                    <input class="form-control" type="number" name="price" required
                                           value="{{ old('price') }}">
                                    @error('price')
                                    <div class="invalid font-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Additional fees</label>
                                    <input class="form-control" type="text" name="Additional_fees" required
                                           value="{{ old('Additional_fees') }}">
                                    @error('Additional_fees')
                                    <div class="invalid font-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Property size</label>
                                    <input type="text" name="property_size" class="form-control"
                                           value="{{ old('property_size') }}">
                                    @error('property_size')
                                    <div class="invalid font-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                                    @error('address')
                                    <div class="invalid font-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Country</label>
                                    <select id="country-dd" class="form-select" name="country" required>
                                        <option value="">-- Select Country --</option>
                                        @foreach ($countries as $data)
                                            <option value="{{ $data->id }}">
                                                {{ $data->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                    <div class="invalid font-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">State</label>
                                    <select id="state-dd" class="form-select" name="state" required>
                                    </select>
                                    @error('state')
                                    <div class="invalid font-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">City</label>

                                    <select id="city-dd" class="form-select" name="city" required>
                                    </select>
                                    @error('city')
                                    <div class="invalid font-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Property Type </label>
                                        <select name="ptype_id" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select Type</option>
                                            @foreach ($propertytype as $ptype)
                                                <option value="{{ $ptype->id }}">{{ $ptype->type_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('ptype_id')
                                        <div class="invalid font-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!-- Col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Property Amenities </label>
                                        <select name="amenities_id[]" class="js-example-basic-multiple form-select"
                                                multiple="multiple" data-width="100%">

                                            @foreach ($amenities as $ameni)
                                                <option value="{{ $ameni->id }}">{{ $ameni->amenities_name }}</option>
                                            @endforeach

                                        </select>
                                        @error('amenities_id')
                                        <div class="invalid font-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!-- Col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Main Thambnail </label>
                                        <input type="file" name="property_thambnail" class="form-control">

                                        <img src="" id="mainThmb">
                                    </div>
                                    @error('property_thambnail')
                                    <div class="invalid font-danger">{{ $message }}</div>
                                    @enderror
                                </div><!-- Col -->

                                <div class="col-sm-6">
                                    <div class="mb-3">

                                        <label class="form-label">Multiple Image </label>
                                        <input type="file" name="multi_img[]" class="form-control" id="multiImg"
                                               multiple="">

                                        <div class="row" id="preview_img"></div>

                                        @error('multi_img')
                                        <div class="invalid font-danger">{{ $message }}</div>
                                        @enderror
                                    </div><!-- Col -->
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Availability Date
                                            range</label>
                                        <input class="datepicker-here form-control digits" type="text"
                                               data-range="true" data-multiple-dates-separator=" - " data-language="en"
                                               name="date_range" value="{{ old('date_range') }}" required>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">

                                        <label class="form-label">Latitude</label>
                                        <input type="text" name="latitude" class="form-control"
                                               value="{{ old('latitude') }}">
                                        <a href="https://www.latlong.net/convert-address-to-lat-long.html"
                                           target="_blank">Go here to get Latitude from address</a>
                                    </div>
                                    @error('latitude')
                                    <div class="invalid font-danger">{{ $message }}</div>
                                    @enderror
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">

                                        <label class="form-label">Longitude</label>
                                        <input type="text" name="longitude" class="form-control"
                                               value="{{ old('longitude') }}">
                                        <a href="https://www.latlong.net/convert-address-to-lat-long.html"
                                           target="_blank">Go here to get Longitude from address</a>
                                    </div>
                                    @error('longitude')
                                    <div class="invalid font-danger">{{ $message }}</div>
                                    @enderror
                                </div><!-- Col -->
                            </div><!-- Row -->

                            <div class="row add_item">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="facility_name" class="form-label">Facilities </label>
                                        <select name="facility_name[]" id="facility_name" class="form-control">
                                            <option value="">Select Facility</option>
                                            <option value="Hospital">Hospital</option>
                                            <option value="SuperMarket">Super Market</option>
                                            <option value="School">School</option>
                                            <option value="Entertainment">Entertainment</option>
                                            <option value="Pharmacy">Pharmacy</option>
                                            <option value="Airport">Airport</option>
                                            <option value="Railways">Railways</option>
                                            <option value="Bus Stop">Bus Stop</option>
                                            <option value="Beach">Beach</option>
                                            <option value="Mall">Mall</option>
                                            <option value="Bank">Bank</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="distance" class="form-label"> Distance </label>
                                        <input type="text" name="distance[]" id="distance" class="form-control"
                                               placeholder="Distance (Km)">
                                    </div>
                                </div>
                                <div class="form-group col-md-4" style="padding-top: 30px;">
                                    <a class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> Add
                                        More..</a>
                                </div>
                                @error('facility_name')
                                <div class="invalid font-danger">{{ $message }}</div>
                                @enderror
                            </div> <!---end row-->

                            <!--========== Start of add multiple class with ajax ==============-->
                            <div style="visibility: hidden">
                                <div class="whole_extra_item_add" id="whole_extra_item_add">
                                    <div class="whole_extra_item_delete" id="whole_extra_item_delete">
                                        <div class="container mt-2">
                                            <div class="row">

                                                <div class="form-group col-md-4">
                                                    <label for="facility_name">Facilities</label>
                                                    <select name="facility_name[]" id="facility_name"
                                                            class="form-control">
                                                        <option value="">Select Facility</option>
                                                        <option value="Hospital">Hospital</option>
                                                        <option value="SuperMarket">Super Market</option>
                                                        <option value="School">School</option>
                                                        <option value="Entertainment">Entertainment</option>
                                                        <option value="Pharmacy">Pharmacy</option>
                                                        <option value="Airport">Airport</option>
                                                        <option value="Railways">Railways</option>
                                                        <option value="Bus Stop">Bus Stop</option>
                                                        <option value="Beach">Beach</option>
                                                        <option value="Mall">Mall</option>
                                                        <option value="Bank">Bank</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="distance">Distance</label>
                                                    <input type="text" name="distance[]" id="distance"
                                                           class="form-control" placeholder="Distance (Km)">
                                                </div>
                                                <div class="form-group col-md-4" style="padding-top: 20px">
                                                    <span class="btn btn-success btn-sm addeventmore"><i
                                                            class="fa fa-plus-circle">Add</i></span>
                                                    <span class="btn btn-danger btn-sm removeeventmore"><i
                                                            class="fa fa-minus-circle">Remove</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <label class="form-label">description</label>
                                <textarea id="editor1" name="description" cols="30" rows="10"></textarea>
                                @error('description')
                                <div class="invalid font-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div id="html_container"></div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="d-block" for="chk-ani">
                                        <input class="checkbox_animated" id="chk-ani" type="checkbox" name="featured">
                                        Features Property
                                    </label>

                                </div>
                                <div class="col-md-6">
                                    <label class="d-block" for="chk-ani1">
                                        <input class="checkbox_animated" id="chk-ani1" type="checkbox" name="hot">
                                        Hot Property
                                    </label>

                                </div>
                            </div>
                    </div>

{{--                    <iframe--}}
{{--                        width="600"--}}
{{--                        height="450"--}}
{{--                        style="border:0"--}}
{{--                        loading="lazy"--}}
{{--                        allowfullscreen--}}
{{--                        referrerpolicy="no-referrer-when-downgrade"--}}
{{--                        src="https://www.google.com/maps/embed/v1/place?key=--}}
{{--    &q=Space+Needle,Seattle+WA">--}}
{{--                    </iframe>--}}

                    <div class="mb-3 text-center m-t-5">
                        <button class="btn btn-primary w-25" type="submit">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#country-dd').on('change', function () {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{ url('admin/dashboard/api/fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state-dd').on('change', function () {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{ url('admin/dashboard/api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <script>
        $(document).ready(function () {
            $('#multiImg').on('change', function () { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function (index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                            .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function (file) { //trigger function on successful read
                                return function (e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                        e.target.result).width(100)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>


    <!----For Section-------->
    <script type="text/javascript">
        $(document).ready(function () {
            var counter = 0;
            $(document).on("click", ".addeventmore", function () {
                var whole_extra_item_add = $("#whole_extra_item_add").html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", ".removeeventmore", function (event) {
                $(this).closest("#whole_extra_item_delete").remove();
                counter -= 1
            });
        });
    </script>

    <!--========== End of add multiple class with ajax ==============-->
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
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
@endsection
