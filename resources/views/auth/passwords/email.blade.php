@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
    <div class="card card-md shadow-sm border-0">
        <div class="card-body p-4 p-md-5">
            @if (session('status'))
                <div class="alert alert-success" role="alert">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Send Password Reset Link</button>
                </div>
            </form>
        </div>
    </div>
@endsection
