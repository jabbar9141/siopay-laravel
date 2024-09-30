@php
    use Illuminate\Support\Str;
@endphp
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
        <div class="row mb-4">
            <div class="col-md-6 ">
                <div class="card mb-3 h-100">
                    <div class="card-header">
                        <h5 class="fw-semibold">
                            @if ($user->user_type == 'mobile')
                                {{ Str::headline($user->user_type) }} User
                            @else
                                {{ Str::headline($user->user_type) }}
                            @endif Details
                        </h5>
                    </div>
                    <div class="card-body gap-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="h-20 w-20 rounded-lg flex items-center bg-white">
                                    @php
                                        $image = asset('admin_assets/assets/images/profile/user-1.jpg');
                                        if ($user->photo) {
                                            $image = $user->photo;
                                        }

                                    @endphp
                                    <img src="{{ asset($image) }}" alt="" class="rounded-circle"
                                        style="width: 150px !important; height:80px !important;">
                                </div>
                                <div class="mt-3">
                                    <form action="{{ route('uploadProfileImage', $user->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <label for="photo" class="col-form-label">Select Photo</label>
                                        <input type="file" disabled name="photo" class="form-control" id="photo">
                                        @error('photo')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="text-end mt-3">
                                            <button type="submit" class="btn disabled btn-sm btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div>
                                    <!-- Button trigger modal -->

                                    <p><b>Name: {{ $user->surname . ' ' . $user->name }}</b></p>
                                    <p><b>Email: {{ $user->email }}</b></p>
                                    <p><b>Status: {{ $user->status == 1 ? 'Approved' : 'Blocked' }}</b></p>
                                    <p><b>User Type : {{ Str::headline($user->user_type) }}</b></p>

                                </div>
                                @if ($user->user_type == 'mobile')
                                    <div class="mt-3">
                                        <a type="button" class="mt-3 text-primary" data-bs-toggle="modal"
                                            data-bs-target="#registrationDocumentModal">
                                            Check Registration Document
                                        </a>
                                        <br>
                                        <a type="button" class="mt-2 text-primary" data-bs-toggle="modal"
                                            data-bs-target="#fullDocumentModal">
                                            Check Full Document
                                        </a>
                                    </div>
                                @endif

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="registrationDocumentModal" tabindex="-1"
                aria-labelledby="registrationDocumentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="registrationDocumentModalLabel">Mobile User Registration
                                Document
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <iframe class="pdf" src="{{ asset($user->registration_doc) }}" width="100%"
                                height="650"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="fullDocumentModal" tabindex="-1" aria-labelledby="fullDocumentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullDocumentModalLabel">Mobile User Full Document</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <iframe class="pdf" src="{{ asset($user->full_doc) }}" width="100%"
                                height="650"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="card mb-3 h-100">
                    <div class="card-header">
                        <h5 class="fw-semibold">Reset Password</h5>
                    </div>
                    <div class="card-body gap-4">
                        <form action="{{ route('updatePassword', $user->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="password">{{ __('Password') }} <i class="text-danger">*</i></label>
                                <input id="password" type="password" required
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="password-confirm">{{ __('Confirm Password') }}
                                    <i class="text-danger">*</i></label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="text-end mt-3">
                                <button class="btn btn-primary btn-sm">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if ($user->user_type == 'mobile')
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card mb-3 h-100">
                        <div class="card-header">
                            <h5 class="fw-semibold">Assign KYC Manager</h5>
                        </div>
                        <div class="card-body gap-2">
                            <form class="w-100" action="{{ route('assignKycManager', $user->id) }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="kyc_manager_id" class="col-form-label">Select Kyc Manager<i
                                                class="text-danger">*</i></label>
                                        <select class="form-control" id="kyc_manager_id" name="kyc_manager_id" required>
                                            <option value="" class="font-bold" selected>Select KYC Manager</option>
                                            @foreach ($kycManagers as $kycManager)
                                                <option class="font-bold" value="{{ $kycManager->id }}"
                                                    @if ($kycManager->id == $user->kyc_manager_id) selected @endif>
                                                    {{ $kycManager->surname . ' ' . $kycManager->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kyc_manager_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-end mt-3">
                                    <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3 h-100">
                        <div class="card-header">
                            <h5 class="fw-semibold">Assing Account Manager</h5>
                        </div>
                        <div class="card-body gap-2">
                            <form class="" id="paymentRequest"
                                action="{{ route('assignAccountManager', $user->id) }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="account_manager_id" class="col-form-label">Select Account Manager<i
                                                class="text-danger">*</i></label>
                                        <select class="form-control" id="account_manager_id" name="account_manager_id"
                                            required>
                                            <option value="" class="font-bold" selected>Select Account Manager
                                            </option>
                                            @foreach ($accountManagers as $accountManager)
                                                <option class="font-bold" value="{{ $accountManager->id }}"
                                                    @if ($accountManager->id == $user->account_manager_id) selected @endif>
                                                    {{ $accountManager->surname . ' ' . $accountManager->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('account_manager_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="card">
            <div class="card-header  d-flex justify-content-between align-items-center">
                <h4 class="font-bold">Edit @if ($user->user_type == 'mobile')
                        {{ Str::headline($user->user_type) }} User
                    @else
                        {{ Str::headline($user->user_type) }}
                    @endif Information</h4>
                <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#emailInput">Contact with Email
                    is Required</a>
                <div class="d-flex">
                    <a href="{{ route('blockUser', ['user_id' => $user->id]) }}" class="btn btn-sm btn-danger">
                        Reject</a>
                    <a href="{{ route('unblockUser', ['user_id' => $user->id]) }}" class="btn btn-sm btn-primary ms-3">
                        Approve</a>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="emailInput" tabindex="-1" aria-labelledby="emailInputLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="emailInputLabel">Email Fieled
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                                <label for="email">Enter Email</label>
                                <input placeholder="Surname" type="text" name="surname"
                                    class="form-control rounded-lg mb-3" required value="" />
                                <button class="btn btn-sm ms-auto btn-primary" type="submit">Save</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mt-2  rounded-xl">
                    <form action="{{ route('updateUser', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class=" ">
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Surname </h1>
                                    <input placeholder="Surname" type="text" name="surname"
                                        class="form-control rounded-lg" required value="{{ $user->surname }}" />
                                </div>

                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Name</h1>
                                    <input placeholder="Last Name" type="text" name="name"
                                        class="form-control rounded-lg" required value="{{ $user->name }}" />
                                </div>
                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Email Address</h1>
                                    <input placeholder="victor1993@gmail.com" type="email" name="email"
                                        class="form-control rounded-lg" required readonly value="{{ $user->email }}" />
                                </div>

                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Mobile Number</h1>
                                    <input placeholder="08123456789" type="text" name="phone"
                                        class="form-control rounded-lg" required value="{{ $user->phone }}" />
                                </div>

                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Tax Code</h1>
                                    <input placeholder="Tax Code" type="text" name="tax_code"
                                        class="form-control rounded-lg" required value="{{ $user->tax_code }}" />
                                </div>

                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Select Gender</h1>
                                    <select name="gender" id="" class="form-control rounded-lg" required>
                                        <option value="" disabled>Select Gender</option>
                                        <option value="Male" @if ($user->gender == 'Male') selected @endif>Male
                                        </option>
                                        <option value="Female" @if ($user->gender == 'Female') selected @endif>Female
                                        </option>
                                    </select>
                                </div>


                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Select User Type</h1>
                                    <select name="user_type" id="" class="form-control rounded-lg" required>
                                        <option value="" disabled>Select User</option>
                                        <option value="kyc_manager" @if ($user->user_type == 'kyc_manager') selected @endif>KYC
                                            Manager</option>
                                        <option value="account_manager" @if ($user->user_type == 'account_manager') selected @endif>
                                            Account Manager</option>
                                        <option value="mobile" @if ($user->user_type == 'mobile') selected @endif>
                                            Mobile User</option>
                                    </select>
                                </div>

                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Date Of Birth</h1>
                                    <input type="date" name="date_of_birth" class="form-control rounded-lg" required
                                        value="{{ $user->date_of_birth }}" />
                                </div>


                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold">Select Country</h1>
                                    <select name="country_id" id="residential_country" class="form-control rounded-lg"
                                        required>
                                    </select>
                                </div>

                                <div class="p-2 space-y-2">
                                    <h1 class="font-bold mt-2">Select City</h1>
                                    <select name="city_id" id="residential_city" class="form-control rounded-lg"
                                        required>
                                    </select>
                                </div>

                            </div>
                            @if ($user->user_type == 'mobile')
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="registration_doc"
                                        class="col-form-label">{{ __('Registration Document') }} <i
                                            class="text-danger">*</i></label>
                                    <input type="file" class="form-control" name="registration_doc"
                                        accept="application/pdf">
                                    @error('registration_doc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="full_doc" class="col-form-label">{{ __('Full Document') }} <i
                                            class="text-danger">*</i></label>
                                    <input type="file" class="form-control" name="full_doc"
                                        accept="application/pdf">
                                    @error('full_doc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endif
                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">Address</h1>
                                <input type="text" name="address" class="form-control rounded-lg" required
                                    value="{{ $user->address }}" />
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
                $('#residential_city').html('<option value="">Select City</option>');
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
                                @if (!is_null($user->city_id))
                                    $('#residential_city').val({{ $user->city_id }});
                                    $('#residential_city').trigger('change')
                                @endif

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

            $('#residential_country').html('<option value="">Select Country</option>');
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
                        @if (!is_null($user->country))
                            $('#residential_country').val({{ $user->country }});
                            $('#residential_country').trigger('change')
                        @endif
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
