@extends('admin.app')
@section('page_title', 'Home')
@section('content')
    <div class="container-fluid">
        <div class="bg-gray-200 mt-5 p-3 rounded-xl flex flex-col items-center">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Settings</h5>
                <p class="mb-0">This is the Dispatcher settings page </p>
                @include('dispatcher.settings.nav')
            </div>
        </div>
    </div>
@endsection
