@extends('admin.app')
@section('page_title', 'My EU Fund Transfer Orders')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">EU Fund Transfer Orders Reports</h5>

                @include('admin.partials.notification')
                <div class="d">
                    <form action="" method="get" class="from-inline">
                        {{-- <p>{{$message}}</p> --}}
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="">
                                <input type="date" name="date_from" id="date_from" class="form-control"
                                    placeholder="Start date">
                            </div>
                            <div class="">
                                <input type="date" name="date_to" id="date_to" class="form-control"
                                    placeholder="End date">
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary">Get Reports</button>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                @if (isset($reports))
                    <button type="button" onclick="PrintElem('rep')" class="btn btn-warning"><i class="fas fa-print"></i>
                        Print</button>
                    <button type="button" onclick="generatePDF('rep')" class="btn btn-warning"><i class="fas fa-pdf"></i>
                        PDF</button>
                    <div id="rep" class="p-1">
                        <h3>EU Fund Transfer Orders</h3>
                        <table class="table table-borderless table-sm">
                            <tr>
                                <th>Exchange: </th>
                                <td>Siopay Multiservisi SRL</td>
                            </tr>
                            <tr>
                                <th>Teller/ Pos: </th>
                                <td>{{ str_pad(Auth::id(), 4, '0', STR_PAD_LEFT) }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Date Range
                                </th>
                                <td>
                                    {{ request()->get('date_from') }} to {{ request()->get('date_to') }}
                                </td>
                            </tr>
                        </table>
                        <table class="table table-sm table-bordered">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>Remittance No</th>
                                    <th colspan="2">Remitters Pariculars</th>
                                    <th colspan="3">Beneficiary's Particulars</th>
                                    <th>Remitteance Amt.</th>
                                    <th colspan="4">Amount. Recieved</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Name</th>
                                    <th>Account/ Sec. No.</th>
                                    <th>Bank/ Doc. no.</th>
                                    <th></th>
                                    <th>TT Amt.</th>
                                    <th>Comm.</th>
                                    <th>Tax</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_tt = 0;
                                    $total_comm = 0;
                                    $total_tax = 0;
                                    $total_total = 0;
                                @endphp
                                @foreach ($reports as $r)
                                    <tr>
                                        <td>
                                            {{ $r->tracking_id }}
                                        </td>
                                        <td>{{ $r->walk_in_customer->tax_code ?? 'N/A' }}</td>
                                        <td>{{ $r->walk_in_customer->name ?? 'N/A' }}</td>
                                        <td>{{ $r->rx_name && $r->rx_surname ? $r->rx_name . ' ' . $r->rx_surname : $r->rx_bank_account_name }}
                                        </td>
                                        <td>{{ $r->rx_bank_account_number }} ({{ $r->rx_bank_routing_no }})</td>
                                        <td>{{ $r->rx_bank_name ?? 'N/A' }}</td>
                                        <td>EUR {{ number_format($r->rx_amount) }}</td>
                                        <td>
                                            @php
                                                $total_tt += $r->s_amount;
                                            @endphp
                                            EUR {{ number_format($r->s_amount) }}
                                        </td>
                                        <td>
                                            @php
                                                $total_comm += $r->rate->commision;
                                            @endphp
                                            EUR {{ number_format($r->rate->commision) }}
                                        </td>
                                        <td>
                                            @php
                                                $total_tax += 0;
                                            @endphp
                                            EUR {{ 0.0 }}
                                        </td>
                                        <td>
                                            @php
                                                $total_total += $r->rate->commision + $r->s_amount;
                                            @endphp
                                            EUR {{ number_format($r->rate->commision + $r->s_amount) }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>{{ count($reports) }}</th>
                                    <th colspan="6"></th>
                                    <th>{{ $total_tt }}</th>
                                    <th>{{ $total_comm }}</th>
                                    <th>{{ $total_tax }}</th>
                                    <th>{{ $total_total }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function PrintElem(elem) {
            var mywindow = window.open('', 'PRINT', 'height=400,width=600');

            mywindow.document.write('<html><head><title>' + document.title + '</title>');
            mywindow.document.write(
                `<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            `);
            mywindow.document.write(`<style>
                .table-bordered th,
                .table-bordered td {
                border: 1px solid #000 !important;
                }
                .table-bordered th{
                    background: gray;
                    color: white;
                }
            </style>`);
            mywindow.document.write('</head><body>');

            mywindow.document.write(document.getElementById(elem).innerHTML);
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // IE >= 10

            // Wait for the window and its contents to load
            mywindow.onload = function() {
                mywindow.focus(); // Set focus for IE
                mywindow.print();
                // Optional: Uncomment the line below to close the window after printing
                // mywindow.close();
            };

            return true;
        }

        function generatePDF(elem) {
            // Choose the element that your content will be rendered to.
            const element = document.getElementById(elem);
            // Choose the element and save the PDF for your user.
            html2pdf().set({
                    html2canvas: {
                        scale: 4
                    }
                })
                .from(element).from(element).save();
        }

        function print(elem) {
            let printContents, popupWin;
            printContents = document.getElementById(elem).innerHTML;
            popupWin = window.open('', '_blank', 'top=0,left=0,height=100%,width=auto');
            popupWin.document.open();
            popupWin.document.write(`
            <html>
                <head>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                </head>
                <style>

                </style>
                <body onload="window.print();window.close()">${printContents}</body>
            </html>`);
            popupWin.document.close();
        }
    </script>
@endsection
