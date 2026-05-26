@extends('layouts.dashboard')

@section('title', 'Edit User')
@section('description', 'Edit user')

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($user, [
                'route' => ['users.update', $user],
                'method' => 'PUT',
                'id' => 'form-user',
            ]) !!}

            @include('dashboard.role-permission.users.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
