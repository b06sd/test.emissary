@extends('layouts.auth')
@section('title', 'Authentication System')

@section('content')
<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <img class="centered" src="{{ secure_asset('assets/images/lirs_logo.png') }}"
                    style="width:120px; height:114px;">
                <h3>{{ __('PLEASE LOGIN TO EMISSARY') }}</h3>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="email">{{ __('Email') }}</label>

                            <input type="text" placeholder="example@gmail.com" title="Please enter your email"
                                required="" value="{{ old('email') }}" required autocomplete="email" autofocus
                                name="email" id="email" class="form-control @error('email') is-invalid @enderror">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <span class="help-block small">
                                Your unique username to app
                            </span>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">{{ __('Password') }}</label>
                            <input type="password" title="Please enter your password" placeholder="******" required=""
                                value="" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <span class="help-block small">
                                Your strong password
                            </span>

                        </div>
                        <div class="checkbox">
                            <input type="checkbox" class="i-checks" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                            <p class="help-block small">(if this is a private computer)</p>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">
                            {{ __('Login') }}
                        </button>
                        <a class="btn btn-default btn-block" href="#">{{ __('Register') }}</a>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <strong>EMISSARY</strong> - Courier Monitoring Application <br /> 2019 Copyright LIRS IT Unit
        </div>
    </div>
</div>
@endsection