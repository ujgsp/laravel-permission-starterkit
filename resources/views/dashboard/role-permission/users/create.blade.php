@extends('layouts.dashboard')

@section('title', 'Add User')

@section('description', 'Add a New User')

@section('content')
    <div class="mt-3 card">
        <div class="card-body">

            {!! Form::open([
                'route' => 'users.store',
                'method' => 'post',
                'id' => 'form-user',
                'class' => '',
            ]) !!}

            @include('dashboard.role-permission.users.form')

            {!! Form::close() !!}

        </div>
    </div>
@endsection
