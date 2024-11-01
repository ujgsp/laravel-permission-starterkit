@extends('layouts.dashboard')

@section('title', 'Permissions')

@section('description', 'List of all Permissions.')

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
                  action="{{ route('permissions.index') }}">
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
        <a href="{{ route('permissions.create') }}"
           class="mr-2 btn btn-primary">
            <i class="align-middle"
               data-feather="plus"></i>
            Add Permission</a>
    </div>

    <div class="card flex-fill mt-3">
        <table class="table table-hover my-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Permission Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($permissions as $permission)
                        <tr>
                            <th scope="row">{{ $permission->id }}</th>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <a href="{{ route('permissions.edit', ['permission' => $permission->id]) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="post"
                                    class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button title="Delete" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure want to delete this: {{ $permission->name }} ?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No permission found..</td>
                        </tr>
                    @endforelse
            </tbody>
        </table>

    </div>
    <div class="">
        {{ $permissions->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
