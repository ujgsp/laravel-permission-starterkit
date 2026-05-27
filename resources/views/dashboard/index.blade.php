@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('description', 'Welcome back, ' . Auth::user()->name)

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div>
                            <div class="subheader">Welcome back</div>
                            <div class="h1 mb-0">{{ Auth::user()->name }}</div>
                        </div>
                        <div class="text-secondary text-end">
                            <div class="small">{{ Auth::user()->getRoleNames()->implode(', ') ?: 'User' }}</div>
                            <div class="small">{{ config('app.name') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Role</div>
                    </div>
                    <div class="h1 mb-3">{{ Auth::user()->getRoleNames()->implode(', ') ?: 'User' }}</div>
                    <div class="text-secondary">Current access level</div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="subheader">App Version</div>
                    <div class="h1 mb-3">{{ config('app.version') }}</div>
                    <div class="text-secondary">Release tag</div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="subheader">PHP</div>
                    <div class="h1 mb-3">{{ phpversion() }}</div>
                    <div class="text-secondary">Runtime version</div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="subheader">Web Server</div>
                    <div class="h1 mb-3">{{ strtok($_SERVER['SERVER_SOFTWARE'], ' ') }}</div>
                    <div class="text-secondary">Environment</div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">Website Information</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <tbody>
                            <tr>
                                <th>Base Website URL</th>
                                <td>{{ config('app.url') }}</td>
                            </tr>
                            <tr>
                                <th>Cookie Domain</th>
                                <td>{{ config('session.domain') }}</td>
                            </tr>
                            <tr>
                                <th>Logged in as</th>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
