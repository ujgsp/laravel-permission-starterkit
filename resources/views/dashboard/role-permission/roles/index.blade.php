@extends('layouts.dashboard')

@section('title', 'Roles')

@section('description', 'List of all Roles.')

@section('content')
    @if (session()->has('success'))
        <div class="mt-3 alert alert-success"
             role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mt-3 alert alert-danger"
             role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="tld-search-area">
        <div class="input-group tld-search-sec">
            <form class="row g-1"
                  method="GET"
                  action="{{ route('roles.index') }}">
                <div class="col-auto">
                    <input type="text"
                           name="query"
                           class="form-control"
                           value="{{ request('query') }}"
                           placeholder="Search">
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary"
                            type="submit">Search</button>
                </div>
            </form>
        </div>
        <a href="{{ route('roles.create') }}"
           class="mr-2 btn btn-primary">
            <i class="align-middle"
               data-feather="plus"></i>
            Add Role</a>
    </div>

    <div class="card flex-fill mt-3">
        <table class="table table-hover my-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                        <tr>
                            <th scope="row">{{ $role->id }}</th>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ route('roles.add.permission', ['role' => $role->id]) }}"
                                    class="btn btn-sm btn-primary">Role Permission</a>
                                <a href="{{ route('roles.edit', ['role' => $role->id]) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button title="Delete" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure want to delete this: {{ $role->name }} ?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No role found..</td>
                        </tr>
                    @endforelse
            </tbody>
        </table>

    </div>
    <div class="">
        {{ $roles->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
