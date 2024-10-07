@extends('admin.app')
@section('page_title', 'Funds Transfer Rates')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Settings</h5>
                {{-- @include('admin.settings.nav') --}}
                <hr>

                {{-- @dd($countries); --}}
                {{-- <div class="card">
                    <div class="card-header">
                        <a href="{{ route('service.create') }}" class="btn btn-primary float-right">New Services</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body rounded-xl bg-gray-200">
                        <h5>All Service</h5>
                        <div class="table-responsive">
                            <table id="service_tbl" class="table table-sm  table-bordered table-striped display">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Service Charges</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
                <div id="deleteModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h4 class="text-center">Are you sure you want to delete the following location?</h4>
                                <br />
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <input type="hidden" class="form-control" id="id_delete">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                                    <span id="" class='glyphicon glyphicon-trash'></span> Delete
                                </button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                    <span class='glyphicon glyphicon-remove'></span> Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

