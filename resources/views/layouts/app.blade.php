<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield( 'html-title', __('Memo App') )</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body>
    <header id="site-header">
        <nav class="navbar navbar-expand-md bg-body-tertiary shadow-sm px-4">
            <div class="container-fluid">
                <a class="navbar-brand px-2" href="{{ route('home') }}">
                    <i class="bi bi-hexagon-fill d-inline-block align-text-top pe-1" alt="Logo" aria-hidden="true"></i>
                    {{ config('app.name') }}
                </a>

                {{-- スマホ時用ハンバーガメニュー --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto gap-3">
                        <li class="nav-item">
                            <a class="btn btn-outline-dark" href="{{ route('user-auth.register') }}">
                                <i class="bi bi-person"></i>
                                {{ __('Register Account') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-primary" href="{{ route('user-auth.login') }}">
                                <i class="bi bi-box-arrow-in-right"></i>
                               {{ __('Login') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-secondary bg-opacity-10 px-5 mb-0">
                @yield('breadcrumb')
            </ol>
        </nav>
    </header>

    <main class="m-0 p-0 mt-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>

{{-- テンプレート
@extends('layouts.app')
@section('html-title', __('Register Account') .' - '.  __('Memo App')  )

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ __('Home')}}</li>
@endsection

@section('content')
<div>
    <h1>ページタイトル</h1>
</div>
@endsection

@push('scripts')
@endpush
--}}