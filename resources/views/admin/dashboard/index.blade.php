@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid dashboard-2">
        <div class="col-xl-9 col-md-12 box-col-70 xl-70">
            <div class="row">
                <div class="col-lg-4 col-md-6 box-col-4">
                    <div class="card profit-card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="flex-grow-1">
                                    <p class="square-after f-w-600 header-text-primary">Our Total Properties<i
                                            class="fa fa-circle"> </i></p>
                                    <h4>{{ $properties }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <div class="profit-wrapper header-text-primary icon-bg-primary"><i
                                            class="fa fa-arrow-up"></i></div>

                                </div>
                            </div>
                            <div class="right-side icon-right-primary"><i class="fa fa-building-o"></i>
                                <div class="shap-block">
                                    <div class="rounded-shap animate-bg-primary"><i></i><i></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 box-col-4">
                    <div class="card visitor-card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="flex-grow-1">
                                    <p class="square-after f-w-600 header-text-info">Our Total Rooms<i class="fa fa-circle">
                                        </i></p>
                                    <h4>{{ $rooms }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <div class="profit-wrapper header-text-info icon-bg-info"><i class="fa fa-arrow-up"></i>
                                    </div>

                                </div>
                            </div>
                            <div class="right-side icon-right-info"><i class="fa fa-home"></i>
                                <div class="shap-block">
                                    <div class="rounded-shap animate-bg-primary"><i></i><i></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 box-col-4">
                    <div class="card sell-card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="flex-grow-1">
                                    <p class="square-after f-w-600 header-text-success">Our Total Orders<i
                                            class="fa fa-circle"> </i></p>
                                    <h4>{{ $orders }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <div class="profit-wrapper header-text-success icon-bg-success"><i
                                            class="fa fa-arrow-up"></i></div>

                                </div>
                            </div>
                            <div class="right-side icon-right-success"><i class="fa fa-dollar"></i>
                                <div class="shap-block">
                                    <div class="rounded-shap animate-bg-secondary"><i></i><i></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 box-col-4">
                    <div class="card profit-card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="flex-grow-1">
                                    <p class="square-after f-w-600 header-text-primary">Our Total Admins<i
                                            class="fa fa-circle"> </i></p>
                                    <h4>{{ $admins }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <div class="profit-wrapper header-text-primary icon-bg-primary"><i
                                            class="fa fa-arrow-up"></i></div>

                                </div>
                            </div>
                            <div class="right-side icon-right-info"><i class="fa fa-users"></i>
                                <div class="shap-block">
                                    <div class="rounded-shap animate-bg-primary"><i></i><i></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 box-col-4">
                    <div class="card visitor-card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="flex-grow-1">
                                    <p class="square-after f-w-600 header-text-info">Our Total Bookers<i
                                            class="fa fa-circle"> </i></p>
                                    <h4>{{ $bookers }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <div class="profit-wrapper header-text-info icon-bg-info"><i class="fa fa-arrow-up"></i>
                                    </div>

                                </div>
                            </div>
                            <div class="right-side icon-right-info"><i class="fa fa-user"></i>
                                <div class="shap-block">
                                    <div class="rounded-shap animate-bg-primary"><i></i><i></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 box-col-4">
                    <div class="card sell-card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="flex-grow-1">
                                    <p class="square-after f-w-600 header-text-success">Our Total Propety Owners<i
                                            class="fa fa-circle"> </i></p>
                                    <h4>{{ $owners }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <div class="profit-wrapper header-text-success icon-bg-success"><i
                                            class="fa fa-arrow-up"></i></div>

                                </div>
                            </div>
                            <div class="right-side icon-right-info"><i class="fa fa-child"></i>
                                <div class="shap-block">
                                    <div class="rounded-shap animate-bg-secondary"><i></i><i></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    <script src="{{ asset('assets/js/chart/knob/knob.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart/knob/knob-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dashboard_2.js') }}"></script>
@endsection
