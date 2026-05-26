@extends('layouts.app')

@section('title', 'Verify Email')

@section('content')
    <div class="card card-md shadow-sm border-0">
        <div class="card-body p-4 p-md-5">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <p class="text-secondary">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
            <p class="mb-0">
                {{ __('If you did not receive the email') }}
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 align-baseline">{{ __('click here to request another') }}</button>.
                </form>
            </p>
        </div>
    </div>
@endsection
