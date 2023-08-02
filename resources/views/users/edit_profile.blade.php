@extends('layout.master')

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Edit Profile</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">                                       <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active"> Edit Profile</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="edit-profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header pb-0">
              <h4 class="card-title mb-0">My Profile</h4>
              <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
            </div>
            <div class="card-body">
              <form>
                <div class="row mb-2">
                  <div class="profile-title">
                    <div class="d-lg-flex d-block align-items-center"><img class="img-70 rounded-circle" alt="" src="{{ asset('assets/images/user/7.jpg') }}">
                      <div class="flex-grow-1">
                        <h3 class="mb-1 f-20 txt-primary"> <a href="{{ route('user_profile') }}">MARK JECNO</a></h3>
                        <p class="f-12 mb-0">DESIGNER</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <h6 class="form-label">Bio</h6>
                  <textarea class="form-control" rows="5">On the other hand, we denounce with righteous indignation</textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label f-w-500">Email-Address</label>
                  <input class="form-control" placeholder="your-email@domain.com">
                </div>
                <div class="mb-3">
                  <label class="form-label f-w-500">Password</label>
                  <input class="form-control" type="password" value="password">
                </div>
                <div class="mb-3">
                  <label class="form-label f-w-500">Website</label>
                  <input class="form-control" placeholder="http://Uplor .com">
                </div>
                <div class="form-footer">
                  <button class="btn btn-primary btn-block">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-xl-8">
          <form class="card">
            <div class="card-header pb-0">
              <h4 class="card-title mb-0">Edit Profile</h4>
              <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-5">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Company</label>
                    <input class="form-control" type="text" placeholder="Company">
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Username</label>
                    <input class="form-control" type="text" placeholder="Username">
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Email address</label>
                    <input class="form-control" type="email" placeholder="Email">
                  </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  <div class="mb-3">
                    <label class="form-label f-w-500">First Name</label>
                    <input class="form-control" type="text" placeholder="Company">
                  </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Last Name</label>
                    <input class="form-control" type="text" placeholder="Last Name">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Address</label>
                    <input class="form-control" type="text" placeholder="Home Address">
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <div class="mb-3">
                    <label class="form-label f-w-500">City</label>
                    <input class="form-control" type="text" placeholder="City">
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Postal Code</label>
                    <input class="form-control" type="number" placeholder="ZIP Code">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Country</label>
                    <select class="form-control btn-square">
                      <option value="0">India</option>
                      <option value="1">Germany</option>
                      <option value="2">Canada</option>
                      <option value="3">Usa</option>
                      <option value="4">Aus</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div>
                    <label class="form-label f-w-500">About Me</label>
                    <textarea class="form-control" rows="5" placeholder="Enter About your description"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <button class="btn btn-primary" type="submit">Update Profile          </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>   
@endsection