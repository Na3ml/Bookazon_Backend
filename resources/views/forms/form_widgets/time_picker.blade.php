@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/timepicker.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Time Picker</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Form Widgets</li>
                        <li class="breadcrumb-item active">Time Picker</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Default:</h4>
                    </div>
                    <div class="card-body">
                        <form class="theme-form">
                            <div>
                                <div class="input-group clockpicker">
                                    <input class="form-control" type="text" value="09:30"><span
                                        class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Align the arrow to top, auto close:</h4>
                    </div>
                    <div class="card-body">
                        <form class="theme-form">
                            <div>
                                <div class="input-group clockpicker pull-center" data-placement="left" data-align="top"
                                    data-autoclose="true">
                                    <input class="form-control" type="text" value="13:14"><span
                                        class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Set options in javascript, instead of data-* :</h4>
                    </div>
                    <div class="card-body">
                        <form class="theme-form">
                            <div>
                                <div class="input-group clockpicker" data-placement="top" data-align="left"
                                    data-donetext="Done">
                                    <input class="form-control" type="text" value="18:00"><span
                                        class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Set default value, input without addon:</h4>
                    </div>
                    <div class="card-body">
                        <div class="clearfix">
                            <form class="theme-form">
                                <div>
                                    <input class="form-control" id="single-input" type="text" value=""
                                        placeholder="Addon">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/time-picker/jquery-clockpicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/time-picker/highlight.min.js') }}"></script>
    <script src="{{ asset('assets/js/time-picker/clockpicker.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection
