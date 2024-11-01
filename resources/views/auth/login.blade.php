@extends('layouts.auth')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="m-sm-3">
                <form method="POST"
                      action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control form-control-lg @error('email') is-invalid @enderror"
                               type="email"
                               name="email"
                               placeholder="Enter your email" />

                        @error('email')
                            <span class="invalid-feedback"
                                  role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control form-control-lg @error('password') is-invalid @enderror"
                               type="password"
                               name="password"
                               placeholder="Enter your password" />

                        @error('password')
                            <span class="invalid-feedback"
                                  role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <div class="form-check align-items-center">
                            <input id="customControlInline"
                                   type="checkbox"
                                   class="form-check-input"
                                   value="remember-me"
                                   name="remember-me"
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-small"
                                   for="customControlInline">Remember me</label>
                        </div>
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button type="submit"
                           class="btn btn-lg btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
