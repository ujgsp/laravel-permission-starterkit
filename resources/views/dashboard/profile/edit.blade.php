@extends('layouts.dashboard')

@section('title', 'Edit Profile')

@section('content')
    @if (session()->has('success'))
        <div class="mt-3 alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-3 card">
        <div class="card-body">
            {!! Form::model($user, [
                'route' => ['profile.update', $user],
                'method' => 'PUT',
                'id' => 'form-user',
                'class' => '',
            ]) !!}

            @include('dashboard.profile.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
