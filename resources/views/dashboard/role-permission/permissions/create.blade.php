@extends('layouts.dashboard')

@section('title', 'Add Permission')
@section('description', 'Add a new permission')

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open([
                'route' => 'permissions.store',
                'method' => 'post',
                'id' => 'form-permission',
            ]) !!}

            @include('dashboard.role-permission.permissions.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
