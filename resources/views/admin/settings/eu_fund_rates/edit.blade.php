@extends('admin.app')
@section('page_title', 'Edit Funds Transfer Rate')
@section('content')
    <div class="container-fluid">
                {{-- <h5 class="card-title fw-semibold mb-4">Settings</h5> --}}
                {{-- @include('admin.settings.nav')
                <hr> --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="fw-simibold" style="font-size: 18px;">Edit EU Funds Transfer Rate</h4>
                        {{-- <a href="{{ route('eu_fund_rates.index') }}" class="btn btn-danger float-right"><i
                                class="fa fa-times"></i>Exit</a> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('admin.partials.notification')
                         {{-- @dd($eUFundsTransferRates->toArray()); --}}
                        <form action="{{ route('eu_fund_rates.update', $eUFundsTransferRates->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="font-bold" for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $eUFundsTransferRates->name }}" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="p-2 space-y-2">
                                        <label class="font-bold" for="s_country_eu">Select Origin Country</label>
                                        <select name="s_country_eu" id="s_country_eu" class="form-control rounded-lg" required>
                                            @error('s_country_eu')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="p-2 space-y-2">
                                        <label class="font-bold" for="rx_country_eu">Select Destination Country</label>
                                        <select name="rx_country_eu" id="rx_country_eu" class="form-control rounded-lg" required>
                                            @error('rx_country_eu')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="font-bold" for="calc">Commision Calculation</label>
                                    <select name="calc" id="calc" class="form-control" required>
                                        <option value="perc"
                                            {{ $eUFundsTransferRates->calc == 'perc' ? 'selected' : '' }}>Percentage
                                        </option>
                                        <option value="fixed"
                                            {{ $eUFundsTransferRates->calc == 'fixed' ? 'selected' : '' }}>Fixed Amount
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-bold" for="commision">Commision Amount Or Percentage</label>
                                    <input step="any" min="0" max="100" class="form-control" type="number"
                                        name="commision" id="commision" value="{{ $eUFundsTransferRates->commision }}"
                                        required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="font-bold" for="min_amt">Minimum Amount supported</label>
                                    <input type="number" name="min_amt" id="min_amt" min="0" step="any"
                                        class="form-control" value="{{ $eUFundsTransferRates->min_amt }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-bold" for="max_amt">Maximum Amount supported</label>
                                    <input type="number" name="max_amt" id="max_amt" min="0" step="any"
                                        class="form-control" value="{{ $eUFundsTransferRates->max_amt }}" required>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                        </form>
                    </div>
                </div>
    </div>
@endsection
@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#s_country_eu').select2()
            $('#rx_country_eu').select2()
            //   $('#residential_country').select2();
            countries();

             s_countryValue = @json($eUFundsTransferRates->s_country_eu);
             rx_countryValue = @json($eUFundsTransferRates->rx_country_eu);
             console.log(rx_countryValue);

            function countries() {

                $('#rx_country_eu').html('<option value="" disabled >Select Country</option>');
                $('#s_country_eu').html('<option value="" disabled >Select Country</option>');
                var _token = '{{ csrf_token() }}';
                let url = "{{ route('ajax-get-eu-countries') }}";
                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    data: {
                        '_token': _token
                    },
                    success: function(response) {
                        if (response.success) {
                            $.each(response.countries, function(key, value) {
                                if(s_countryValue == value.name) {
                                    $("#s_country_eu").append('<option selected value="' + value.name +
                                    '">' + value.name + '</option>');
                                } else {
                                    $("#s_country_eu").append('<option value="' + value.name +
                                    '">' + value.name + '</option>');
                                }

                            });
                            $('#s_country_eu').trigger('change');

                            $.each(response.countries, function(key, value) {
                                if(rx_countryValue == value.name) {
                                $("#rx_country_eu").append('<option selected value="' + value
                                    .name +
                                    '">' + value.name + '</option>');
                                } else {
                                    $("#rx_country_eu").append('<option value="' + value
                                    .name +
                                    '">' + value.name + '</option>');
                                }
                            });
                            $('#rx_country_eu').trigger('change');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        })
    </script>
    <script>
        const europeanTerritories = [
            // Recognized European Countries
            "Albania",
            "Andorra",
            "Austria",
            "Belarus",
            "Belgium",
            "Bosnia and Herzegovina",
            "Bulgaria",
            "Croatia",
            "Cyprus",
            "Czech Republic",
            "Denmark",
            "Estonia",
            "Faroe Islands",
            "Finland",
            "France",
            "Germany",
            "Gibraltar",
            "Greece",
            "Guernsey",
            "Hungary",
            "Iceland",
            "Ireland",
            "Isle of Man",
            "Italy",
            "Jersey",
            "Kosovo",
            "Latvia",
            "Liechtenstein",
            "Lithuania",
            "Luxembourg",
            "Malta",
            "Moldova",
            "Monaco",
            "Montenegro",
            "Netherlands",
            "North Macedonia",
            "Norway",
            "Poland",
            "Portugal",
            "Romania",
            "Russia",
            "San Marino",
            "Serbia",
            "Slovakia",
            "Slovenia",
            "Spain",
            "Svalbard and Jan Mayen",
            "Sweden",
            "Switzerland",
            "Ukraine",
            "United Kingdom",
            "Vatican City",

            // Dependent Territories and Special Regions
            "Aland Islands",
            "Akrotiri and Dhekelia",
            "Åland Islands",
            "Azores",
            "Balearic Islands",
            "Canary Islands",
            "Ceuta and Melilla",
            "Channel Islands",
            "Crimea",
            "Curaçao",
            "French Guiana",
            "Gagauzia",
            "Gottland",
            "Greenland",
            "Guadeloupe",
            "Madeira",
            "Man, Isle of",
            "Nagorno-Karabakh",
            "Northern Cyprus",
            "Republika Srpska",
            "Sark",
            "Sealand",
            "Transnistria",
        ];

        // Initialize autocomplete
        $("#s_country_eu").autocomplete({
            source: europeanTerritories,
            minLength: 1 // Minimum number of characters before triggering autocomplete
        });

        // Initialize autocomplete
        $("#rx_country_eu").autocomplete({
            source: europeanTerritories,
            minLength: 1 // Minimum number of characters before triggering autocomplete
        });
    </script>
@endsection
