@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/vector-map.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Edit Propert</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('propertyowner.show', $owner) }}">Property</a></li>
                        <li class="breadcrumb-item active">all</li>
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

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edit Property </h6>


                            <form method="post" action="{{ route('property.update', [$owner, $property->id]) }}"
                                id="myForm" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Property Name </label>
                                            <input type="text" name="property_name" class="form-control"
                                                value="{{ $property->property_name }}">
                                        </div>
                                        @error('property_name')
                                            <div class="invalid font-danger">{{ $message }}</div>
                                        @enderror
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Property Status</label>
                                            <select name="property_status" class="form-select"
                                                id="exampleFormControlSelect1">
                                                <option selected="" disabled="">Select Status</option>
                                                <option value="1"
                                                    {{ $property->property_status == 1 ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0"
                                                    {{ $property->property_status == 0 ? 'selected' : '' }}>Inactive
                                                </option>
                                            </select>
                                            @error('property_status')
                                                <div class="invalid font-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div><!-- Col -->


                                    <div class="col-md-3">
                                        <label class="form-label">Property price</label>
                                        <input class="form-control" type="number" name="price"
                                            value="{{ $property->price }}">
                                        @error('price')
                                            <div class="invalid font-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Additional fees</label>
                                        <input class="form-control" type="text" name="Additional_fees"
                                            value="{{ $property->Additional_fees }}">
                                        @error('Additional_fees')
                                            <div class="invalid font-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Property size</label>
                                        <input type="text" name="property_size" class="form-control"
                                            value="{{ $property->property_size }}">
                                        @error('property_size')
                                            <div class="invalid font-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control"
                                                value="{{ $property->address }}">
                                        </div>
                                        @error('address')
                                            <div class="invalid font-danger">{{ $message }}</div>
                                        @enderror
                                    </div><!-- Col -->


                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Country</label>
                                            <select id="country-dd" class="form-select" name="country">
                                                <option value="">-- Select Country --</option>
                                                @foreach ($countries as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ $data->id == $property->country ? 'selected' : '' }}>
                                                        {{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('country')
                                                <div class="invalid font-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">State</label>
                                            <select id="state-dd" class="form-select" name="state">
                                            </select>
                                            @error('state')
                                                <div class="invalid font-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">City</label>

                                            <select id="city-dd" class="form-select" name="city">
                                            </select>
                                            @error('city')
                                                <div class="invalid font-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div><!-- Row -->


                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label class="form-label">Property Size</label>
                                                <input type="text" name="property_size" class="form-control"
                                                    value="{{ $property->property_size }}">
                                            </div>
                                            @error('property_size')
                                                <div class="invalid font-danger">{{ $message }}</div>
                                            @enderror
                                        </div><!-- Col -->

                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label class="form-label">Property Type </label>
                                                <select name="ptype_id" class="form-select"
                                                    id="exampleFormControlSelect1">
                                                    <option selected="" disabled="">Select Type</option>
                                                    @foreach ($propertytype as $ptype)
                                                        <option value="{{ $ptype->id }}">{{ $ptype->type_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('ptype_id')
                                                    <div class="invalid font-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label class="form-label">Property Amenities </label>
                                                <select name="amenities_id[]"
                                                    class="js-example-basic-multiple form-select" multiple="multiple"
                                                    data-width="100%">

                                                    @foreach ($amenities as $ameni)
                                                        <option value="{{ $ameni->id }}">{{ $ameni->amenities_name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                                @error('amenities_id')
                                                    <div class="invalid font-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Col -->
                                </div>

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Latitude</label>
                                            <input type="text" name="latitude" class="form-control"
                                                value="{{ $property->latitude }}">
                                            <a href="https://www.latlong.net/convert-address-to-lat-long.html"
                                                target="_blank">Go
                                                here to get Latitude from address</a>
                                        </div>
                                        @error('latitude')
                                            <div class="invalid font-danger">{{ $message }}</div>
                                        @enderror
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Longitude</label>
                                            <input type="text" name="longitude" class="form-control"
                                                value="{{ $property->longitude }}">
                                            <a href="https://www.latlong.net/convert-address-to-lat-long.html"
                                                target="_blank">Go
                                                here to get Longitude from address</a>
                                        </div>
                                        @error('longitude')
                                            <div class="invalid font-danger">{{ $message }}</div>
                                        @enderror
                                    </div><!-- Col -->
                                </div><!-- Row -->

                                <!--  /// Property Main Thambnail Image Update //// -->

                                <div class="page-content" style="margin-top: -35px;">

                                    <div class="row profile-body">
                                        <div class="col-md-12 col-xl-12 middle-wrapper">
                                            <div class="row">

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6 class="card-title">Edit Main Thambnail Image </h6>

                                                        <input type="hidden" name="id"
                                                            value="{{ $property->id }}">
                                                        <input type="hidden" name="old_img"
                                                            value="{{ $property->property_thambnail }}">
                                                        <div class="row mb-3">
                                                            <div class="form-group col-md-6">
                                                                <label class="form-label">Main Thambnail </label>
                                                                <input type="file" name="property_thambnail"
                                                                    class="form-control" onChange="mainThamUrl(this)">
                                                                <img src="" id="mainThmb">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="form-label"> </label>
                                                                <img src="{{ asset($property->property_thumbnail) }}"
                                                                    style="width:100px; height:100px;">
                                                            </div>
                                                        </div><!-- Col -->
                                                        @error('property_thambnail')
                                                            <div class="invalid font-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--    /// End  Property Main Thambnail Image Update //// -->
                                <div class="col-md-12">
                                    <label class="form-label">description</label>
                                    <textarea id="editor1" name="description" cols="30" rows="10">{!! $property->description !!}</textarea>
                                    @error('description')
                                        <div class="invalid font-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div id="html_container"></div>


                                <div class="mb-3">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="featured" value="1" class="form-check-input"
                                            id="checkInline1" {{ $property->featured == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkInline1">
                                            Features Property
                                        </label>

                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="hot" value="1" class="form-check-input"
                                            id="checkInline" {{ $property->hot == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkInline">
                                            Hot Property
                                        </label>
                                    </div>


                                </div>

                                <div class="mb-5 text-center mt-3">
                                    <button class="btn btn-primary w-40" type="submit">Save changes</button>
                                </div>


                            </form>







                        </div><!-- Row -->
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--  /// Property Multi Image Update //// -->


    <div class="page-content" style="margin-top: 5px;">

        <div class="container-fluid form-validate">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edit Multi Image </h6>


                            <form method="post" action="{{ route('update.property.multiimage', $owner) }}"
                                id="myForm" enctype="multipart/form-data">
                                @csrf


                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Image</th>
                                                <th>Change Image </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($multiImage as $key => $img)
                                                <tr>

                                                    <td>{{ $key + 1 }}</td>

                                                    <td class="py-1">
                                                        <img src="{{ asset($img->photo) }}" alt="image"
                                                            style="width:50px; height:50px;">
                                                    </td>

                                                    <td>
                                                        <input type="file" class="form-group" name="multi_img">
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>




                                <div class="mb-3 text-center mt-3">
                                    <button class="btn btn-primary w-40" type="submit">Save
                                        changes</button>
                                </div>



                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!--  /// End Property Multi Image Update //// -->




    <!--  /// Facility Update //// -->

    <div class="page-content" style="margin-top: 5px;">

        <div class="container-fluid form-validate">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edit Property Facility </h6>


                            <form method="post" action="{{ route('update.property.facilities', $owner) }}"
                                id="myForm" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $property->id }}">
                                @foreach ($facilities as $item)
                                    <div class="row add_item">
                                        <div class="whole_extra_item_add" id="whole_extra_item_add">
                                            <div class="whole_extra_item_delete" id="whole_extra_item_delete">
                                                <div class="container mt-2">
                                                    <div class="row">

                                                        <div class="form-group col-md-4">
                                                            <label for="facility_name">Facilities</label>
                                                            <select name="facility_name[]" id="facility_name"
                                                                class="form-control">
                                                                <option value="">
                                                                    Select
                                                                    Facility
                                                                </option>
                                                                <option value="Hospital"
                                                                    {{ $item->facility_name == 'Hospital' ? 'selected' : '' }}>
                                                                    Hospital</option>
                                                                <option value="SuperMarket"
                                                                    {{ $item->facility_name == 'SuperMarket' ? 'selected' : '' }}>
                                                                    Super Market</option>
                                                                <option value="School"
                                                                    {{ $item->facility_name == 'School' ? 'selected' : '' }}>
                                                                    School</option>
                                                                <option value="Entertainment"
                                                                    {{ $item->facility_name == 'Entertainment' ? 'selected' : '' }}>
                                                                    Entertainment</option>
                                                                <option value="Pharmacy"
                                                                    {{ $item->facility_name == 'Pharmacy' ? 'selected' : '' }}>
                                                                    Pharmacy</option>
                                                                <option value="Airport"
                                                                    {{ $item->facility_name == 'Airport' ? 'selected' : '' }}>
                                                                    Airport</option>
                                                                <option value="Railways"
                                                                    {{ $item->facility_name == 'Railways' ? 'selected' : '' }}>
                                                                    Railways</option>
                                                                <option value="Bus Stop"
                                                                    {{ $item->facility_name == 'Bus Stop' ? 'selected' : '' }}>
                                                                    Bus Stop</option>
                                                                <option value="Beach"
                                                                    {{ $item->facility_name == 'Beach' ? 'selected' : '' }}>
                                                                    Beach</option>
                                                                <option value="Mall"
                                                                    {{ $item->facility_name == 'Mall' ? 'selected' : '' }}>
                                                                    Mall</option>
                                                                <option value="Bank"
                                                                    {{ $item->facility_name == 'Bank' ? 'selected' : '' }}>
                                                                    Bank</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="distance">Distance</label>
                                                            <input type="text" name="distance[]" id="distance"
                                                                class="form-control" value="{{ $item->distance }}">
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
                                @endforeach
                                <br> <br>
                                <div class="mb-3 text-center mt-3">
                                    <button class="btn btn-primary w-40" type="submit">Save
                                        changes</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--  ///End Facility Update //// -->





    <!--========== Start of add multiple class with ajax ==============-->
    <div style="visibility: hidden">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="whole_extra_item_delete" id="whole_extra_item_delete">
                <div class="container mt-2">
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label for="facility_name">Facilities</label>
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
                        <div class="form-group col-md-4">
                            <label for="distance">Distance</label>
                            <input type="text" name="distance[]" id="distance" class="form-control"
                                placeholder="Distance (Km)">
                        </div>
                        <div class="form-group col-md-4" style="padding-top: 20px">
                            <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle">Add</i></span>
                            <span class="btn btn-danger btn-sm removeeventmore"><i
                                    class="fa fa-minus-circle">Remove</i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- middle wrapper end -->
    <!-- right wrapper start -->
    <!-- right wrapper end -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country-dd').on('change', function() {
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
                    success: function(result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state-dd').on('change', function() {
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
                    success: function(res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function(key, value) {
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
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
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
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addeventmore", function() {
                var whole_extra_item_add = $("#whole_extra_item_add").html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", ".removeeventmore", function(event) {
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
@endsection
