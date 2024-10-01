@php
    $user = auth()->user();
@endphp
@extends('admin.app')
@section('page_title', 'Home')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home">EU Funds Transfer Rates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#menu1">Intl Funds Transfer Rates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#menu2">Transaction Limits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#menu3">Service Charges</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">


                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane container active" id="home">
                        <div class=" py-2 d-flex justify-content-between align-items-center">
                            <h5>EU Funds Transfer Rates</h5>   <a href="{{ route('eu_fund_rates.create') }}" class="btn btn-primary btn-sm float-right">New Rate</a>
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
                                                <th>Locations</th>
                                                <th>Commision</th>
                                                <th>Limits(&euro;)</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
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
                        <div class=" py-2 d-flex justify-content-between align-items-center">
                            <h5>International Funds Transfer Rates</h5>  <a href="{{ route('intl_funds_rate.create') }}" class="btn btn-sm btn-primary float-right">New Rate</a>
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
                                                <th>Locations</th>
                                                <th>Currencies</th>
                                                <th>Commision</th>
                                                <th>Limits(&euro;)</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
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
                    <div class="tab-pane container fade" id="menu2">
                        <div class=" py-2 d-flex justify-content-between align-items-center">
                            <h5>Transaction Limits</h5>   <a href="{{ route('transaction_limits.create') }}" class="btn btn-sm btn-primary float-right">New Limit</a>
                        </div>
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body bg-gray-200 rounded-xl">
                                <div class="table-responsive">
                                    <table id="limits_tbl" class="table min-w-full dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Country</th>
                                                <th>Monthy Limit(&euro;)</th>
                                                <th>Daily Limit(&euro;)</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        #service_tbl tr th{
                            width: 20% !important;
                            /* text-align: center; */
                        }
                        #service_tbl tr td{
                            /* padding-top: 15px !important; */
                        }
                    </style>
                    <div class="tab-pane container fade" id="menu3">
                        <div class=" py-2 d-flex justify-content-between align-items-center">
                            <h5>All Service</h5>   <a href="{{ route('service.create') }}" class="btn btn-primary btn-sm float-right">New Services</a>
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
                </div>
                {{-- @include('admin.settings.nav') --}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#service_tbl').DataTable({
            "dom": 'Bfrtip',
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
                    "data": "name"
                },
                {
                    "data": "service_charges"
                },
                {
                    "data": "status"
                },
                {
                    "data": "action"
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
    $('#limits_tbl').DataTable({
        "dom": 'Bfrtip',
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
                "data": "monthly_limit"
            },
            {
                "data": "daily_limit"
            },
            {
                "data": "edit"
            },
            {
                "data": "delete"
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
                "dom": 'Bfrtip',
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
                        "data": "name"
                    },
                    {
                        "data": "location"
                    },
                    {
                        "data": "currencies"
                    },
                    {
                        "data": "commision"
                    },
                    {
                        "data": "limits"
                    },
                    {
                        "data": "edit"
                    },
                    {
                        "data": "delete"
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
                "dom": 'Bfrtip',
                "iDisplayLength": 50,
                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                "buttons": ['pageLength', 'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('EUFundsTransferRatesList') }}",
                    "type": "GET"
                },
                "columns": [{
                        "data": "DT_RowIndex"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "location"
                    },
                    {
                        "data": "commision"
                    },
                    {
                        "data": "limits"
                    },
                    {
                        "data": "edit"
                    },
                    {
                        "data": "delete"
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
