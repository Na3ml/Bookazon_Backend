@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Orders Table</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Data Table</li>
                        <li class="breadcrumb-item active">Orders Table</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <!-- Zero Configuration  Starts-->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <div class="table-responsive theme-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Order No</th>
                                            <th>Room</th>
                                            <th>Booker</th>
                                            <th>Booking Date</th>
                                            <th>Check In Date</th>
                                            <th>Check Out Date</th>
                                            <th>Paid Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($orders as $key => $item)
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->order_no }}</td>
                                                <td>{{ $item->room->room_number }}</td>
                                                <td>{{ $item->user->first_name . $item->user->last_name }}</td>
                                                <td>{{ $item->booking_date }}</td>
                                                <td>{{ date('Y-m-d', strtotime($item->check_in_date)) }}</td>
                                                <td>{{ date('Y-m-d', strtotime($item->check_out_date)) }}</td>
                                                <td>{{ $item->paid_amount . ' LE' }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge rounded-pill bg-success">Paid</span>
                                                    @else
                                                        <span class="badge rounded-pill bg-danger">Pending</span>
                                                    @endif
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Zero Configuration  Ends-->

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection
