@extends('layouts.dashboard')

@section('title', 'Permissions')
@section('description', 'List of all permissions.')

@section('actions')
    <a href="{{ route('permissions.create') }}" class="btn btn-primary">
        <i class="ti ti-plus me-1"></i> Add Permission
    </a>
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success mb-3" role="alert">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mb-3" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <form method="GET" action="{{ route('permissions.index') }}">
                <div class="row g-2 align-items-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <input type="text" name="query" class="form-control" value="{{ request('query') }}" placeholder="Search permissions">
                    </div>
                    <div class="col-12 col-md-auto">
                        <button class="btn btn-primary w-100" type="submit">
                            <i class="ti ti-search me-1"></i> Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table card-table table-vcenter table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Permission Name</th>
                        <th class="w-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('permissions.edit', ['permission' => $permission->id]) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure want to delete this: {{ $permission->name }} ?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-secondary py-4">No permission found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $permissions->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
