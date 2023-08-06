<!DOCTYPE html>
<html lang="en" @if (Route::currentRouteName() == 'layout_rtl') dir="rtl" @endif>

<head>
    @include('layout.head')
    <!-- comman css-->
    @include('layout.css')
    @include('sweetalert::alert')

</head>

@switch(Route::currentRouteName())
    @case('dashboard')

        <body onload="startTime()">
        @break

        @case('box_layout')

            <body class="box-layout">
            @break

            @case('layout_rtl')

                <body class="rtl">
                @break

                @case('layout_dark')

                    <body class="dark-only">
                    @break

                    @default

                        <body>
                    @endswitch


                    <!-- tap on top starts-->
                    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
                    <!-- tap on tap ends-->

                    <!-- Loader starts-->
                    <div class="loader-wrapper">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"> </div>
                        <div class="dot"></div>
                    </div>
                    <!-- Loader ends-->

                    <!-- page-wrapper Start-->
                    <div class="page-wrapper compact-wrapper compact-sidebar" id="pageWrapper">

                        <!-- Page Header Start-->
                        @include('layout.header')
                        <!-- Page Header Ends-->

                        <!-- Page Body Start-->
                        <div class="page-body-wrapper">

                            <!-- Page Sidebar Start-->
                            @include('layout.sidebar')
                            <!-- Page Sidebar Ends-->


                            <div class="page-body">
                                @yield('main_content')
                                <!-- Container-fluid Ends-->
                            </div>

                            <!-- footer start-->
                            @include('layout.footer')

                        </div>
                    </div>
                    {{-- scripts --}}
                    @include('layout.script')
                    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

                    {{-- end scripts --}}

                </body>

</html>
