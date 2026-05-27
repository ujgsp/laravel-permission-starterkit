@extends('layouts.dashboard')

@section('title', 'Edit Permission')
@section('description', 'Edit permission')

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($permission, [
                'route' => ['permissions.update', $permission],
                'method' => 'PUT',
                'id' => 'form-permission',
            ]) !!}

            @include('dashboard.role-permission.permissions.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
