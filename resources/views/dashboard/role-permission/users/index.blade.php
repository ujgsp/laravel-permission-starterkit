@extends('layouts.dashboard')

@section('title', 'Users')
@section('description', 'List of all users.')

@section('actions')
    @can('create.user')
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            <i class="ti ti-plus me-1"></i> Add User
        </a>
    @endcan
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
            <form method="GET" action="{{ route('users.index') }}">
                <div class="row g-2 align-items-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <input type="text" name="query" class="form-control" value="{{ request('query') }}" placeholder="Search users">
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th class="w-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->getRoleNames() as $rolename)
                                    <span class="badge bg-success-lt text-success me-1">{{ $rolename }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    @can('edit.user')
                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    @endcan

                                    @can('delete.user')
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure want to delete this: {{ $user->name }} ?')">
                                                Delete
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-secondary py-4">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $users->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
