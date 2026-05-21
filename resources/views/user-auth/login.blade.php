@extends('layouts.app')

@section('html-title', __('Login') . ' - ' . __('Memo App'))

@section('content')
    <div class="container col-md-8">
        <div class="card">
            <div class="card-header">
                {{ __('Login') }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('user-auth.login') }}">
                    @csrf

                    <div id="email-row" class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">
                            {{ __('Email Address') }}
                        </label>

                        <div class="col-md-6">
                            <input id="email" name="email" type="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invaild @enderror" required autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div id="password-row" class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">
                            {{ __('Password') }}
                        </label>

                        <div class="col-md-6">
                            <input id="password" name="password" type="password"
                                class="form-control @error('password') is-invaild @enderror" required>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div id="remenber-check" class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : ''  }}
                                    class="form-check-input">

                                <label for="remember" class="form-check-label">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            <a class="btn btn-link" >
                                {{ __('Forgot Your Password') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush