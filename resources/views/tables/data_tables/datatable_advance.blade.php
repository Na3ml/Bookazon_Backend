@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Advance Init</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Data Table</li>
                        <li class="breadcrumb-item active">Advance Init</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Stock result -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Stock Result</h4><span>Data within DataTables can be easily rendered to add graphics or colour
                            to your tables, as demonstrated in the example on this page. These examples make use of
                            columns.render and drawCallback to customise the cells in three ways:</span><span>1. the colour
                            of the cell is determine by the relative price of the stock.</span><span>
                            2. a 'sparkline' class is added to the numeric array in the 'last' column.</span><span>
                            3. the jQuery Sparklines plugin is called to turn that array into a line graph.</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive theme-scrollbar">
                            <table class="display nowrap" id="stock" style="width:100%">
                                <thead>
                                    <tr></tr>
                                    <th>Name</th>
                                    <th>Symbol</th>
                                    <th>Price</th>
                                    <th>Difference</th>
                                    <th>Last</th>
                                </thead>
                                <tfoot>
                                    <tr></tr>
                                    <th>Name</th>
                                    <th>Symbol</th>
                                    <th>Price</th>
                                    <th>Difference</th>
                                    <th>Last</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Row Create Callback</h4><span>
                            For each row that is generated for display, the createdRow function is called once and once
                            only. It is passed the create row node which can then be modified.</span><span>the 'salary'
                            column Primary and bold by adding a CSS class to the container cell if the salary is greater
                            than $150,000.</span><span>the 'salary' column danger and bold by adding a CSS class to the
                            container cell if the salary is less than $40,000.</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive theme-scrollbar">
                            <table class="display" id="row_create" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Email</th>
                                        <th>Experience</th>
                                        <th>Gender</th>
                                        <th>Contact No.</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Elana Robbert </td>
                                        <td>ElanaRob@gmail.com </td>
                                        <td>1 Year </td>
                                        <td>Male </td>
                                        <td>+91 9789887777</td>
                                        <td>28,000</td>
                                    </tr>
                                    <tr>
                                        <td>Stiphen Deo</td>
                                        <td>Stiphen@yahoo.com</td>
                                        <td>6 Month </td>
                                        <td>Female</td>
                                        <td>+91 9874563210 </td>
                                        <td>22,000</td>
                                    </tr>
                                    <tr>
                                        <td>Genelia Ottre </td>
                                        <td>Genelia@gmail.com</td>
                                        <td>2 Days</td>
                                        <td>Male</td>
                                        <td>+91 8794562135</td>
                                        <td>24,120</td>
                                    </tr>
                                    <tr>
                                        <td>Michael Silva</td>
                                        <td>Michael@yahoo.com</td>
                                        <td>3 Year</td>
                                        <td>Female</td>
                                        <td>+91 1234567891</td>
                                        <td>$1,98,500</td>
                                    </tr>
                                    <tr>
                                        <td>Paul Byrd</td>
                                        <td>Paul@gmail.com</td>
                                        <td>2 Day</td>
                                        <td>Male</td>
                                        <td>+91 3124567894</td>
                                        <td>$7,25,000</td>
                                    </tr>
                                    <tr>
                                        <td>Gloria Little</td>
                                        <td>Gloria@yahoo.com</td>
                                        <td>4 Year</td>
                                        <td>Male</td>
                                        <td>+91 9876541230</td>
                                        <td>$2,37,500</td>
                                    </tr>
                                    <tr>
                                        <td>Bradley Greer</td>
                                        <td>Bradley@gmail.com</td>
                                        <td>6 Year</td>
                                        <td>Male</td>
                                        <td>+91 8794561230</td>
                                        <td>$1,32,000</td>
                                    </tr>
                                    <tr>
                                        <td>Dai Rios</td>
                                        <td>Rios@gmail.com</td>
                                        <td>1 Year</td>
                                        <td>Male</td>
                                        <td>+91 7418529630</td>
                                        <td>$2,17,500</td>
                                    </tr>
                                    <tr>
                                        <td>Jenette Caldwell</td>
                                        <td>Jenette@yahoo.com</td>
                                        <td>2 Year</td>
                                        <td>Female</td>
                                        <td>+91 4569871230</td>
                                        <td>$3,45,000</td>
                                    </tr>
                                    <tr>
                                        <td>Yuri Berry</td>
                                        <td>Berry@gmail.com</td>
                                        <td>3 Year</td>
                                        <td>Female</td>
                                        <td>+91 7894561230</td>
                                        <td>$6,75,000</td>
                                    </tr>
                                    <tr>
                                        <td>Caesar Vance</td>
                                        <td>Vance@yahoo.com</td>
                                        <td>1 Year</td>
                                        <td>Male</td>
                                        <td>+91 8596741230</td>
                                        <td>$14,500</td>
                                    </tr>
                                    <tr>
                                        <td>Doris Wilder</td>
                                        <td>Wilder@gmail.com</td>
                                        <td>6 Month</td>
                                        <td>Male</td>
                                        <td>+91 6541239870</td>
                                        <td>$85,600</td>
                                    </tr>
                                    <tr>
                                        <td>Angelica Ramos</td>
                                        <td>Angelica@gmail.com</td>
                                        <td>4 Month</td>
                                        <td>Female</td>
                                        <td>+91 8745963210</td>
                                        <td>$12,00,000</td>
                                    </tr>
                                    <tr>
                                        <td>Gavin Joyce</td>
                                        <td>Gavin@yahoo.com</td>
                                        <td>8 Month</td>
                                        <td>Male</td>
                                        <td>+91 8596741230</td>
                                        <td>$92,575</td>
                                    </tr>
                                    <tr>
                                        <td>Jennifer Chang</td>
                                        <td>Jennifer@yahoo.com</td>
                                        <td>1 Year</td>
                                        <td>Female</td>
                                        <td>+91 7412589630</td>
                                        <td>$3,57,650</td>
                                    </tr>
                                    <tr>
                                        <td>Brenden Wagner</td>
                                        <td>Brenden@gmail.com</td>
                                        <td>2 Year</td>
                                        <td>Female</td>
                                        <td>+91 6589742301</td>
                                        <td>$2,06,850</td>
                                    </tr>
                                    <tr>
                                        <td>Fiona Green</td>
                                        <td>Fiona@yahoo.com</td>
                                        <td>3 Month</td>
                                        <td>Female</td>
                                        <td>+91 6985321470</td>
                                        <td>$8,50,000</td>
                                    </tr>
                                    <tr>
                                        <td>Shou Itou</td>
                                        <td>Shou@gmail.com</td>
                                        <td>2 Year</td>
                                        <td>Female</td>
                                        <td>+91 3256897414</td>
                                        <td>$1,63,000</td>
                                    </tr>
                                    <tr>
                                        <td>Michelle House</td>
                                        <td>Michelle@gmail.com</td>
                                        <td>1 Year</td>
                                        <td>Male</td>
                                        <td>+91 8745961235</td>
                                        <td>$95,400</td>
                                    </tr>
                                    <tr>
                                        <td>Suki Burks</td>
                                        <td>Burks@gmail.com</td>
                                        <td>3 Year</td>
                                        <td>Female</td>
                                        <td>+91 4785961230</td>
                                        <td>$1,14,500</td>
                                    </tr>
                                    <tr>
                                        <td>Prescott Bartlett</td>
                                        <td>Prescott@gmail.com</td>
                                        <td>8 Year</td>
                                        <td>Male</td>
                                        <td>+91 4578961231</td>
                                        <td>$1,45,000</td>
                                    </tr>
                                    <tr>
                                        <td>Gavin Cortez</td>
                                        <td>Gavin@gmail.com</td>
                                        <td>9 Year</td>
                                        <td>Male</td>
                                        <td>+91 748521369</td>
                                        <td>$2,35,500</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Email</th>
                                        <th>Experience</th>
                                        <th>Gender</th>
                                        <th>Contact No.</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/jquery.sparkline2.1.2.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection
