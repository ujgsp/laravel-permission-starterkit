@extends('layouts.dashboard')

@section('title', 'Add Role')
@section('description', 'Add a new role')

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open([
                'route' => 'roles.store',
                'method' => 'post',
                'id' => 'form-role',
            ]) !!}

            @include('dashboard.role-permission.roles.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
