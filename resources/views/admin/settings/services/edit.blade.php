@extends('admin.app')
@section('page_title', 'Edit Funds Transfer Rate')
@section('content')
    <div class="container-fluid">
     
                <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="fw-bold">Edit Service</h4>
                                </div>
                    <div class="card-body">
                        @include('admin.partials.notification')

                        <form action="{{ route('service.update', $service->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h1 class="fw-bold">Name</h1>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $service->name }}" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="ui-widget">
                                        <div class="ui-widget">
                                            <h1 class="fw-bold">Logo</h1>
                                            <input style="width: 100%" type="file" name="logo"
                                                value="{{ old('logo') }}" class="form-control" id="logo"
                                                autocomplete="off" placeholder="logo" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="ui-widget">
                                        <h1 class="fw-bold">Service Chages</h1>
                                        <input style="width: 100%" type="number" name="service_charges"
                                            value="{{ $service->service_charges }}" class="form-control" id="service_charges"
                                            placeholder="service Charges" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
        </div>
        </div>
    </div>
@endsection
@section('scripts')
 
@endsection
