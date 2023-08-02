@extends('others.others_layout.master')

@section('others_content')
<div class="container-fluid p-0"> 
    <div class="row m-0">
      <div class="col-12 p-0">    
        <div class="login-card">
          <div>
            <div><a class="logo text-center" href="{{ route('dashboard') }}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo2.png') }}" alt="looginpage"></a></div>
            <div class="login-main"> 
              <form class="theme-form">
                <h4 class="text-center">Create your account</h4>
                <p class="text-center">Enter your personal details to create account</p>
                <div class="form-group">
                  <label class="col-form-label pt-0">Your Name</label>
                  <div class="row g-2">
                    <div class="col-6">
                      <input class="form-control" type="text" required="" placeholder="First name">
                    </div>
                    <div class="col-6">
                      <input class="form-control" type="text" required="" placeholder="Last name">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Email Address</label>
                  <input class="form-control" type="email" required="" placeholder="Test@gmail.com">
                </div>
                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <div class="form-input position-relative">
                    <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                    <div class="show-hide"><span class="show"></span></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="checkbox p-0">
                    <input id="checkbox1" type="checkbox">
                    <label class="text-muted" for="checkbox1">Agree with<a class="ms-2" href="javascript:void(0)">Privacy Policy</a></label>
                  </div>
                  <button class="btn btn-primary btn-block w-100 mt-3" type="submit">Create Account</button>
                </div>
                <div class="login-social-title">
                  <h6>Or Sign in with                 </h6>
                </div>
                <div class="form-group">
                  <ul class="login-social">
                    <li><a href="https://www.linkedin.com" target="_blank"><i data-feather="linkedin"></i></a></li>
                    <li><a href="https://twitter.com" target="_blank"><i data-feather="twitter"></i></a></li>
                    <li><a href="https://www.facebook.com" target="_blank"><i data-feather="facebook"></i></a></li>
                    <li><a href="https://www.instagram.com" target="_blank"><i data-feather="instagram"></i></a></li>
                  </ul>
                </div>
                <p class="mt-4 mb-0 text-center">Already have an account?<a class="ms-2" href="login.html">Sign in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection