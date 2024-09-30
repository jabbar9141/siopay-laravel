@extends('admin.app')
@section('page_title', 'Home')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <style>
        .card {
            height: 100%;
        }

        /* Style for the card container */
        .trans {
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        /* Hover effect */
        .trans:hover::before {
            opacity: 1;
        }

        .trans:hover.trans {
            transform: scale(1.08);
            /* Adjust the scale value for the zoom effect */
        }
    </style>
    <div class="container-fluid">
        @include('admin.partials.notification')
        <div class="card">
            <div class="card-header">
                <h4 class="font-bold">Create New User</h4>
            </div>
            <div class="card-body">
                <div class="mt-2  rounded-xl">
                    <form action="{{ route('storeUser') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class=" ">
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Surname </h1>
                                    <input placeholder="Surname" type="text" name="surname"
                                        class="form-control rounded-lg" />
                                    @error('surname')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Name</h1>
                                    <input placeholder="Last Name" type="text" name="name"
                                        class="form-control rounded-lg" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Profile Image</h1>
                                    <input placeholder="" type="file" name="photo" class="form-control rounded-lg" />
                                    @error('photo')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Email Address</h1>
                                    <input placeholder="victor1993@gmail.com" type="email" name="email"
                                        class="form-control rounded-lg" />
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Mobile Number</h1>
                                    <input placeholder="08123456789" type="text" name="phone"
                                        class="form-control rounded-lg" />
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Tax Code</h1>
                                    <input placeholder="Tax Code" type="text" name="tax_code"
                                        class="form-control rounded-lg" />
                                    @error('tax_code')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Select Gender</h1>
                                    <select name="gender" id="" class="form-control rounded-lg" required>
                                        <option value="" disabled>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    @error('gender')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Password</h1>
                                    <input type="password" name="password" class="form-control rounded-lg" />
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Select User Type</h1>
                                    <select name="user_type" id="" class="form-control rounded-lg" required>
                                        <option value="" disabled>Select User</option>
                                        <option value="kyc_manager">KYC Manager</option>
                                        <option value="account_manager">Account Manager</option>
                                    </select>
                                    @error('user_type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Date Of Birth</h1>
                                    <input type="date" name="date_of_birth" class="form-control rounded-lg" />
                                    @error('date_of_birth')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Select Country</h1>
                                    <select name="country_id" id="residential_country" class="form-control rounded-lg" required>
                                        @error('country_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </select>
                                </div>

                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold mt-2">Select City</h1>
                                    <select name="city_id" id="residential_city" class="form-control rounded-lg" required>
                                        @error('city_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </select>
                                </div>

                            </div>
                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">Address</h1>
                                <input type="text" name="address" class="form-control rounded-lg" />
                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex justify-end">
                                <div class="p-2 flex justify-end items-center">
                                    <button class="bg-blue-500 text-white p-2 px-4 rounded-lg">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#residential_country').select2();
            $('#residential_city').select2();
            countries();


            var residential_country = $("#residential_country");
            residential_country.wrap('<div class="position-relative"></div>');
            residential_country.on('change', function() {
                $("#residential_city").empty()
                $('#residential_city').html('<option value="" disabled >Select City</option>');
                var _token = '{{ csrf_token() }}';
                let url =
                    "{{ route('ajax-get-country-cities', ['countryId' => ':countryId']) }}"
                    .replace(':countryId', $(this).val());
                if ($(this).val() > 0) {
                    // showBlockUI();
                    $.ajax({
                        url: url,
                        type: 'post',
                        dataType: 'json',
                        data: {
                            'countryId': $(this).val(),
                            '_token': _token
                        },
                        success: function(response) {
                            if (response.success) {
                                $.each(response.cities, function(key, value) {
                                    $("#residential_city").append('<option value="' +
                                        value
                                        .id + '">' + value.name + '</option>');
                                });
                                $('#residential_city').trigger('change');
                                // hideBlockUI();

                            } else {
                                // hideBlockUI();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message,
                                    title: 'Are You Sure',
                                });
                            }
                        },
                        error: function(error) {
                            console.log(error);
                            // hideBlockUI();
                        }
                    });
                } else {
                    // hideBlockUI();
                }
                // hideBlockUI();

            });
        });

        function countries() {

            $('#residential_country').html('<option value="" disabled >Select Country</option>');
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
                            $("#residential_country").append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                        $('#residential_country').trigger('change');

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
    </script>
@endsection
