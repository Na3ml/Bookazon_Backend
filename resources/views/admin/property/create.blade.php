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
          <h3>Create Property</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{route('property.index',$owner)}}">Property</a></li>
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
{{--                <div class="card-header pb-0">--}}
{{--                    <h4>Create Property</h4>--}}
{{--                </div>--}}
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('property.store',$owner)}}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label" >Property code</label>
                                <input class="form-control"  type="text" name="property_code" required value="{{old('property_code')}}">
                                @error('property_code')
                                <div class="invalid font-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" >Property status</label>
                                <input class="form-control"  type="text" name="property_status" required value="{{old('property_status')}}">
                                @error('property_status')
                                <div class="invalid font-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" >Property price</label>
                                <input class="form-control"  type="number" name="price" required value="{{old('price')}}">
                                @error('price')
                                <div class="invalid font-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" >Additional fees</label>
                                <input class="form-control"  type="text" name="Additional_fees" required value="{{old('Additional_fees')}}">
                                @error('Additional_fees')
                                <div class="invalid font-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" >Property size</label>
                                <input class="form-control"  type="number" name="property_size" required value="{{old('property_size')}}">
                                @error('property_size')
                                <div class="invalid font-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" >Address</label>
                                <input class="form-control"  type="text" name="address" required value="{{old('address')}}">
                                @error('address')
                                <div class="invalid font-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" >Country</label>
                                <input class="form-control"  type="text" name="country" required value="{{old('country')}}">
                                @error('country')
                                <div class="invalid font-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" >City</label>
                                <input class="form-control"  type="text" name="city" required value="{{old('city')}}">
                                @error('city')
                                <div class="invalid font-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" >description</label>
                                <textarea class="form-control" name="description" >{{old('description')}}</textarea>
                                @error('description')
                                <div class="invalid font-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 text-center m-t-5">
                            <button class="btn btn-primary" type="submit">Save</button>
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
