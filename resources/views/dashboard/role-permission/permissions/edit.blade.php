@extends('layouts.dashboard')

@section('title', 'Edit Permission')

@section('description', 'Edit a Permission')

@section('content')
    <div class="mt-3 card">
        <div class="card-body">
            {!! Form::model($permission, [
                'route' => ['permissions.update', $permission],
                'method' => 'PUT',
                'id' => 'form-permission',
                'class' => '',
            ]) !!}

            @include('dashboard.role-permission.permissions.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
