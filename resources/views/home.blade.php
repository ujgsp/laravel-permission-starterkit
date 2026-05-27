@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="alert alert-success" role="alert">
        {{ __('You are logged in!') }}
    </div>
@endsection
