@extends('others.others_layout.master')

@section('others_content')
<div class="container-fluid p-0">
    <div class="comingsoon auth-bg-video">
      <video class="bgvideo-comingsoon" id="bgvid" poster="{{ asset('assets/images/other-images/coming-soon-bg.jpg') }}" playsinline="" autoplay="" muted="" loop="">
        <source src="{{ asset('assets/video/auth-bg.mp4') }}" type="video/mp4">
      </video>
      <div class="comingsoon-inner text-center"><img src="{{ asset('assets/images/logo/logo2.png') }}" alt="">
        <h5>WE ARE COMING SOON</h5>
        <div class="countdown" id="clockdiv">
          <ul>
            <li><span class="time" id="days"></span><span class="title">days</span></li>
            <li><span class="time" id="hours"></span><span class="title">Hours</span></li>
            <li><span class="time" id="minutes"></span><span class="title">Minutes</span></li>
            <li><span class="time" id="seconds"></span><span class="title">Seconds</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('others_script')
<script src="{{ asset('assets/js/countdown.js') }}"></script>    
@endsection