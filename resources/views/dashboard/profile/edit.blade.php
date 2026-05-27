@extends('layouts.dashboard')

@section('title', 'Edit Profile')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success mb-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($user, [
                'route' => ['profile.update', $user],
                'method' => 'PUT',
                'id' => 'form-user',
            ]) !!}

            @include('dashboard.profile.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
