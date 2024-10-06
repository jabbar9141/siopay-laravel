@extends('admin.app')
@section('page_title', 'Create Shipping Rate')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                {{-- <h5 class="card-title fw-semibold mb-4">Settings</h5> --}}
                {{-- @include('admin.settings.nav') --}}
                {{-- <hr> --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-item-center">
                        <h4 class="font-bold">Edit International Funds Transfer Rate</h4>
                        {{-- <a href="{{ route('intl_funds_rate.index') }}"
                            class="btn btn-danger float-right"><i class="fa fa-times"></i>Exit</a> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('admin.partials.notification')

                        <form action="{{ route('intl_funds_rate.update', $intlFundsTransferRates->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="font-bold" for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $intlFundsTransferRates->name }}">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="p-2 space-y-2">
                                        <label class="font-bold" class="mb-0" for="s_country">Select Origin Country </label>
                                        <select name="s_country" id="s_country" class="form-control rounded-lg" required>
                                            @error('s_country')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="p-2 space-y-2">
                                        <label class="font-bold" class="mb-0" for="rx_country">Select Destination Country</label>
                                        <select name="rx_country" id="rx_country" class="form-control rounded-lg" required>
                                            @error('rx_country')
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
                                    <select name="calc" id="calc" class="form-control">
                                        <option value="perc"
                                            {{ $intlFundsTransferRates->calc == 'perc' ? 'selected' : '' }}>Percentage
                                        </option>
                                        <option value="fixed"
                                            {{ $intlFundsTransferRates->calc == 'fixed' ? 'selected' : '' }}>Fixed Amount
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-bold" for="commision">Commision Amount Or Percentage</label>
                                    <input step="any" min="0" max="100" class="form-control" type="number"
                                        name="commision" id="commision" value="{{ $intlFundsTransferRates->commision }}"
                                        required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="font-bold" for="min_amt">Minimum Amount supported</label>
                                    <input type="number" name="min_amt" id="min_amt" min="0" step="any"
                                        class="form-control" value="{{ $intlFundsTransferRates->min_amt }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-bold" for="max_amt">Maximum Amount supported</label>
                                    <input type="number" name="max_amt" id="max_amt" min="0" step="any"
                                        class="form-control" value="{{ $intlFundsTransferRates->max_amt }}" required>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        let countries = [
            "Afghanistan",
            "Albania",
            "Algeria",
            "Andorra",
            "Angola",
            "Antigua and Barbuda",
            "Argentina",
            "Armenia",
            "Australia",
            "Austria",
            "Azerbaijan",
            "Bahamas",
            "Bahrain",
            "Bangladesh",
            "Barbados",
            "Belarus",
            "Belgium",
            "Belize",
            "Benin",
            "Bhutan",
            "Bolivia",
            "Bosnia and Herzegovina",
            "Botswana",
            "Brazil",
            "Brunei",
            "Bulgaria",
            "Burkina Faso",
            "Burundi",
            "Cabo Verde",
            "Cambodia",
            "Cameroon",
            "Canada",
            "Central African Republic",
            "Chad",
            "Chile",
            "China",
            "Colombia",
            "Comoros",
            "Congo (Congo-Brazzaville)",
            "Costa Rica",
            "Croatia",
            "Cuba",
            "Cyprus",
            "Czechia (Czech Republic)",
            "Democratic Republic of the Congo (Congo-Kinshasa)",
            "Denmark",
            "Djibouti",
            "Dominica",
            "Dominican Republic",
            "Ecuador",
            "Egypt",
            "El Salvador",
            "Equatorial Guinea",
            "Eritrea",
            "Estonia",
            "Eswatini (fmr. Swaziland)",
            "Ethiopia",
            "Fiji",
            "Finland",
            "France",
            "Gabon",
            "Gambia",
            "Georgia",
            "Germany",
            "Ghana",
            "Greece",
            "Grenada",
            "Guatemala",
            "Guinea",
            "Guinea-Bissau",
            "Guyana",
            "Haiti",
            "Holy See",
            "Honduras",
            "Hungary",
            "Iceland",
            "India",
            "Indonesia",
            "Iran",
            "Iraq",
            "Ireland",
            "Israel",
            "Italy",
            "Ivory Coast",
            "Jamaica",
            "Japan",
            "Jordan",
            "Kazakhstan",
            "Kenya",
            "Kiribati",
            "Kuwait",
            "Kyrgyzstan",
            "Laos",
            "Latvia",
            "Lebanon",
            "Lesotho",
            "Liberia",
            "Libya",
            "Liechtenstein",
            "Lithuania",
            "Luxembourg",
            "Madagascar",
            "Malawi",
            "Malaysia",
            "Maldives",
            "Mali",
            "Malta",
            "Marshall Islands",
            "Mauritania",
            "Mauritius",
            "Mexico",
            "Micronesia",
            "Moldova",
            "Monaco",
            "Mongolia",
            "Montenegro",
            "Morocco",
            "Mozambique",
            "Myanmar (formerly Burma)",
            "Namibia",
            "Nauru",
            "Nepal",
            "Netherlands",
            "New Zealand",
            "Nicaragua",
            "Niger",
            "Nigeria",
            "North Korea",
            "North Macedonia (formerly Macedonia)",
            "Norway",
            "Oman",
            "Pakistan",
            "Palau",
            "Palestine State",
            "Panama",
            "Papua New Guinea",
            "Paraguay",
            "Peru",
            "Philippines",
            "Poland",
            "Portugal",
            "Qatar",
            "Romania",
            "Russia",
            "Rwanda",
            "Saint Kitts and Nevis",
            "Saint Lucia",
            "Saint Vincent and the Grenadines",
            "Samoa",
            "San Marino",
            "Sao Tome and Principe",
            "Saudi Arabia",
            "Senegal",
            "Serbia",
            "Seychelles",
            "Sierra Leone",
            "Singapore",
            "Slovakia",
            "Slovenia",
            "Solomon Islands",
            "Somalia",
            "South Africa",
            "South Korea",
            "South Sudan",
            "Spain",
            "Sri Lanka",
            "Sudan",
            "Suriname",
            "Sweden",
            "Switzerland",
            "Syria",
            "Tajikistan",
            "Tanzania",
            "Thailand",
            "Timor-Leste",
            "Togo",
            "Tonga",
            "Trinidad and Tobago",
            "Tunisia",
            "Turkey",
            "Turkmenistan",
            "Tuvalu",
            "Uganda",
            "Ukraine",
            "United Arab Emirates",
            "United Kingdom",
            "United States of America",
            "Uruguay",
            "Uzbekistan",
            "Vanuatu",
            "Venezuela",
            "Vietnam",
            "Yemen",
            "Zambia",
            "Zimbabwe",
        ];

        // Initialize autocomplete
        $("#s_country").autocomplete({
            source: countries,
            minLength: 1 // Minimum number of characters before triggering autocomplete
        });

        // Initialize autocomplete
        $("#rx_country").autocomplete({
            source: countries,
            minLength: 1 // Minimum number of characters before triggering autocomplete
        });

        var currencies = [
            'AED - United Arab Emirates Dirham',
            'AFN - Afghan Afghani',
            'ALL - Albanian Lek',
            'AMD - Armenian Dram',
            'ANG - Netherlands Antillean Guilder',
            'AOA - Angolan Kwanza',
            'ARS - Argentine Peso',
            'AUD - Australian Dollar',
            'AWG - Aruban Florin',
            'AZN - Azerbaijani Manat',
            'BAM - Bosnia-Herzegovina Convertible Mark',
            'BBD - Barbadian Dollar',
            'BDT - Bangladeshi Taka',
            'BGN - Bulgarian Lev',
            'BHD - Bahraini Dinar',
            'BIF - Burundian Franc',
            'BMD - Bermudian Dollar',
            'BND - Brunei Dollar',
            'BOB - Bolivian Boliviano',
            'BRL - Brazilian Real',
            'BSD - Bahamian Dollar',
            'BTN - Bhutanese Ngultrum',
            'BWP - Botswanan Pula',
            'BYN - Belarusian Ruble',
            'BZD - Belize Dollar',
            'CAD - Canadian Dollar',
            'CDF - Congolese Franc',
            'CHF - Swiss Franc',
            'CLP - Chilean Peso',
            'CNY - Chinese Yuan',
            'COP - Colombian Peso',
            'CRC - Costa Rican Colón',
            'CUP - Cuban Peso',
            'CVE - Cape Verdean Escudo',
            'CZK - Czech Republic Koruna',
            'DJF - Djiboutian Franc',
            'DKK - Danish Krone',
            'DOP - Dominican Peso',
            'DZD - Algerian Dinar',
            'EGP - Egyptian Pound',
            'ERN - Eritrean Nakfa',
            'ETB - Ethiopian Birr',
            'EUR - Euro',
            'FJD - Fijian Dollar',
            'FKP - Falkland Islands Pound',
            'FKP - Falkland Islands Pound',
            'FJD - Fijian Dollar',
            'FKP - Falkland Islands Pound',
            'FJD - Fijian Dollar',
            'FKP - Falkland Islands Pound',
            'FJD - Fijian Dollar',
            'FKP - Falkland Islands Pound',
            'FJD - Fijian Dollar',
            'FKP - Falkland Islands Pound',
            'GEL - Georgian Lari',
            'GGP - Guernsey Pound',
            'GHS - Ghanaian Cedi',
            'GIP - Gibraltar Pound',
            'GMD - Gambian Dalasi',
            'GNF - Guinean Franc',
            'GTQ - Guatemalan Quetzal',
            'GYD - Guyanaese Dollar',
            'HKD - Hong Kong Dollar',
            'HNL - Honduran Lempira',
            'HRK - Croatian Kuna',
            'HTG - Haitian Gourde',
            'HUF - Hungarian Forint',
            'IDR - Indonesian Rupiah',
            'ILS - Israeli New Shekel',
            'IMP - Isle of Man Pound',
            'INR - Indian Rupee',
            'IQD - Iraqi Dinar',
            'IRR - Iranian Rial',
            'ISK - Icelandic Króna',
            'JEP - Jersey Pound',
            'JMD - Jamaican Dollar',
            'JOD - Jordanian Dinar',
            'JPY - Japanese Yen',
            'KES - Kenyan Shilling',
            'KGS - Kyrgystani Som',
            'KHR - Cambodian Riel',
            'KID - Kiribati Dollar',
            'KRW - South Korean Won',
            'KWD - Kuwaiti Dinar',
            'KYD - Cayman Islands Dollar',
            'KZT - Kazakhstani Tenge',
            'LAK - Laotian Kip',
            'LBP - Lebanese Pound',
            'LKR - Sri Lankan Rupee',
            'LRD - Liberian Dollar',
            'LSL - Lesotho Loti',
            'LYD - Libyan Dinar',
            'MAD - Moroccan Dirham',
            'MDL - Moldovan Leu',
            'MGA - Malagasy Ariary',
            'MKD - Macedonian Denar',
            'MMK - Myanma Kyat',
            'MNT - Mongolian Tugrik',
            'MOP - Macanese Pataca',
            'MRU - Mauritanian Ouguiya',
            'MUR - Mauritian Rupee',
            'MVR - Maldivian Rufiyaa',
            'MWK - Malawian Kwacha',
            'MXN - Mexican Peso',
            'MYR - Malaysian Ringgit',
            'MZN - Mozambican Metical',
            'NAD - Namibian Dollar',
            'NGN - Nigerian Naira',
            'NIO - Nicaraguan Córdoba',
            'NOK - Norwegian Krone',
            'NPR - Nepalese Rupee',
            'NZD - New Zealand Dollar',
            'OMR - Omani Rial',
            'PAB - Panamanian Balboa',
            'PEN - Peruvian Nuevo Sol',
            'PGK - Papua New Guinean Kina',
            'PHP - Philippine Peso',
            'PKR - Pakistani Rupee',
            'PLN - Polish Złoty',
            'PYG - Paraguayan Guarani',
            'QAR - Qatari Rial',
            'RON - Romanian Leu',
            'RSD - Serbian Dinar',
            'RUB - Russian Ruble',
            'RWF - Rwandan Franc',
            'SAR - Saudi Riyal',
            'SBD - Solomon Islands Dollar',
            'SCR - Seychellois Rupee',
            'SDG - Sudanese Pound',
            'SEK - Swedish Krona',
            'SGD - Singapore Dollar',
            'SHP - Saint Helena Pound',
            'SLL - Sierra Leonean Leone',
            'SOS - Somali Shilling',
            'SRD - Surinamese Dollar',
            'SSP - South Sudanese Pound',
            'STN - São Tomé and Príncipe Dobra',
            'SVC - Salvadoran Colón',
            'SYP - Syrian Pound',
            'SZL - Swazi Lilangeni',
            'THB - Thai Baht',
            'TJS - Tajikistani Somoni',
            'TMT - Turkmenistani Manat',
            'TND - Tunisian Dinar',
            'TOP - Tongan Pa\'anga',
            'TRY - Turkish Lira',
            'TTD - Trinidad and Tobago Dollar',
            'TWD - New Taiwan Dollar',
            'TZS - Tanzanian Shilling',
            'UAH - Ukrainian Hryvnia',
            'UGX - Ugandan Shilling',
            'USD - United States Dollar',
            'UYU - Uruguayan Peso',
            'UZS - Uzbekistan Som',
            'VES - Venezuelan Bolívar',
            'VND - Vietnamese Đồng',
            'VUV - Vanuatu Vatu',
            'WST - Samoan Tala',
            'XAF - Central African CFA Franc',
            'XCD - East Caribbean Dollar',
            'XOF - West African CFA Franc',
            'XPF - CFP Franc',
            'YER - Yemeni Rial',
            'ZAR - South African Rand',
            'ZMW - Zambian Kwacha',
            'ZWL - Zimbabwean Dollar',
        ];
        // Initialize autocomplete
        $("#s_currency").autocomplete({
            source: currencies,
            minLength: 1 // Minimum number of characters before triggering autocomplete
        });

        // Initialize autocomplete
        $("#rx_currency").autocomplete({
            source: currencies,
            minLength: 1 // Minimum number of characters before triggering autocomplete
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#s_country').select2()
            $('#rx_country').select2()
            //   $('#residential_country').select2();
            countries();
            var s_countryValue = @json($intlFundsTransferRates->s_country);
            var rx_countryValue = @json($intlFundsTransferRates->s_country);
            function countries() {

                $('#s_country').html('<option value="" disabled >Select Country</option>');
                $('#rx_country').html('<option value="" disabled >Select Country</option>');
                var _token = '{{ csrf_token() }}';
                let url = "{{ route('ajax-get-countries') }}";
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
                                if (s_countryValue == value.name) {
                                    $("#s_country").append('<option selected value="' + value.name +
                                    '">' + value.name + '</option>');
                                } else{
                                    $("#s_country").append('<option value="' + value.name +
                                    '">' + value.name + '</option>');
                                }

                            });
                            $('#s_country').trigger('change');

                            $.each(response.countries, function(key, value) {
                                if(rx_countryValue == value.name){
                                $("#rx_country").append('<option selected value="' + value
                                    .name +
                                    '">' + value.name + '</option>');
                                } else {
                                    $("#rx_country").append('<option value="' + value
                                    .name +
                                    '">' + value.name + '</option>');
                                }
                            });
                            $('#rx_country').trigger('change');
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
@endsection
