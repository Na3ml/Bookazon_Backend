@extends('others.others_layout.master')

@section('others_css')
    
@endsection

@section('others_content')
<div class="container-fluid">
    <div class="row">
      <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/3.jpg') }}" alt="looginpage"></div>
      <div class="col-xl-7 p-0">    
        <div class="login-card">
          <div>
            <div><a class="logo" href="{{ route('dashboard') }}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo2.png') }}" alt="looginpage"></a></div>
            <div class="login-main"> 
              <form class="theme-form">
                <h4 class="text-center">Sign in to account</h4>
                <p class="text-center">Enter your email & password to login</p>
                <div class="form-group">
                  <label class="col-form-label">Email Address</label>
                  <input class="form-control" type="email" required="" placeholder="Test@gmail.com">
                </div>
                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <div class="form-input position-relative">
                    <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                    <div class="show-hide"><span class="show">                         </span></div>
                  </div>
                </div>
                <div class="form-group mb-0">
                  <div class="checkbox p-0">
                    <input id="checkbox1" type="checkbox">
                    <label class="text-muted" for="checkbox1">Remember password</label>
                  </div><a class="link" href="{{ route('forget_password') }}">Forgot password?</a>
                  <div class="text-end mt-3">
                    <button class="btn btn-primary btn-block w-100" type="submit">Sign in                 </button>
                  </div>
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
                <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="{{ route('sign_up') }}">Create Account</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('others_script')
    
@endsection