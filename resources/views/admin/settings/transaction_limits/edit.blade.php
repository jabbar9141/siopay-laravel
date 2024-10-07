@extends('admin.app')
@section('page_title', 'Create Location')
@section('content')
    <div class="container-fluid">
                {{-- <h5 class="card-title fw-semibold mb-4">Settings</h5> --}}
                {{-- @include('admin.settings.nav')
                <hr> --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-simibold" style="font-size: 18px;">Editing Limit for <b>{{$limit->country_code}}</b></h5><a href="{{ route('transaction_limits.index') }}" class="btn btn-danger float-right"><i class="fa fa-times"></i>Exit</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            @include('admin.partials.notification')
                            <form action="{{ route('transaction_limits.update', $limit->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="country">Country</label>
                                        <input type="text" disabled value="{{$limit->country_code}}" name="country_code" id="country_code" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="daily_limit">Daily Limit(&euro;)</label>
                                        <input type="number" value="{{$limit->daily_limit}}" min="1" step="any" class="form-control" name="daily_limit" id="daily_limit" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="Weekly_limit">Weekly Limit</label>
                                        <input type="number" min="1" step="any" class="form-control" value="{{$limit->weekly_limit}}"
                                            name="Weekly_limit" id="Weekly_limit" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="monthly_limit">Monthly Limit</label>
                                        <input type="number" value="{{$limit->monthly_limit}}" min="1" step="any" class="form-control" name="monthly_limit" id="monthly_limit" required>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                            </form>
                    </div>
                </div>
    </div>
@endsection
@section('scripts')
    <script></script>
@endsection
