@extends('admin.app')
@section('page_title', 'Create International Funds Transfer Rate')
@section('content')
    <div class="container-fluid">
             
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="font-bold">Create New International Funds Transfer Rate</h4> 
                     
                    </div>
               
                    <div class="card-body">
                        @include('admin.partials.notification')

                        <form action="{{ route('intl_funds_rate.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h1 class="font-bold" for="name">Name</h1>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name') }}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="p-2 space-y-2">
                                        <h1 class="font-bold" for="s_country">Select Origin Country</h1>
                                        <select name="s_country" id="s_country" class="form-control rounded-lg" required>
                                            @error('s_country')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="p-2 space-y-2">
                                        <h1 class="font-bold" for="rx_country">Select Destination Country</h1>
                                        <select name="rx_country" id="rx_country" class="form-control rounded-lg" required>
                                            @error('rx_country')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <h1 class="font-bold" for="calc">Commision Calculation</h1>
                                    <select name="calc" id="calc" class="form-control">
                                        <option value="perc">Percentage</option>
                                        <option value="fixed">Fixed Amount</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <h1 class="font-bold" for="commision">Commision Amount Or Percentage</h1>
                                    <input step="any" min="0" max="100" class="form-control" type="number"
                                        name="commision" id="commision" value="{{ old('commision') }}">
                                </div>
                                {{-- <div class="form-group col-md-4">
                                    <h1 class="font-bold" for="ex_rate">Exchange rate(destination/origin)</h1>
                                    <input step="any" min="0" class="form-control" type="number"
                                        name="ex_rate" id="ex_rate" value="{{ old('ex_rate') }}" required>
                                </div> --}}
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <h1 class="font-bold" for="min_amt">Minimum Amount supported</h1>
                                    <input type="number" name="min_amt" id="min_amt" min="0" step="any"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <h1 class="font-bold" for="max_amt">Maximum Amount supported</h1>
                                    <input type="number" name="max_amt" id="max_amt" min="0" step="any"
                                        class="form-control">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
    </div>
@endsection
@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   
    <script>
        $(document).ready(function() {
            $('#s_country').select2()
            $('#rx_country').select2()
       
            countries();
            function countries() {

                $('#s_country').html('<option value="" disabled >Select Country</option>');
                $('#rx_country').html('<option value="" disabled >Select Country</option>');
                var _token = '{{ csrf_token() }}';
                let url = "{{ route('ajax-get-countries') }}";
                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    data: {
                        '_token': _token
                    },
                    success: function(response) {
                        if (response.success) {
                            $.each(response.countries, function(key, value) {
                                $("#s_country").append('<option value="' + value.name +
                                    '">' + value.name + '</option>');
                            });
                            $('#s_country').trigger('change');

                            $.each(response.countries, function(key, value) {
                                $("#rx_country").append('<option value="' + value
                                    .name +
                                    '">' + value.name + '</option>');
                            });
                            $('#rx_country').trigger('change');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        })
    </script>

@endsection
