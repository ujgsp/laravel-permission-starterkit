@extends('layouts.dashboard')

@section('title', 'Users')

@section('description', 'List of all Users.')

@section('content')
    @if (session()->has('success'))
        <div class="mt-3 alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mt-3 alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="tld-search-area">
        <div class="input-group tld-search-sec">
            <form class="row g-1" method="GET" action="{{ route('users.index') }}">
                <div class="col-auto">
                    <input type="text" name="query" class="form-control" value="{{ request('query') }}"
                        placeholder="Search">
                </div>
                {{-- <div class="col-auto">
                    <select name="type" class="form-select">
                        <option value="all">All</option>
                        <option value="tld">TLD</option>
                        <option value="whois">Whois</option>
                        <option value="price">Price</option>
                    </select>
                </div> --}}
                <div class="col-auto">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
        @can('create.user')
            <a href="{{ route('users.create') }}" class="mr-2 btn btn-primary">
                <i class="align-middle" data-feather="plus"></i>
                Add User</a>
        @endcan
    </div>

    <div class="card flex-fill mt-3">
        <table class="table table-hover my-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $rolename)
                                    <span class="badge bg-success">{{ $rolename }}</span>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @can('edit.user')
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                            @endcan

                            @can('delete.user')
                                <form action="{{ route('users.destroy', $user->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button title="Delete" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure want to delete this: {{ $user->name }} ?')">
                                        Delete
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No users found..</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
    <div class="">
        {{ $users->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
