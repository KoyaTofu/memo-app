@extends('layouts.app')

@section('content')
    <div class="container w-50">
        <div class="card ">
            <div class="card-header">
                ユーザ登録
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('user-auth.register') }}"
                    onkeydown="if( event.key === 'Enter') return false">
                    @csrf
                    <div id="name-row" class="row justify-content-center mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">
                            ユーザ名
                        </label>
                        <div class="col-md-6">
                            <input id="name" name="name" type="text" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" required autocomplete="name"
                                autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div id="email-row" class="row justify-content-center mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">
                            メールアドレス
                        </label>
                        <div class="col-md-6">
                            <input id="email" name="email" type="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div id="password-row" class="row justify-content-center mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">
                            新パスワード
                        </label>
                        <div class="col-md-6">
                            <input id="password" name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div id="password-confirm-row" class="row justify-content-center mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">
                            パスワード確認
                        </label>
                        <div class="col-md-6">
                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control"
                                required autocomplete="new-password">
                        </div>
                    </div>
                    <div id="submit-button" class="row justify-content-center mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                登録
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
