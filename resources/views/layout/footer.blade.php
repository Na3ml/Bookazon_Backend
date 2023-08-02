@switch(Route::currentRouteName())
    @case('footer_dark')
    <footer class="footer footer-dark">
        @break
    
    @case('footer_fixed')
    <footer class="footer footer-fixed">
       @break

    @default
        <footer class="footer">
@endswitch
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 p-0 footer-left">
          <p class="mb-0">Copyright © 2023 Tivo. All rights reserved.</p>
        </div>
        <div class="col-md-6 p-0 footer-right">
          <p class="mb-0">Hand-crafted & made with <i class="fa fa-heart font-danger"></i></p>
        </div>
      </div>
    </div>
  </footer>