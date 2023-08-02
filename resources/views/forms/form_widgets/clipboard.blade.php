@extends('layout.master')

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Clipboard</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">                                       <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Form Widgets</li>
            <li class="breadcrumb-item active">Clipboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Clipboard On Text Input</h4>
          </div>
          <div class="card-body">
            <div class="clipboaard-container">
              <p class="card-description">Cut/copy from text input</p>
              <input class="form-control" id="clipboardExample1" type="text" placeholder="type some text to copy / cut">
              <div class="mt-3 text-end">
                <button class="btn btn-primary btn-clipboard" type="button" data-clipboard-action="copy" data-clipboard-target="#clipboardExample1"><i class="fa fa-copy"></i> Copy</button>
                <button class="btn btn-secondary btn-clipboard-cut" type="button" data-clipboard-action="cut" data-clipboard-target="#clipboardExample1"><i class="fa fa-cut"></i> Cut</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Clipboard On Textarea</h4>
          </div>
          <div class="card-body">
            <div class="clipboaard-container">
              <p class="card-description">Cut/copy from textarea</p>
              <textarea class="form-control f-14" id="clipboardExample2" rows="1" spellcheck="false">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has</textarea>
              <div class="mt-3 text-end">
                <button class="btn btn-primary btn-clipboard" type="button" data-clipboard-action="copy" data-clipboard-target="#clipboardExample2"><i class="fa fa-copy"></i> Copy</button>
                <button class="btn btn-secondary btn-clipboard-cut" type="button" data-clipboard-action="cut" data-clipboard-target="#clipboardExample2"><i class="fa fa-cut"></i> Cut</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Clipboard On Paragraph</h4>
          </div>
          <div class="card-body">
            <div class="clipboaard-container">
              <p class="card-description">Copy from Paragraph</p>
              <h6 class="border rounded card-body f-w-300" id="clipboardExample3">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </h6>
              <div class="mt-3 text-end">
                <button class="btn btn-primary btn-clipboard" type="button" data-clipboard-action="copy" data-clipboard-target="#clipboardExample3"><i class="fa fa-copy"></i> Copy</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Copy Portion From Paragraph</h4>
          </div>
          <div class="card-body">
            <div class="clipboaard-container">
              <p class="card-description">Copy Portion From Paragraph</p>
              <h6 class="border rounded card-body f-w-300">Lorem ipsum <span class="bg-primary text-white p-1" id="clipboardExample4">dolor sit amet</span>, consectetur adipiscing elit,
                                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </h6>
              <div class="mt-3 text-end">
                <button class="btn btn-primary btn-clipboard" type="button" data-clipboard-action="copy" data-clipboard-target="#clipboardExample4"><i class="fa fa-copy"></i> Copy highlighted text</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>   
@endsection

@section('scripts')
<script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/js/clipboard/clipboard-script.js') }}"></script>
<script src="{{ asset('assets/js/tooltip-init.js') }}"></script>   
@endsection
