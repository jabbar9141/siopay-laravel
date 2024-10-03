@extends('admin.app')
@section('page_title', 'Create Location')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Settings</h5>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Create New SMTP Credencials</h5> <a href="{{ route('transaction_limits.index') }}"
                            class="btn btn-danger float-right"><i class="fa fa-times"></i>Exit</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('admin.partials.notification')

                        <form action="{{ route('smtp.post') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_host">Mail Host</label>
                                    <input type="text" name="mail_host" id="mail_host">
                                    @error('mail_host')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_port">Mail Port</label>
                                    <input type="text" name="mail_port" id="mail_port">
                                    @error('mail_port')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="mail_encryption">Mail Encrypion</label>
                                    <input type="text" name="mail_encryption" id="mail_encryption">
                                    @error('mail_encryption')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="mail_username">Mail Username</label>
                                    <input type="text" name="mail_username" id="mail_username">
                                    @error('mail_username')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_password">Mail Password</label>
                                    <input type="text" name="mail_password" id="mail_password">
                                    @error('mail_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="mail_from_addressed">Mail from Addressed</label>
                                    <input type="text" name="mail_from_addressed" id="mail_from_addressed">
                                    @error('mail_from_addressed')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script></script>
@endsection
