@extends('layouts.dashboard')

@section('title', 'Add Role')

@section('description', 'Add a New Role')

@section('content')
    <div class="mt-3 card">
        <div class="card-body">
            {!! Form::open([
                'route' => 'roles.store',
                'method' => 'post',
                'id' => 'form-role',
                'class' => '',
            ]) !!}

            @include('dashboard.role-permission.roles.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
