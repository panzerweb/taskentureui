@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-10 mt-5 ">
            <div class="register-container">
                <div class="row align-items-center">
                    <div class="col-md-5 d-none d-md-block text-center text-white">
                        <h1 class="text-start"><span class="text-warning">Sign Up</span> for free</h1>
                        <p class="text-start lead">
                            Sign up and start your productive adventure!
                        </p>
                    </div>

                    <div class="col-md-7">
                        <div class="register-card">
                            <div class="card-header text-center">{{ __('Register') }}</div>

                            <div class="card-body"> 
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row mb-4">
                                        <label for="name" class="col-md-4 col-form-label text-md-end text-white">{{ __('Name') }}</label>

                                        <div class="col-md-7">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label for="email" class="col-md-4 col-form-label text-md-end text-white">{{ __('Email Address') }}</label>

                                        <div class="col-md-7">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label for="password" class="col-md-4 col-form-label text-md-end text-white">{{ __('Password') }}</label>

                                        <div class="col-md-7">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end text-white">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-7">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-7 offset-md-4">
                                            <button type="submit" class="btn btn-primary" style="background: #F78F4B; color:white">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection