@extends('layouts.dashboard')

@section('title', 'Give Permissions')

@section('description', 'Give Permissions To Role')

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

<div class="mt-3 card">
    <div class="card-header">
        <h5 class="card-title mb-0">Role: {{ $role->name }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('roles.update.permission', ['role' => $role->id]) }}"
              method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label"
                       for="name">Permissions</label>

                @error('permissions')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="row mt-3">
                    @foreach ($permissions as $permission)
                        <div class="col-md-6 col-lg-4 mb-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input"
                                       type="checkbox"
                                       role="switch"
                                       id="permission-{{ $permission->id }}"
                                       name="permissions[]"
                                       value="{{ $permission->name }}"
                                       {{ in_array($permission->id, $rolePermissions->toArray()) ? 'checked' : '' }}>
                                <label class="form-check-label"
                                       for="permission-{{ $permission->id }}">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-3">
                <button type="submit"
                        class="btn btn-primary btn-lg">Update</button>
                <a href="{{ route('roles.index') }}"
                   class="btn btn-danger btn-lg">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
