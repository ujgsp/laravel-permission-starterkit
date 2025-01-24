@extends('layouts.dashboard')

@section('title', 'Add Permission')

@section('description', 'Add a New Permission')

@section('content')
    <div class="mt-3 card">
        <div class="card-body">
            {!! Form::open([
                'route' => 'permissions.store',
                'method' => 'post',
                'id' => 'form-permission',
                'class' => '',
            ]) !!}

            @include('dashboard.role-permission.permissions.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
