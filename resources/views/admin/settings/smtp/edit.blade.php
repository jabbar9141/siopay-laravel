@extends('admin.app')
@section('page_title', 'Create Location')
@section('content')
    <div class="container-fluid">
        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="fw-bold">Editing SMTP</h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @include('admin.partials.notification')
                <form action="{{ route('smtp.update', $smtp->id) }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="form-group col-md-6">
                            <h1 class="fw-bold">Mail Host</h1>
                            <input class="form-control" type="text" name="mail_host" id="mail_host"
                                value="{{ $smtp->mail_host }}">
                            @error('mail_host')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <h1 class="fw-bold">Mail Port</h1>
                            <input class="form-control" type="text" name="mail_port" id="mail_port"
                                value="{{ $smtp->mail_port }}">
                            @error('mail_port')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <h1 class="fw-bold">Mail Encrypion</h1>
                            <input class="form-control" type="text" name="mail_encryption" id="mail_encryption"
                                value="{{ $smtp->mail_encreption }}">
                            @error('mail_encryption')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <h1 class="fw-bold">Mail Username</h1>
                            <input class="form-control" type="text" name="mail_username" id="mail_username"
                                value="{{ $smtp->mail_username }}">
                            @error('mail_username')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <h1 class="fw-bold">Mail Password</h1>
                            <input class="form-control" type="text" name="mail_password" id="mail_password"
                                value="{{ $smtp->mail_password }}">
                            @error('mail_password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <h1 class="fw-bold">Mail from Addressed</h1>
                            <input class="form-control" type="text" name="mail_from_addressed"
                                value="{{ $smtp->mail_from_addressed }}" id="mail_from_addressed">
                            @error('mail_from_addressed')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
        {{-- </div>
        </div> --}}
    </div>
@endsection
@section('scripts')
    <script></script>
@endsection
