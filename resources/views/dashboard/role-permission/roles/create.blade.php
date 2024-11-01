@extends('layouts.dashboard')

@section('title', 'Add Role')

@section('description', 'Add a New Role')

@section('content')
    <div class="mt-3 card">
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label "
                               for="name">Role Name <span class="text-danger">*</span></label>
                        <input class="form-control @error('name') is-invalid @enderror"
                               type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               placeholder="Enter role name">

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
                            class="btn btn-primary btn-lg">Submit</button>
                    <a href="{{ route('roles.index') }}"
                       class="btn btn-danger btn-lg">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
