@extends('layouts.dashboard')

@section('title', 'Roles')
@section('description', 'List of all roles.')

@section('actions')
    <a href="{{ route('roles.create') }}" class="btn btn-primary">
        <i class="ti ti-plus me-1"></i> Add Role
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
            <form method="GET" action="{{ route('roles.index') }}">
                <div class="row g-2 align-items-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <input type="text" name="query" class="form-control" value="{{ request('query') }}" placeholder="Search roles">
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
                        <th>Role Name</th>
                        <th class="w-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('roles.add.permission', ['role' => $role->id]) }}" class="btn btn-sm btn-outline-primary">Permissions</a>
                                    <a href="{{ route('roles.edit', ['role' => $role->id]) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure want to delete this: {{ $role->name }} ?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-secondary py-4">No role found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $roles->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
