@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="section-right col-12 col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <img src="{{ asset('/frontend/icons/logo.svg') }}" alt="logo" class="w-50 mb-4">
            </div>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" id="password-confirm">
                </div>
                <button type="submit" class="btn btn-login btn-block">{{ __('Reset Password') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection