@extends('admin.app')
@section('page_title', 'Create Location')
@section('content')
    <div class="container-fluid">
        {{-- <div class="card">
            <div class="card-body"> --}}
                {{-- <h5 class="card-title fw-semibold mb-4">Settings</h5> --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-simibold" style="font-size: 18px;">Create New Limit</h5> 
                        {{-- <a href="{{ route('transaction_limits.index') }}"
                            class="btn btn-danger float-right"><i class="fa fa-times"></i>Exit</a> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('admin.partials.notification')

                        <form action="{{ route('transaction_limits.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="country">Funds Transfer Type</label>
                                    <select name="country_code" id="country_code" class="form-control" required>
                                        <option value="">Select Funds Transfer</option>
                                        <option value="AF">European Union</option>
                                        <option value="AF">International</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="daily_limit">Daily Limit(&euro;)</label>
                                    <input type="number" min="1" step="any" class="form-control"
                                        name="daily_limit" id="daily_limit" required>
                                </div>
                                @error('daily_limit')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-group col-md-4">
                                    <label for="Weekly_limit">Weekly Limit</label>
                                    <input type="number" min="1" step="any" class="form-control"
                                        name="Weekly_limit" id="Weekly_limit" required>
                                </div>
                                @error('Weekly_limit')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                                <div class="form-group col-md-4">
                                    <label for="monthly_limit">Monthly Limit</label>
                                    <input type="number" min="1" step="any" class="form-control"
                                        name="monthly_limit" id="monthly_limit" required>
                                </div>
                                @error('monthly_limit')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
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
