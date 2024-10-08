@php
    $user = auth()->user();
@endphp
@extends('admin.app')
@section('page_title', 'Home')
@section('content')
    <div class="container-fluid">
        @include('admin.partials.notification')
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home">EU
                            Funds
                            Transfer Rates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#menu1">Intl
                            Funds Transfer
                            Rates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab"
                            href="#menu2">Transaction
                            Limits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab"
                            href="#menu3">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab"
                            href="#menu4">SMTP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab"
                            href="#menu5">Payment Gatway</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">


                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane container active" id="home">
                        <div class="pb-5 d-flex justify-content-between align-items-center">
                            <h1 class="fw-semibold" style="font-size: 18px;">EU Funds Transfer Rates</h1> <a
                                href="{{ route('eu_fund_rates.create') }}" class="btn btn-primary btn-sm float-right">New
                                Rate</a>
                        </div>
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body bg-gray-200 rounded-xl">
                                <div class="table-responsive">
                                    <table id="eu_funds_tbl" class="table min-w-full dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Origin</th>
                                                <th>Destination</th>
                                                <th>Commision</th>
                                                <th>Commision Type</th>
                                                <th>Limits(&euro;)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="deleteModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"></h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="text-center">Are you sure you want to delete the following location?</h4>
                                        <br />
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <div class="col-md-10">
                                                    <input type="hidden" class="form-control" id="id_delete">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                                            <span id="" class='glyphicon glyphicon-trash'></span> Delete
                                        </button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                                            <span class='glyphicon glyphicon-remove'></span> Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="menu1">
                        <div class=" pb-5 d-flex justify-content-between align-items-center">
                            <h1 class="fw-semibold" style="font-size: 18px;">International Funds Transfer Rates</h1> <a
                                href="{{ route('intl_funds_rate.create') }}" class="btn btn-sm btn-primary float-right">New
                                Rate</a>
                        </div>
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body bg-gray-200 rounded-xl">

                                <div class="table-responsive">
                                    <table id="eu_funds_tbl2" class="table min-w-full dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Origin</th>
                                                <th>destination</th>
                                                <th>Commision</th>
                                                <th>Commision Type</th>
                                                <th>Limits(&euro;)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="deleteModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"></h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="text-center">Are you sure you want to delete the following location?
                                        </h4>
                                        <br />
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <div class="col-md-10">
                                                    <input type="hidden" class="form-control" id="id_delete">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                                            <span id="" class='glyphicon glyphicon-trash'></span> Delete
                                        </button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                                            <span class='glyphicon glyphicon-remove'></span> Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="menu2">
                        <div class=" pb-5 d-flex justify-content-between align-items-center">
                            <h1 class="fw-semibold" style="font-size: 18px;">Transaction Limits</h1> <a
                                href="{{ route('transaction_limits.create') }}"
                                class="btn btn-sm btn-primary float-right">New Limit</a>
                        </div>
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body bg-gray-200 rounded-xl">
                                <div class="table-responsive">
                                    <table id="limits_tbl" class="table min-w-full dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Funds Transfer Type</th>
                                                <th>Daily Limit(&euro;)</th>
                                                <th>Weekly Limit(&euro;)</th>
                                                <th>Monthy Limit(&euro;)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane container fade" id="menu4">
                        <div class=" pb-5 d-flex justify-content-between align-items-center">
                            <h1 style="font-size: 18px;"><b>SMTP Credencials</b></h1> <a
                                href="{{ route('smtp.create') }}" class="btn btn-sm btn-primary float-right">New SMTP</a>
                        </div>
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body bg-gray-200 rounded-xl">
                                <div class="table-responsive">
                                    <table id="smtp_tbl" class="table min-w-full dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Mail Host</th>
                                                <th>Mail Port</th>
                                                <th>Mail Encryption</th>
                                                <th>Mail Username</th>
                                                <th>Mail Password</th>
                                                <th>Mail from Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="menu5">
                        <div class=" pb-5 d-flex justify-content-between align-items-center">
                            <h1 class="fw-semibold" style="font-size: 18px;">Payment Gatway</h1> <a
                                href="{{ route('payments_gatway.create') }}"
                                class="btn btn-sm btn-primary float-right">New Payment Gatway</a>
                        </div>
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body bg-gray-200 rounded-xl">
                                <div class="table-responsive">
                                    <table id="payment_gatway" class="table min-w-full dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Account Mode</th>
                                                <th>Public Key</th>
                                                <th>Public Secret</th>
                                                <th>Account Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        #service_tbl tr th {
                            width: 20% !important;
                            /* text-align: center; */
                        }

                        #service_tbl tr td {
                            /* padding-top: 15px !important; */
                        }
                    </style>
                    <div class="tab-pane container fade" id="menu3">
                        <div class=" pb-5 d-flex justify-content-between align-items-center">
                            <h1 style="font-size: 18px" class="fw-semibold">All Service</h1> <a
                                href="{{ route('service.create') }}" class="btn btn-primary btn-sm float-right">New
                                Services</a>
                        </div>
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body rounded-xl bg-gray-200">
                                <div class="table-responsive">
                                    <table id="service_tbl" class="table min-w-full dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Service Charges</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="deleteModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"></h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="text-center">Are you sure you want to delete the following location?
                                        </h4>
                                        <br />
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <div class="col-md-10">
                                                    <input type="hidden" class="form-control" id="id_delete">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                                            <span id="" class='glyphicon glyphicon-trash'></span> Delete
                                        </button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                                            <span class='glyphicon glyphicon-remove'></span> Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @include('admin.settings.nav') --}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script>
        $('#service_tbl').DataTable({
            "dom": '<"d-flex justify-content-between align-items-center"Bf>rt<"bottom"ip>',
            "iDisplayLength": 50,
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "buttons": ['pageLength', 'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('service.list.all') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "DT_RowIndex"
                },
                {
                    "data": "name",
                    "searchable": true,
                    "orderable": false,
                    "class": "text-nowrap",
                },
                {
                    "data": "service_charges",
                    "searchable": false,
                    "orderable": false,
                    "class": "text-nowrap",
                },
                {
                    "data": "status",
                    "searchable": false,
                    "orderable": false,
                    "class": "text-nowrap",
                },
                {
                    "data": "action",
                    "searchable": false,
                    "orderable": false,
                },

            ],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
    </script>

    <script>
        $("#smtp_tbl").DataTable({
            "dom": '<"d-flex justify-content-between align-items-center"Bf>rt<"bottom"ip>',
            "iDisplayLength": 50,
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "buttons": ['pageLength', 'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('smtp.list.all') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "DT_RowIndex"
                },
                {
                    "data": "mail_host",
                },
                {
                    "data": "mail_port"
                },
                {
                    "data": "mail_encreption"
                },
                {
                    "data": "mail_username"
                },

                {
                    "data": "mail_password"
                },
                {
                    "data": "mail_from_addressed"
                },
                {
                    "data": "action"
                }
            ],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
    </script>
    <script>
        $("#payment_gatway").DataTable({
            "dom": '<"d-flex justify-content-between align-items-center"Bf>rt<"bottom"ip>',
            "iDisplayLength": 50,
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "buttons": ['pageLength', 'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('payments_gatway.list.all') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "DT_RowIndex"
                },
                {
                    "data": "account_mode"
                },
                {
                    "data": "public_key"
                },
                {
                    "data": "secret_key"
                },
                {
                    "data": "account_name"
                },
                {
                    "data": "action"
                }
            ],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
    </script>

    <script>
        $('#limits_tbl').DataTable({
            "dom": '<"d-flex justify-content-between align-items-center"Bf>rt<"bottom"ip>',
            "iDisplayLength": 50,
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "buttons": ['pageLength', 'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('transactionLimitsList') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "DT_RowIndex"
                },
                {
                    "data": "country_code"
                },
                {
                    "data": "daily_limit"
                },
                {
                    "data": "weekly_limit"
                },
                {
                    "data": "monthly_limit"
                },

                {
                    "data": "action"
                }
            ],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
    </script>

    <script>
        $('#eu_funds_tbl2').DataTable({
            "dom": '<"d-flex justify-content-between align-items-center"Bf>rt<"bottom"ip>',
            "iDisplayLength": 50,
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "buttons": ['pageLength', 'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('IntlFundsTransferRatesList') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "DT_RowIndex"
                },
                {
                    "data": "name",
                    "searchable": true,
                    "orderable": false,
                    "class": "text-nowrap",
                },
                {
                    "data": "origin",
                    "searchable": true,
                    "orderable": false,
                    "class": "text-nowrap",
                },
                {
                    "data": "destination",
                    "searchable": true,
                    "orderable": false,
                    "class": "text-nowrap",
                },
                {
                    "data": "commision",
                    "searchable": false,
                    "orderable": false,
                    "class": "text-nowrap",
                },
                {
                    "data": "calc",
                    "searchable": false,
                    "orderable": false,
                    "class": "text-nowrap",
                },
                {
                    "data": "limits",
                    "searchable": false,
                    "orderable": false,
                    "class": "text-nowrap",
                },

                {
                    "data": "action",
                    "searchable": false,
                    "orderable": false, 
                }
            ],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
    </script>

    <script>
        $('#eu_funds_tbl').DataTable({
            "dom": '<"d-flex justify-content-between align-items-center"Bf>rt<"bottom"ip>',
            "iDisplayLength": 10,
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "buttons": ['pageLength', 'excel', 'csv', 'pdf', 'print'],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('EUFundsTransferRatesList') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "DT_RowIndex",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "name",
                    "searchable": true,
                    "orderable": false
                },
                {
                    "data": "origin",
                    "searchable": true,
                    "orderable": false
                },
                {
                    "data": "destination",
                    "searchable": true,
                    "orderable": false
                },
                {
                    "data": "commision",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "calc",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "limits",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "action",
                    "searchable": false,
                    "orderable": false
                }
            ],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
    </script>
@endsection
