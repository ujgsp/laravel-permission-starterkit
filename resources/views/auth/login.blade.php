@extends('layouts.auth')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h3 class="card-title float-none text-center">
                Masuk untuk memulai sesi Anda
            </h3>
        </div>
        <div class="card-body">

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                        name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Ingat Saya
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            <span class="fas fa-sign-in-alt"></span> Masuk
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer ">
            <div class="d-flex justify-content-between">
                <p class="my-0">
                    <a href="#" class="">
                        Saya lupa kata sandi
                    </a>
                </p>
                <a href="#" target="_blank">
                    Versi v2.0.0
                </a>
            </div>
        </div>
    </div>
    <!-- /.card -->
@endsection
