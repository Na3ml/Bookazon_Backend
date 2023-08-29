@extends('layout.master')

@section('main_content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Update Admin Profile</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Admin Profile</li>
                        <li class="breadcrumb-item active"> Update Admin Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <h6 class="card-title">Update Admin Profile </h6>
                    </div>
                    <div class="card-body">
                        <div class="stepwizard">
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step"><a class="btn btn-primary" href="#step-1">1</a>
                                    <p>Step 1</p>
                                </div>
                                <div class="stepwizard-step"><a class="btn btn-light" href="#step-2">2</a>
                                    <p>Step 2</p>
                                </div>
                                <div class="stepwizard-step"><a class="btn btn-light" href="#step-3">3</a>
                                    <p>Step 3</p>
                                </div>

                            </div>
                        </div>
                        <form method="POST" action="{{ route('admin.profile.store') }}" class="forms-sample"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="setup-content" id="step-1">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">First Name</label>
                                            <input class="form-control" type="text" placeholder="Johan"
                                                required="required" value="{{ $profileData->first_name }}"
                                                name="first_name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label">Last Name</label>
                                            <input class="form-control" type="text" placeholder="Deo" required="required"
                                                value="{{ $profileData->last_name }}" name="last_name">
                                        </div>

                                        <div class="mb-3">
                                            <label class="control-label">Old Password</label>
                                            <input type="password" name="old_password"
                                                class="form-control @error('old_password') is-invalid @enderror "
                                                id="old_password" autocomplete="off">
                                            @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label">New Password</label>
                                            <input type="password" name="new_password"
                                                class="form-control @error('new_password') is-invalid @enderror "
                                                id="new_password" autocomplete="off">
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label">confirm Password</label>
                                            <input type="password" name="new_password_confirmation" class="form-control"
                                                id="new_password_confirmation" autocomplete="off">
                                        </div>
                                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                                    </div>
                                </div>
                            </div>
                            <div class="setup-content" id="step-2">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">Email</label>
                                            <input class="form-control" type="email" required="required"
                                                value="{{ $profileData->email }}" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label">Address</label>
                                            <input class="form-control" type="text" required="required"
                                                value="{{ $profileData->address }}" name="address">
                                        </div>
                                        <button
                                            class="btn
                                                btn-primary nextBtn pull-right"
                                            type="button">Next</button>
                                    </div>
                                </div>
                            </div>
                            <div class="setup-content" id="step-3">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Photo </label>
                                            <input class="form-control" name="photo" type="file" id="image">
                                        </div>
                                        @error('photo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label"> </label>
                                            <img id="showImage" class="wd-80 rounded-circle"
                                                src="{{ !empty($profileData->profile_picture) ? $profileData->profile_picture : url('dashboard/upload/no_image.jpg') }}"
                                                alt="profile" style="width: 100px;height: 100px;">
                                        </div>
                                        <button class="btn btn-success pull-right" type="submit">Finish!</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- left wrapper start -->
            <div class="col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">


                            <div>
                                <img class="rounded-circle"
                                    src="{{ !empty($profileData->profile_picture) ? url($profileData->profile_picture) : url('dashboard/upload/no_image.jpg') }}"
                                    alt="profile" style="width: 100px;height: 100px;">
                                <span
                                    class="h4 ms-3 ">{{ $profileData->first_name . ' ' . $profileData->last_name }}</span>
                            </div>



                        </div>

                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                            <p class="text-muted">{{ $profileData->first_name . ' ' . $profileData->last_name }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ $profileData->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{ $profileData->phone_number }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                            <p class="text-muted">{{ $profileData->address }}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/form-wizard/form-wizard-two.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection
