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
          <h3>Edit Booker</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{route('booker.index')}}">Booker</a></li>
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
{{--                <div class="card-header pb-0">--}}
{{--                    <h4>Create Booker</h4>--}}
{{--                </div>--}}
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('booker.update',$user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" >First name</label>
                                <input class="form-control"  type="text" name="first_name" required value="{{$user->first_name}}">
                                @error('first_name')
                                <div class="invalid">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" >Last name</label>
                                <input class="form-control"  type="text" name="last_name" required value="{{$user->last_name}}">
                                @error('last_name')
                                <div class="invalid">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" >Email</label>
                                <div class="input-group left-radius"><span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input class="form-control" type="email" name="email" placeholder="Email" aria-describedby="inputGroupPrepend" required value="{{$user->email}}">
                                </div>
                                @error('email')
                                <div class="invalid">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="validationCustom03">Phone number</label>
                                <input class="form-control" id="validationCustom03" type="text" name="phone_number" placeholder="Phone" required ="" value="{{$user->phone_number}}">
                                @error('phone_number')
                                <div class="invalid">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="validationCustom03">Gender</label>
                                <select class="form-select" name="gender" required >
                                    <option ></option>
                                    <option value="male" @if ($user->gender == "male") selected @endif>Male</option>
                                    <option value="female" @if ($user->gender == "female") selected @endif>Female</option>
                                </select>
                                @error('gender')
                                <div class="invalid">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom03">Address</label>
                                <input class="form-control" id="validationCustom03555" type="text" name="address" placeholder="address" required ="" value="{{$user->address}}">
                                @error('address')
                                <div class="invalid">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom03">Password</label>
                                <input class="form-control" id="validationCustom03555" type="password" name="password" placeholder="Password" required ="">
                                @error('password')
                                <div class="invalid">{{$message}}</div>
                                @enderror
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
@endsection
