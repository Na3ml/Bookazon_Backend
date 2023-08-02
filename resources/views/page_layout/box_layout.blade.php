@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="../assets/css/vendors/prism.css">
@endsection

@section('main_content')
<div class="container-fluid">
  <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h3>Box Layout</h3>
          </div>
          <div class="col-sm-6">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item">Page Layout</li>
                  <li class="breadcrumb-item active">Box Layout</li>
              </ol>
          </div>
      </div>
  </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card alert alert-primary" role="alert">
        <h4 class="alert-heading">Tip!</h4>
        <p>
          Add class="box-layout" attribute to get this layout. The boxed layout is helpful when working on
          large screens because it prevents the site from stretching very wide.
        </p>
      </div>
    </div>
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header pb-0">
          <div class="d-flex"> 
            <div class="flex-grow-1"> 
              <h4>Title</h4>
            </div>
            <div class="setting-list">
              <ul class="list-unstyled setting-option">
                <li>
                  <div class="setting-light"><i class="icon-layout-grid2"></i></div>
                </li>
                <li><i class="view-html fa fa-code font-white"></i></li>
                <li><i class="icofont icofont-maximize full-card font-white"></i></li>
                <li><i class="icofont icofont-minus minimize-card font-white"></i></li>
                <li><i class="icofont icofont-refresh reload-card font-white"></i></li>
                <li><i class="icofont icofont-error close-card font-white"> </i></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body"><span>Start creating your amazing application!</span>
          <div class="code-box-copy">
            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
            <pre><code class="language-html" id="example-head">&lt;!-- Cod Box Copy begin --&gt;
&lt;div class=&quot;card-body&quot;&gt;
&lt;span&gt;Start creating your amazing application!
&lt;/span&gt;
&lt;/div&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
          </div>
        </div>
        <div class="card-footer">
          <h6 class="mb-0">Card Footer</h6>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
<script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
@endsection