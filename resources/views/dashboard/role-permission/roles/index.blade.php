@extends('layouts.dashboard')

@section('title', 'Roles')
@section('description', 'List of all roles.')
@section('hide_page_header', true)

@section('content')

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

    <div class="card">
        <div class="card-header">
            <div class="row w-100 align-items-center">
                <div class="col">
                    <h2 class="card-title mb-0 fs-3">@yield('title')</h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex flex-wrap btn-list">
                        <form method="GET" action="{{ route('roles.index') }}" class="m-0">
                            <div class="input-group input-group-flat w-auto">
                                <span class="input-group-text">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" name="query" class="form-control" value="{{ request('query') }}" placeholder="Search roles...">
                            </div>
                        </form>
                        @can('create.role')
                            <a href="{{ route('roles.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <i class="ti ti-plus me-1"></i> Add Role
                            </a>
                            <a href="{{ route('roles.create') }}" class="btn btn-primary d-sm-none btn-icon" aria-label="Add Role">
                                <i class="ti ti-plus"></i>
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable table-hover">
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
                            <td class="text-end">
                                <div class="btn-list flex-nowrap justify-content-end">
                                    <a href="{{ route('roles.add.permission', ['role' => $role->id]) }}" class="btn btn-info btn-sm">Permissions</a>
                                    @can('edit.role')
                                        <a href="{{ route('roles.edit', ['role' => $role->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                    @endcan
                                    @can('delete.role')
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="post" class="m-0 d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this: {{ $role->name }} ?')">
                                                Delete
                                            </button>
                                        </form>
                                    @endcan
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
