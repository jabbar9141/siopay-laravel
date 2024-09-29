@extends('admin.app')
@section('page_title', 'Edit Location')
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
                            <h5>Edit Location</h5>
                            <form action="{{ route('locations.update', $location->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name", id="name" value="{{$location->name ?? ''}}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="postcode">Postcode(Zip)</label>
                                        <input type="text" class="form-control" name="postcode", id="postcode" value="{{$location->postcode ?? ''}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="lat">Latitude</label>
                                        <input type="text" class="form-control" name="lat", id="lat" value="{{$location->latitude ?? ''}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="long">Longitude</label>
                                        <input type="text" class="form-control" name="long", id="long" value="{{$location->longitude ?? ''}}">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
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
