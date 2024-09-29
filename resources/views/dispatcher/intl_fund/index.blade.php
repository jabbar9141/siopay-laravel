@extends('admin.app')
@section('page_title', 'My Intenational Fund Transfer Orders')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">All My Intenational Fund Transfer Orders
                    <a href="{{ route('intl_fund_trasfer_order.create') }}"
                        class="border-2 p-2 border-blue-500 mr-2 text-blue-500 rounded-lg hover:bg-blue-300 hover:text-white hover:border-white"
                        style="float: right">
                        New Order
                    </a>
                    <a href="{{ route('dispatchIntlFundOrdersReportPage') }}"
                        class="border-2 p-2 border-blue-500 text-blue-500 rounded-lg hover:bg-blue-300 hover:text-white hover:border-white"
                        style="float: right">
                        <i class="fas fa-file"></i> Reports
                    </a>
                </h5>

                @include('admin.partials.notification')
                <!-- /.card-header -->
                <h5>Intenational Fund Transfer Orders</h5>
                <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                    <div class="flex justify-between p-3">

                        <h1 class="font-bold">Transaction details</h1>

                        <div class="flex space-x-3">

                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                                        <path stroke-miterlimit="10"
                                            d="M6.395 7.705A7.885 7.885 0 0 1 12 5.382a7.929 7.929 0 0 1 7.929 7.929A7.94 7.94 0 0 1 12 21.25a7.939 7.939 0 0 1-7.929-7.94" />
                                        <path stroke-linejoin="round"
                                            d="m7.12 2.75l-.95 3.858a1.332 1.332 0 0 0 .97 1.609l3.869.948" />
                                    </g>
                                </svg>
                            </button>

                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
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
                        <table id="orders_tbl" class="min-w-full ">
                            <thead class="">
                                <tr>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">S/N</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                        Data
                                    </th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Sender
                                    </th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Receiver
                                    </th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                        Status</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">View
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    @endsection
    @section('scripts')
        <script>
            $('#orders_tbl').DataTable({
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
                    "url": "{{ route('dispatchIntlFundOrdersList') }}",
                    "type": "GET"
                },
                "columns": [{
                        "data": "DT_RowIndex"
                    },
                    {
                        "data": "date"
                    },
                    {
                        "data": "sender"
                    },
                    {
                        "data": "reciever"
                    },
                    {
                        "data": "status"
                    },
                    {
                        "data": "view"
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
