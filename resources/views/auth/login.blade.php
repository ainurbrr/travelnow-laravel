@extends('layouts.app')

@section('content')
<div class="container">
    <div class="login-container justify-content-center">
        <div class="row page-login d-flex align-items-center">
            <div class="section-left col-12 col-md-6">
                <h2 class="mb-4">We Explore the new <br>
                    life much better</h2>
                <img src="frontend/images/login-left.jpg" alt="" class="w-75 d-none d-sm-flex" style="max-height: 480px">
            </div>
            <div class="section-right col-12 col-md-4">
                <div class="card card-body">
                    <div class="text-center">
                        <img src="frontend/images/logo.png" alt="" class="w-50 mb-4">
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                                required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-login btn-block">{{ __('Login') }}</button>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        <br>
                        @if (Route::has('register'))
                        <p class="d-inline">Dont Have Account? </p>
                            <a class="btn btn-link" href="{{ route('register') }}">
                                {{ __('Register Now') }}
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
