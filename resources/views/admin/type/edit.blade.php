@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/vector-map.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Add Property Type</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Property Type</li>
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
                    {{--                <div class="card-header pb-0"> --}}
                    {{--                    <h4>Create Super Admin</h4> --}}
                    {{--                </div> --}}
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" action="{{ route('propertytype.update', $type->id) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Type Name</label>
                                    <input class="form-control" type="text" name="type_name" required
                                        value="{{ $type->type_name }}">
                                    @error('type_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="col-sm-3 col-form-label">Type Icon</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" name="type_icon"
                                            data-bs-original-title="" title="" onchange="readURL(this);"
                                            accept="image/png">
                                    </div>
                                    @error('type_icon')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <hr>
                                    <label for="exampleInputName1">Old Image</label>
                                    <img src="{{ URL::to($type->type_icon) }}" style="width: 70px; height: 50px;">
                                    <input type="hidden" name="oldimage" value="{{ $type->type_icon }}">
                                    <label for="exampleInputName1">Existing Image preview :</label>

                                    <span class="custom-file-control"></span>
                                    <img src="#" id="one" alt="">
                                    <hr>
                                </div>
                            </div>

                            <div class="mb-3 text-center m-t-5">
                                <button class="btn btn-primary w-25" type="submit">Save</button>
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
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
