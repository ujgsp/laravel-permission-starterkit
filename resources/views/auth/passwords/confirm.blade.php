@extends('layouts.app')

@section('title', 'Confirm Password')

@section('content')
    <div class="card card-md shadow-sm border-0">
        <div class="card-body p-4 p-md-5">
            <p class="text-secondary">Please confirm your password before continuing.</p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-footer d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Confirm Password</button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
