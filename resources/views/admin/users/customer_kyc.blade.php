@extends('admin.app')
@section('page_title', 'Customer KYC')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs" id="adminTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="customer-kyc-tab" data-bs-toggle="tab"
                            data-bs-target="#customer-kyc-tab-pane" type="button" role="tab"
                            aria-controls="customer-kyc-tab-pane" aria-selected="true">Customer KYC</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="agent-kyc-tab" data-bs-toggle="tab"
                            data-bs-target="#agent-kyc-tab-pane" type="button" role="tab"
                            aria-controls="agent-kyc-tab-pane" aria-selected="false">Agents KYC</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="mobile-kyc-tab" data-bs-toggle="tab"
                            data-bs-target="#mobile-kyc-tab-pane" type="button" role="tab"
                            aria-controls="mobile-kyc-tab-pane" aria-selected="false">Mobile user KYC</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="mobile-logs-tab" data-bs-toggle="tab"
                            data-bs-target="#mobile-logs-tab-pane" type="button" role="tab"
                            aria-controls="mobile-logs-tab-pane" aria-selected="false">Mobile user Login Logs</button>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                @include('admin.partials.notification')
                <div class="tab-content" id="adminTabContent">
                    <div class="tab-pane fade show active" id="customer-kyc-tab-pane" role="tabpanel"
                        aria-labelledby="customer-kyc" tabindex="0">
                        <h5 class="card-title fw-semibold mb-4">Customer KYC</h5>
                        <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                            <div class="flex justify-between p-3">

                                <div class="flex space-x-3">

                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-width="1.5">
                                                <path stroke-miterlimit="10"
                                                    d="M6.395 7.705A7.885 7.885 0 0 1 12 5.382a7.929 7.929 0 0 1 7.929 7.929A7.94 7.94 0 0 1 12 21.25a7.939 7.939 0 0 1-7.929-7.94" />
                                                <path stroke-linejoin="round"
                                                    d="m7.12 2.75l-.95 3.858a1.332 1.332 0 0 0 .97 1.609l3.869.948" />
                                            </g>
                                        </svg>
                                    </button>

                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <g fill="none">
                                                <path
                                                    d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                <path fill="currentColor"
                                                    d="M12 16.5a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3m0-6a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3m0-6a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3" />
                                            </g>
                                        </svg>
                                    </button>

                                </div>

                            </div>

                            <div class="rounded-lg overflow-x-auto">
                                <table id="users_tbl" class="min-w-full ">
                                    <thead class="">
                                        <tr>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                S/N</th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                Date
                                            </th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                Particulers
                                            </th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                KYC Status
                                            </th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                Status</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="agent-kyc-tab-pane" role="tabpanel" aria-labelledby="agent-kyc"
                        tabindex="0">
                        <h5 class="card-title fw-semibold mb-4">Agent KYC</h5>
                        <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                            <div class="flex justify-between p-3">

                                <div class="flex space-x-3">

                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-width="1.5">
                                                <path stroke-miterlimit="10"
                                                    d="M6.395 7.705A7.885 7.885 0 0 1 12 5.382a7.929 7.929 0 0 1 7.929 7.929A7.94 7.94 0 0 1 12 21.25a7.939 7.939 0 0 1-7.929-7.94" />
                                                <path stroke-linejoin="round"
                                                    d="m7.12 2.75l-.95 3.858a1.332 1.332 0 0 0 .97 1.609l3.869.948" />
                                            </g>
                                        </svg>
                                    </button>

                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <g fill="none">
                                                <path
                                                    d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                <path fill="currentColor"
                                                    d="M12 16.5a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3m0-6a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3m0-6a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3" />
                                            </g>
                                        </svg>
                                    </button>

                                </div>

                            </div>

                            <div class="rounded-lg overflow-x-auto">
                                <table id="agents_tbl" class="min-w-full ">
                                    <thead class="">
                                        <tr>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                S/N</th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                Date
                                            </th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                Particulers
                                            </th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                KYC Status
                                            </th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                Status</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="mobile-kyc-tab-pane" role="tabpanel" aria-labelledby="mobile-kyc"
                        tabindex="0">
                        <h5 class="card-title fw-semibold mb-4">Mobile KYC</h5>
                        <hr>

                        <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                            <div class="flex justify-between p-3">

                                <div class="flex space-x-3">

                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-width="1.5">
                                                <path stroke-miterlimit="10"
                                                    d="M6.395 7.705A7.885 7.885 0 0 1 12 5.382a7.929 7.929 0 0 1 7.929 7.929A7.94 7.94 0 0 1 12 21.25a7.939 7.939 0 0 1-7.929-7.94" />
                                                <path stroke-linejoin="round"
                                                    d="m7.12 2.75l-.95 3.858a1.332 1.332 0 0 0 .97 1.609l3.869.948" />
                                            </g>
                                        </svg>
                                    </button>

                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <g fill="none">
                                                <path
                                                    d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                <path fill="currentColor"
                                                    d="M12 16.5a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3m0-6a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3m0-6a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3" />
                                            </g>
                                        </svg>
                                    </button>

                                </div>

                            </div>

                            <div class="rounded-lg overflow-x-auto">
                                <table id="mobile_tbl" class="min-w-full ">
                                    <thead class="">
                                        <tr>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                S/N</th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                Date
                                            </th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                Particulers
                                            </th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                KYC Status
                                            </th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                Status</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>


                    <div class="tab-pane fade" id="mobile-logs-tab-pane" role="tabpanel" aria-labelledby="mobile-logs"
                        tabindex="0">
                        <h5 class="card-title fw-semibold mb-4">Mobile Login Logs</h5>
                        <hr>

                        <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                            <div class="flex justify-between p-3">

                                <div class="flex space-x-3">

                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-width="1.5">
                                                <path stroke-miterlimit="10"
                                                    d="M6.395 7.705A7.885 7.885 0 0 1 12 5.382a7.929 7.929 0 0 1 7.929 7.929A7.94 7.94 0 0 1 12 21.25a7.939 7.939 0 0 1-7.929-7.94" />
                                                <path stroke-linejoin="round"
                                                    d="m7.12 2.75l-.95 3.858a1.332 1.332 0 0 0 .97 1.609l3.869.948" />
                                            </g>
                                        </svg>
                                    </button>

                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <g fill="none">
                                                <path
                                                    d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                <path fill="currentColor"
                                                    d="M12 16.5a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3m0-6a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3m0-6a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3" />
                                            </g>
                                        </svg>
                                    </button>

                                </div>

                            </div>

                            <div class="rounded-lg overflow-x-auto">
                                <table id="mobile_logs_tbl" class="min-w-full ">
                                    <thead class="">
                                        <tr>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                S/N</th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                Date
                                            </th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                User
                                            </th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                IP
                                            </th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                Device</th>
                                            <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                Location</th>
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
        $('#agents_tbl').DataTable({
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
                "url": "{{ route('allAgentList') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "DT_RowIndex"
                },
                {
                    "data": "date"
                },
                {
                    "data": "surname"
                },
                {
                    "data": "kyc_actions"
                },
                {
                    "data": "kyc_status"
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
        $('#mobile_tbl').DataTable({
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
                "url": "{{ route('allMobileUserList') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "DT_RowIndex"
                },
                {
                    "data": "date"
                },
                {
                    "data": "surname"
                },
                {
                    "data": "kyc_actions"
                },
                {
                    "data": "kyc_status"
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
        $('#users_tbl').DataTable({
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
                "url": "{{ route('allWalkInCusList') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "DT_RowIndex"
                },
                {
                    "data": "date"
                },
                {
                    "data": "surname"
                },
                {
                    "data": "kyc_actions"
                },
                {
                    "data": "kyc_status"
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
        $('#mobile_logs_tbl').DataTable({
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
                "url": "{{ route('listUserLoginData') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "DT_RowIndex"
                },
                {
                    "data": "created_at"
                },
                {
                    "data": "user_id"
                },
                {
                    "data": "ip_address"
                },
                {
                    "data": "device"
                },
                {
                    "data": "location"
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
