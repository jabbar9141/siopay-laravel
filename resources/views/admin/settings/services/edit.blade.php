@extends('admin.app')
@section('page_title', 'Edit Funds Transfer Rate')
@section('content')
    <div class="container-fluid">
        {{-- <div class="card">
            <div class="card-body"> --}}
                {{-- <h5 class="card-title fw-semibold mb-4">Settings</h5> --}}
                {{-- @include('admin.settings.nav')
                <hr> --}}
                <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="fw-simibold" style="font-size: 18px;">Edit Service</h5><a href="{{ route('eu_fund_rates.index') }}" class="btn btn-danger float-right"><i
                                        class="fa fa-times"></i>Exit</a>
                                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('admin.partials.notification')

                        <form action="{{ route('service.update', $service->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $service->name }}" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="ui-widget">
                                        <div class="ui-widget">
                                            <label for="logo">Logo</label>
                                            <input style="width: 100%" type="file" name="logo"
                                                value="{{ old('logo') }}" class="form-control" id="logo"
                                                autocomplete="off" placeholder="logo" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="ui-widget">
                                        <label for="service_charges">Service Chages</label>
                                        <input style="width: 100%" type="number" name="service_charges"
                                            value="{{ $service->service_charges }}" class="form-control" id="service_charges"
                                            placeholder="service Charges" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </form>
                    </div>
        </div>
        </div>
    </div>
@endsection
@section('scripts')
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
