@extends('layouts.dashboard')

@section('title', 'Edit User')

@section('description', 'Edit User')

@section('content')
    <div class="mt-3 card">
        <div class="card-body">
            {!! Form::model($user, [
                'route' => ['users.update', $user],
                'method' => 'PUT',
                'id' => 'form-user',
                'class' => '',
            ]) !!}

            @include('dashboard.role-permission.users.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
