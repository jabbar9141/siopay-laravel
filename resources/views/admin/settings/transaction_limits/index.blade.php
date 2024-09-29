@extends('admin.app')
@section('page_title', 'Transaction Limits')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Settings</h5>
                @include('admin.settings.nav')
                <hr>
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('transaction_limits.create') }}" class="btn btn-primary float-right">New Limit</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="limits_tbl" class="table table-sm  table-bordered table-striped">
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
        </div>
    </div>
@endsection
@section('scripts')
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
@endsection
