@extends('admin.app')
@section('page_title', 'Manage Users')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <ul class="nav nav-tabs" id="adminTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user-tab-pane"
                            type="button" role="tab" aria-controls="user-tab-pane" aria-selected="true">All
                            Users</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="agent-tab" data-bs-toggle="tab" data-bs-target="#agent-tab-pane"
                            type="button" role="tab" aria-controls="agent-tab-pane"
                            aria-selected="false">Agents</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="mobile-tab" data-bs-toggle="tab" data-bs-target="#mobile-tab-pane"
                            type="button" role="tab" aria-controls="mobile-tab-pane" aria-selected="false">Mobile
                            Users</button>
                    </li>
                    @if (auth()->user()->user_type == 'admin')
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="kyc-tab" data-bs-toggle="tab" data-bs-target="#kyc-tab-pane"
                                type="button" role="tab" aria-controls="kyc-tab-pane" aria-selected="false">KYC
                                Managers</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="acm-tab" data-bs-toggle="tab" data-bs-target="#acm-tab-pane"
                                type="button" role="tab" aria-controls="acm-tab-pane" aria-selected="false">Account
                                Managers</button>
                        </li>
                    @endif
                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="mobile-logs-tab" data-bs-toggle="tab"
                            data-bs-target="#mobile-logs-tab-pane" type="button" role="tab"
                            aria-controls="mobile-logs-tab-pane" aria-selected="false">Mobile user Login Logs</button>
                    </li> --}}
                </ul>
                @if (auth()->user()->user_type == 'admin')
                    <a href="{{ route('createUser') }}" class="btn btn-primary">Add New User</a>
                @endif
            </div>

            <div class="card-body">
                @include('admin.partials.notification')
                <div class="tab-content" id="adminTabContent">
                    {{-- All Users --}}
                    <div class="tab-pane fade show active" id="user-tab-pane" role="tabpanel" aria-labelledby="user"
                        tabindex="0">
                        <h5 class="card-title fw-semibold mb-4">All Users</h5>
                        <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                            <div class="rounded-lg overflow-x-auto">
                                <table id="users_tbl" class="table min-w-full ">
                                    <thead class="">
                                        <tr>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                S/N
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                User Name
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                User ID
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                Status
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                Creation Date
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                User Type
                                            </th>
                                            @if (auth()->user()->user_type != 'account_manager')
                                                <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                    Action
                                                </th>    
                                            @endif

                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                    {{-- Agents --}}
                    <div class="tab-pane fade" id="agent-tab-pane" role="tabpanel" aria-labelledby="agent" tabindex="0">
                        <h5 class="card-title fw-semibold mb-4">Agents</h5>
                        <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                            <div class="rounded-lg overflow-x-auto">
                                <table id="agents_tbl" class="table min-w-full">
                                    <thead class="">
                                        <tr>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                S/N
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                User Name
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                User ID
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                Status
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                Creation Date
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                    {{-- Mobile Users --}}
                    <div class="tab-pane fade" id="mobile-tab-pane" role="tabpanel" aria-labelledby="mobile" tabindex="0">
                        <h5 class="card-title fw-semibold mb-4">Mobile Users</h5>
                        <hr>
                        <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                            <div class="rounded-lg overflow-x-auto">
                                <table id="mobile_tbl" class="table min-w-full">
                                    <thead class="">
                                        <tr>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                S/N
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                User Name
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                User ID
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                Status
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                Creation Date
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                    {{-- KYC Managers --}}
                    <div class="tab-pane fade" id="kyc-tab-pane" role="tabpanel" aria-labelledby="kyc" tabindex="0">
                        <h5 class="card-title fw-semibold mb-4">KYC Managers</h5>
                        <hr>
                        <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                            <div class="rounded-lg overflow-x-auto">
                                <table id="kyc_manager_tbl" class="table min-w-full ">
                                    <thead class="">
                                        <tr>
                                        <tr>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                S/N
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                User Name
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                User ID
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                Status
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                Creation Date
                                            </th>

                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                Action
                                            </th>
                                        </tr>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                    {{-- Account Managers --}}
                    <div class="tab-pane fade" id="acm-tab-pane" role="tabpanel" aria-labelledby="acm" tabindex="0">
                        <h5 class="card-title fw-semibold mb-4">Account Managers</h5>
                        <hr>
                        <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                            <div class="rounded-lg overflow-x-auto">
                                <table id="account_manager_tbl" class="table min-w-full">
                                    <thead class="">
                                        <tr>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                S/N
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                User Name
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                User ID
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                Status
                                            </th>
                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                Creation Date
                                            </th>

                                            <th class="w-auto py-3 px-2 uppercase font-semibold text-sm">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#users_tbl').DataTable({
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
                "url": "{{ route('allUsersList') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "DT_RowIndex",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "user_name",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "user_unique_id",
                    "searchable": true,
                    "orderable": true
                },
                {
                    "data": "status",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "date",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "user_type",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "action",
                    "searchable": false,
                    "orderable": false,
                    'visible': "{{ auth()->user()->user_type == 'account_manager' ? false : true }}"
                },
            ],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });

        $('#agents_tbl').DataTable({
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
                "url": "{{ route('allAgentList') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "DT_RowIndex",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "user_name",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "user_unique_id",
                    "searchable": true,
                    "orderable": true
                },
                {
                    "data": "status",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "date",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "action",
                    "searchable": false,
                    "orderable": false
                },
            ],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });

        $('#mobile_tbl').DataTable({
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
                "url": "{{ route('allMobileUserList') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "DT_RowIndex",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "user_name",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "user_unique_id",
                    "searchable": true,
                    "orderable": true
                },
                {
                    "data": "status",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "date",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "action",
                    "searchable": false,
                    "orderable": false
                },
            ],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });

        $('#kyc_manager_tbl').DataTable({
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
                "url": "{{ route('allKycManagerList') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "DT_RowIndex",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "user_name",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "user_unique_id",
                    "searchable": true,
                    "orderable": true
                },
                {
                    "data": "status",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "date",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "action",
                    "searchable": false,
                    "orderable": false
                },
            ],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });

        $('#account_manager_tbl').DataTable({
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
                "url": "{{ route('allAccountManagerList') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "DT_RowIndex",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "user_name",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "user_unique_id",
                    "searchable": true,
                    "orderable": true
                },
                {
                    "data": "status",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "date",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "action",
                    "searchable": false,
                    "orderable": false
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

@endsection
