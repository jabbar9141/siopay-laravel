@extends('admin.app')
@section('page_title', 'Users')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title fw-semibold mb-4">Create New Announcement</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                {{-- @include('admin.partials.notification') --}}
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ route('announcement.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="country">Title</label>
                            <input type="text" name="title" class="form-control">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="country">Select File</label>
                            <input type="file" name="image" class="form-control" accept="">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="monthly_limit">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">All Announcements</h5>
                <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                    <div class="rounded-lg overflow-x-auto">
                        <table id="users_tbl" class="min-w-full ">
                            <thead class="">
                                <tr>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Sr.#</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Description</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Creation Date
                                    </th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm"> Status</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @foreach ($announcements as $announcement)
                                    <tr>
                                        <td class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                            {{ $loop->iteration }}</td>
                                        <td class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                            {{ $announcement->title }}</td>
                                        <td class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                            {{ \Illuminate\Support\Str::limit($announcement->description, 50, '...') }}</td>
                                        <td class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                            {{ \Carbon\Carbon::parse($announcement->created_at)->format('F j, Y, g:i a') }}
                                        </td>
                                        <td class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm"><span
                                                class="badge {{ $announcement->status ? 'bg-primary' : 'bg-danger' }}">{{ $announcement->status ? 'Enabled' : 'Disabled' }}</span>
                                        </td>
                                        <td class="w-auto text-center py-3 px-4 uppercase font-semibold text-sm">
                                            <a href="{{ route('announcement.remove', $announcement->id) }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-3">
                    {{ $announcements->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script></script>
@endsection
