@extends('layouts.dashboard')

@section('title', 'Add User')
@section('description', 'Add a new user')

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open([
                'route' => 'users.store',
                'method' => 'post',
                'id' => 'form-user',
            ]) !!}

            @include('dashboard.role-permission.users.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
