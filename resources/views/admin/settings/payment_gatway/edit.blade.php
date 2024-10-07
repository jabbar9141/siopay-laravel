@extends('admin.app')
@section('page_title', 'Edit Funds Transfer Rate')
@section('content')
    <div class="container-fluid">
                <div class="card">
                    <div class="card-header mb-0 d-flex justify-content-between align-items-center">
                        <h4 class="fw-bold">Edit Payment Gatway</h4>
                </div>
                 
                    <div class="card-body">
                        @include('admin.partials.notification')

                        <form action="{{ route('payments_gatway.update', $payment_gatway->id) }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <h1 class="fw-bold" >Account Mode</h1>
                                    <input class="form-control" type="text" name="account_mode" id="account_mode"
                                        value="{{ $payment_gatway->account_mode }}">
                                    @error('account_mode')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <h1 class="fw-bold" >Public Key</h1>
                                    <input class="form-control" type="text" name="public_key" id="public_key"
                                        value="{{ $payment_gatway->public_key }}">
                                    @error('public_key')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <h1 class="fw-bold" >Secret Key</h1>
                                    <input class="form-control" type="text" name="secret_key" id="secret_key"
                                        value="{{ $payment_gatway->secret_key }}">
                                    @error('secret_key')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <h1 class="fw-bold" >Account Name</h1>
                                    <input class="form-control" type="text" name="account_name" id="account_name"
                                        value="{{ $payment_gatway->account_name }}">
                                    @error('account_name')
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
