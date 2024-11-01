@extends('layouts.dashboard')

@section('title', 'Edit Permission')

@section('description', 'Edit a Permission')

@section('content')
    <div class="mt-3 card">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label "
                               for="name">Permission Name <span class="text-danger">*</span></label>
                        <input class="form-control @error('name') is-invalid @enderror"
                               type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $permission->name) }}"
                               placeholder="Enter permission name">

                        @error('name')
                            <span class="invalid-feedback"
                                  role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit"
                            class="btn btn-primary btn-lg">Update</button>
                    <a href="{{ route('permissions.index') }}"
                       class="btn btn-danger btn-lg">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
