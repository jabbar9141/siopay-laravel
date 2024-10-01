@php
    $user = auth()->user();
@endphp
@extends('admin.app')
@section('page_title', 'Home')
@section('content')
    <div class="container-fluid">


            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="card mb-3 h-100">
                        <div class="card-header">
                            <h5 class="fw-semibold">
                                @if ($user->user_type == 'kyc_manager')
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
                                            <input type="file" name="photo" class="form-control" id="photo">
                                            @error('photo')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <div class="text-end mt-3">
                                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
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
                                        <p><b>Phone: {{ $user->phone }}</b></p>
                                        <p><b>Country Code: {{ $user->country_code }}</b></p>
                                        {{-- <p><b>Country Code: {{ $user->country->name }}</b></p> --}}
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-md-6 h-auto">
                    <div class="card mb-3 h-100">
                        <div class="card-header">
                            <h5 class="">Reset Password</h5>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('updatePassword') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }} <i class="text-danger">*</i></label>
                                    <input id="password" type="password"
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
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


    </div>
@endsection
