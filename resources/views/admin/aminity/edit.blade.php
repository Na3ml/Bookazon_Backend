@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/vector-map.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Edit Aminities</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Aminities</li>
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
                        <form class="needs-validation" novalidate=""
                            action="{{ route('aminities.update', $Aminties->id) }}" method="post"
                            enctype="multipart/form-data" id="myForm">
                            @csrf
                            @method('PUT')
                            <div class="form-group row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Amenitis Name</label>
                                    <input class="form-control" type="text" name="amenities_name" required
                                        value="{{ $Aminties->amenities_name }}">

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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    amenitis_name: {
                        required: true,
                    },

                },
                messages: {
                    amenitis_name: {
                        required: 'Please Enter Amenitis Name',
                    },


                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
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
@endsection
