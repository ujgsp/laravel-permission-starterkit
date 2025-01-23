@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Welcome, {{ Auth::user()->getRoleNames()->implode(', ') }}</h5>
                </div>
            </div>

            <h1 class="h3 mt-3">
                <span class="ml-2">Website Information</span>
            </h1>
            <span class="mb-3">Some statistics and information about your website.</span>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Install Information</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle"
                                           data-feather="settings"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3"><span style="font-size: 15px; position: relative; bottom: 5px;"
                                      class="badge bg-success">1.0.0</span> Laravel Spatie Starterkit</h1>
                            <div class="mb-0">
                                <span class="text-muted">Developed &amp; Maintained by RelitDev</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card flex-fill mt-3">
                <table class="table my-0 table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Web Server</th>
                            <td>{{ $_SERVER['SERVER_SOFTWARE'] }}</td>
                        </tr>
                        <tr>
                            <th>PHP Version</th>
                            <td>{{ phpversion() }}</td>
                        </tr>
                        <tr>
                            <th>Base Website URL</th>
                            <td>{{ config('app.url') }}</td>
                        </tr>
                        <tr>
                            <th>Cookie Domain</th>
                            <td>{{ config('session.domain') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
