@extends('admin.app')
@section('page_title', 'Create Location')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Settings</h5>
                @include('admin.settings.nav')
                <hr>
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('locations.index') }}" class="btn btn-danger float-right"><i class="fa fa-times"></i>Exit</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            @include('admin.partials.notification')
                            <h5>Create New Location</h5>
                            <form action="{{ route('locations.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name", id="name">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="postcode">Postcode(zip)</label>
                                        <input type="text" class="form-control" name="postcode", id="postcode">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="lat">Latitude</label>
                                        <input type="text" class="form-control" name="lat", id="lat">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="long">Longitude</label>
                                        <input type="text" class="form-control" name="long", id="long">
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
