@extends('layout.guest')
@section('others_content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo" href="{{ route('dashboard') }}"><img class="img-fluid for-light" style="height: 70px" src="{{ asset('assets/images/logo/logo2.jpg') }}" alt="looginpage"></a></div>
                        <div class="login-main">
                            <form class="theme-form" action="{{url('/login')}}" method="post">
                                @csrf
                                <h4 class="text-center">Sign in to account</h4>
                                <p class="text-center">Enter your email & password to login</p>
                                @if(Session::has('err'))
                                    <h5 class="alert alert-danger">{{Session::get('err')}}</h5>
                                @endif
                               <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input class="form-control" type="email" name="email" required placeholder="Test@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                        <div class="show-hide"><span class="show">                         </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Remember password</label>
                                    </div><a class="link" href="">Forgot password?</a>
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
                                <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="{{ route('register') }}">Create Account</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
