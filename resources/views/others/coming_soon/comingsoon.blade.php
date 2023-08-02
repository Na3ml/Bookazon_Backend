@extends('others.others_layout.master')

@section('others_content')
<div class="container-fluid p-0">
    <div class="comingsoon bg-commingsoon">
      <div class="comingsoon-inner text-center">
        <div class="logo-wrraper"><img class="img-fluid" src="{{ asset('assets/images/logo/logo2.png') }}" alt=""></div>
        <h5>WE ARE COMING <br>SOON</h5>
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
@endsection

@section('others_script')
<script src="{{ asset('assets/js/countdown.js') }}"></script>    
@endsection