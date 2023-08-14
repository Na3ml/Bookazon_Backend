@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/vector-map.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
@endsection


@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Add Room</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Room</li>
                        <li class="breadcrumb-item active">all</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('rooms.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Photo *</label>
                                        <div>
                                            <input type="file" name="featured_photo">
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Name *</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label">Description *</label>
                                        <textarea id="editor1" name="description" cols="30" rows="10"></textarea>
                                        @error('description')
                                            <div class="invalid font-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div id="html_container"></div>

                                    <div class="mb-4">
                                        <label class="form-label">Price *</label>
                                        <input type="text" class="form-control" name="price"
                                            value="{{ old('price') }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Total Rooms *</label>
                                        <input type="text" class="form-control" name="total_rooms"
                                            value="{{ old('total_rooms') }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Amenities</label>
                                        @php $i=0; @endphp
                                        @foreach ($all_amenities as $item)
                                            @php $i++; @endphp
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                                    id="defaultCheck{{ $i }}" name="arr_amenities[]">
                                                <label class="form-check-label" for="defaultCheck{{ $i }}">
                                                    {{ $item->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Room Size</label>
                                        <input type="text" class="form-control" name="size"
                                            value="{{ old('size') }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Beds</label>
                                        <input type="text" class="form-control" name="total_beds"
                                            value="{{ old('total_beds') }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Bathrooms</label>
                                        <input type="text" class="form-control" name="total_bathrooms"
                                            value="{{ old('total_bathrooms') }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Balconies</label>
                                        <input type="text" class="form-control" name="total_balconies"
                                            value="{{ old('total_balconies') }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Guests</label>
                                        <input type="text" class="form-control" name="total_guests"
                                            value="{{ old('total_guests') }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Video Id</label>
                                        <input type="text" class="form-control" name="video_id"
                                            value="{{ old('video_id') }}">
                                    </div>
                                    <div class="mb-3 text-center m-t-5">
                                        <button class="btn btn-primary w-25" type="submit">Save</button>
                                    </div>
                                </div>
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
@endsection
