@extends('admin.app')
@section('page_title', 'Create Location')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Settings</h5>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Add New Payment Gatway</h5> <a href="{{ route('transaction_limits.index') }}"
                            class="btn btn-danger float-right"><i class="fa fa-times"></i>Exit</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('admin.partials.notification')

                        <form action="{{ route('payments_gatway.post') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="account_mode">Account Mode</label>
                                    <input class="form-control" type="text" name="account_mode" id="account_mode">
                                    @error('account_mode')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="public_key">Public Key</label>
                                    <input class="form-control" type="text" name="public_key" id="public_key">
                                    @error('public_key')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="secret_key">Secret Key</label>
                                    <input class="form-control" type="text" name="secret_key" id="secret_key">
                                    @error('secret_key')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="account_name">Account Name</label>
                                    <input class="form-control" type="text" name="account_name" id="account_name">
                                    @error('account_name')
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
