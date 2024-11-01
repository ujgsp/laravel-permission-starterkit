@extends('layouts.dashboard')

@section('title', 'Edit User')

@section('description', 'Edit User')

@section('content')
    <div class="mt-3 card">
        <div class="card-body">
            <form action="{{ route('users.update', ['user' => $user]) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label "
                               for="name">Name <span class="text-danger">*</span></label>
                        <input class="form-control @error('name') is-invalid @enderror"
                               type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $user->name) }}"
                               placeholder="Enter name">

                        @error('name')
                            <span class="invalid-feedback"
                                  role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label "
                               for="email">Email <span class="text-danger">*</span></label>
                        <input class="form-control @error('email') is-invalid @enderror"
                               type="text"
                               name="email"
                               id="email"
                               value="{{ old('email', $user->email) }}"
                               placeholder="Enter email">

                        @error('email')
                            <span class="invalid-feedback"
                                  role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label "
                               for="password">Password <span class="text-danger">*</span></label>
                        <input class="form-control @error('password') is-invalid @enderror"
                               type="password"
                               name="password"
                               id="password"
                               value=""
                               placeholder="Enter password">

                        @error('password')
                            <span class="invalid-feedback"
                                  role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label "
                               for="password">Roles <span class="text-danger">*</span></label>
                        <select class="form-select @error('roles') is-invalid @enderror" name="roles[]" multiple>
                            <option selected="" disabled value="">Choose..</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role }}" {{ in_array($role, $userRoles) ? 'selected' : '' }} >{{ $role }}</option>
                            @endforeach
                        </select>

                        @error('roles')
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
                    <a href="{{ route('users.index') }}"
                       class="btn btn-danger btn-lg">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
