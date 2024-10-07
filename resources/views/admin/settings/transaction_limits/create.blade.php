@extends('admin.app')
@section('page_title', 'Create Location')
@section('content')
    <div class="container-fluid">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="fw-bold">Create New Limit</h4> 
                    </div>
                    <div class="card-body">
                        @include('admin.partials.notification')

                        <form action="{{ route('transaction_limits.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h1 class="fw-bold">Funds Transfer Type</h1>
                                    <select name="country_code" id="country_code" class="form-control" required>
                                        <option value="">Select Funds Transfer</option>
                                        <option value="european_union">European Union</option>
                                        <option value="international">International</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <h1 class="fw-bold">Daily Limit(&euro;)</h1>
                                    <input type="number" min="1" step="any" class="form-control"
                                        name="daily_limit" id="daily_limit" required>
                                </div>
                                @error('daily_limit')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-group col-md-4">
                                    <h1 class="fw-bold">Weekly Limit</h1>
                                    <input type="number" min="1" step="any" class="form-control"
                                        name="Weekly_limit" id="Weekly_limit" required>
                                </div>
                                @error('Weekly_limit')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                                <div class="form-group col-md-4">
                                    <h1 class="fw-bold">Monthly Limit</h1>
                                    <input type="number" min="1" step="any" class="form-control"
                                        name="monthly_limit" id="monthly_limit" required>
                                </div>
                                @error('monthly_limit')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
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
