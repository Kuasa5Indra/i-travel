@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
<div class="section-right col-12 col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <img src="{{ asset('/frontend/icons/logo.svg') }}" alt="logo" class="w-50 mb-4">
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-login btn-block">{{ __('Send Password Reset Link') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection