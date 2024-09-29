@extends('admin.app')
@section('page_title', 'My Money Transfer Orders')
@section('content')
    <div class="container-fluid">
        <div class="bg-gray-200 mt-5 p-3 rounded-xl flex flex-col items-center">
            <div class="card-body">
                <h4 class="text-xl ">...coming soon</h4>
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
                "url": "{{ route('adminIntlFundOrdersList') }}",
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
