@extends('admin.app')
@section('page_title', 'Create Location')
@section('content')
    <div class="container-fluid">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="fw-bold">Editing Limit for <b>{{$limit->country_code}}</b></h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            @include('admin.partials.notification')
                            <form action="{{ route('transaction_limits.update', $limit->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h1 class="fw-bold">Country</h1>
                                        <input type="text" disabled value="{{$limit->country_code}}" name="country_code" id="country_code" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <h1 class="fw-bold">Daily Limit(&euro;)</h1>
                                        <input type="number" value="{{$limit->daily_limit}}" min="1" step="any" class="form-control" name="daily_limit" id="daily_limit" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h1 class="fw-bold">Weekly Limit</h1>
                                        <input type="number" min="1" step="any" class="form-control" value="{{$limit->weekly_limit}}"
                                            name="Weekly_limit" id="Weekly_limit" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h1 class="fw-bold">Monthly Limit</h1>
                                        <input type="number" value="{{$limit->monthly_limit}}" min="1" step="any" class="form-control" name="monthly_limit" id="monthly_limit" required>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                    </div>
                </div>
    </div>
@endsection
@section('scripts')
    <script></script>
@endsection
