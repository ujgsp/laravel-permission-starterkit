@extends('layouts.dashboard')

@section('title', 'Edit Role')
@section('description', 'Edit role')

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, [
                'route' => ['roles.update', $role],
                'method' => 'PUT',
                'id' => 'form-role',
            ]) !!}

            @include('dashboard.role-permission.roles.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
