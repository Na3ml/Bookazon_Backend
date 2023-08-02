<div class="sidebar-wrapper">
    <div>
      <div class="logo-wrapper"><a href="{{ route('dashboard') }}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo.png') }}" alt=""></a>
        <div class="back-btn"><i data-feather="grid"></i></div>
        <div class="toggle-sidebar icon-box-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
      </div>
      <div class="logo-icon-wrapper"><a href="{{ route('dashboard') }}">
          <div class="icon-box-sidebar"><i data-feather="grid"></i></div></a></div>
      <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
          <ul class="sidebar-links" id="simple-bar">
            <li class="back-btn">
              <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>
            <li class="pin-title sidebar-list">
              <h6>Pinned</h6>
            </li>
            <hr>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/"><i data-feather="file-text"> </i><span>Property Owners</span></a></li>

            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="users"></i><span>Users</span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{ route('user_profile') }}">Users Profile</a></li>
                <li><a href="{{ route('edit_profile') }}">Users Edit</a></li>
                <li><a href="{{ route('user_cards') }}">Users Cards</a></li>
              </ul>
            </li>

                {{-- <li><a class="submenu-title" href="javascript:void(0)">Form Widgets<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>
                  <ul class="nav-sub-childmenu submenu-content">
                    <li><a href="{{ route('datepicker') }}">Datepicker</a></li>
                    <li><a href="{{ route('time_picker') }}">Timepicker</a></li>
                    <li><a href="{{ route('datetimepicker') }}">Datetimepicker</a></li>
                    <li><a href="{{ route('daterangepicker') }}">Daterangepicker</a></li>
                    <li><a href="{{ route('touchspin') }}">Touchspin</a></li>
                    <li><a href="{{ route('select2') }}">Select2</a></li>
                    <li><a href="{{ route('switch') }}">Switch</a></li>
                    <li><a href="{{ route('typeahead') }}">Typeahead</a></li>
                    <li><a href="{{ route('clipboard') }}">Clipboard</a></li>
                  </ul>
                </li>
                <li><a class="submenu-title" href="javascript:void(0)">Form layout<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>
                  <ul class="nav-sub-childmenu submenu-content">
                    <li><a href="{{ route('default_form') }}">Default Forms</a></li>
                    <li><a href="{{ route('form_wizard') }}">Form Wizard 1</a></li>
                    <li><a href="{{ route('form_wizard_two') }}">Form Wizard 2</a></li>
                    <li><a href="{{ route('form_wizard_three') }}">Form Wizard 3</a></li>
                  </ul>
                </li> --}}
              </ul>
            </li>
            {{-- <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="server"></i><span>Tables</span></a>
              <ul class="sidebar-submenu">
                <li><a class="submenu-title" href="javascript:void(0)">Bootstrap Tables<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>
                  <ul class="nav-sub-childmenu submenu-content">
                    <li><a href="{{ route('bootstrap_basic_table') }}">Basic Tables</a></li>
                    <li><a href="{{ route('table_components') }}">Table components</a></li>
                  </ul>
                </li>
                <li><a class="submenu-title" href="javascript:void(0)">Data Tables<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>
                  <ul class="nav-sub-childmenu submenu-content">
                    <li><a href="{{ route('datatable_basic_init') }}">Basic Table</a></li>
                    <li><a href="{{ route('datatable_advance') }}">Advance Init</a></li>
                    <li><a href="{{ route('datatable_api') }}">Data API </a></li>
                    <li><a href="{{ route('datatable_data_source') }}">Data Source</a></li>
                  </ul>
                </li>
                <li><a href="{{ route('datatable_ext_autofill') }}">Ex. Data Table     </a></li>
                <li><a href="{{ route('jsgrid_table') }}">Js Grid Table        </a></li>
              </ul>
            </li> --}}

            {{-- <li class="mega-menu sidebar-list"> <i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="layers"></i><span>Others</span></a>
              <div class="mega-menu-container menu-content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col mega-box">
                      <div class="link-section">
                        <div class="submenu-title">
                          <h5>Error Page</h5>
                        </div>
                        <ul class="submenu-content opensubmegamenu">
                          <li><a href="{{ route('error_page1') }}">Error Page 1</a></li>
                          <li><a href="{{ route('error_page2') }}">Error Page 2</a></li>
                          <li><a href="{{ route('error_page3') }}">Error Page 3</a></li>
                          <li><a href="{{ route('error_page4') }}">Error Page 4</a></li>
                          <li><a href="{{ route('error_page5') }}">Error Page 5 </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col mega-box">
                      <div class="link-section">
                        <div class="submenu-title">
                          <h5> Authentication</h5>
                        </div>
                        <ul class="submenu-content opensubmegamenu">
                          <li><a href="{{ route('login') }}" target="_blank">Login Simple</a></li>
                          <li><a href="{{ route('login_one') }}" target="_blank">Login with bg image</a></li>
                          <li><a href="{{ route('login_two') }}" target="_blank">Login with image two                      </a></li>
                          <li><a href="{{ route('login_bs_validation') }}" target="_blank">Login With validation</a></li>
                          <li><a href="{{ route('login_bs_tt_validation') }}" target="_blank">Login with tooltip</a></li>
                          <li><a href="{{ route('login_sa_validation') }}" target="_blank">Login with sweetalert</a></li>
                          <li><a href="{{ route('sign_up') }}" target="_blank">Register Simple</a></li>
                          <li><a href="{{ route('sign_up_one') }}" target="_blank">Register with Bg Image</a></li>
                          <li><a href="{{ route('sign_up_two') }}" target="_blank">Register with Image Two</a></li>
                          <li><a href="{{ route('unlock') }}">Unlock User</a></li>
                          <li><a href="{{ route('forget_password') }}">Forget Password</a></li>
                          <li><a href="{{ route('reset_password') }}">Reset Password</a></li>
                          <li><a href="{{ route('maintenance') }}">Maintenance</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col mega-box">
                      <div class="link-section">
                        <div class="submenu-title">
                          <h5>Coming Soon</h5>
                        </div>
                        <ul class="submenu-content opensubmegamenu">
                          <li><a href="{{ route('comingsoon') }}">Coming Simple</a></li>
                          <li><a href="{{ route('comingsoon_bg_video') }}">Coming with Bg video</a></li>
                          <li><a href="{{ route('comingsoon_bg_img') }}">Coming with Bg Image</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col mega-box">
                      <div class="link-section">
                        <div class="submenu-title">
                          <h5>Email templates</h5>
                        </div>
                        <ul class="submenu-content opensubmegamenu">
                          <li><a href="{{ route('basic_template') }}">Basic Email</a></li>
                          <li><a href="{{ route('email_header') }}">Basic With Header</a></li>
                          <li><a href="{{ route('template_email') }}">Ecommerce Template</a></li>
                          <li><a href="{{ route('template_email_2') }}">Email Template 2</a></li>
                          <li><a href="{{ route('ecommerce_templates') }}">Ecommerce Email</a></li>
                          <li><a href="{{ route('email_order_success') }}">Order Success</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li> --}}

          </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
    </div>
  </div>
