@extends('layouts.dashboard')

@section('title', 'Edit Role')

@section('description', 'Edit a Role')

@section('content')
    <div class="mt-3 card">
        <div class="card-body">
            {!! Form::model($role, [
                'route' => ['roles.update', $role],
                'method' => 'PUT',
                'id' => 'form-role',
                'class' => '',
            ]) !!}

            @include('dashboard.role-permission.roles.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
