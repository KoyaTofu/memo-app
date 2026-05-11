<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メモアプリ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
    <header class="site-header bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="text-white text-decoration-none">
                <h1 class="h3 mb-0">
                    <i class="bi bi-hexagon-fill me-2" aria-hidden="true"></i>
                    メモアプリ
                </h1>
            </a>
            <a href="{{ route('login') }}" class="user-login btn btn-primary">
                <i class="bi bi-box-arrow-in-right me-1" aria-hidden="true"></i>
                ログイン
            </a>
        </div>
    </header>
    <nav class="bg-secondary bg-opacity-10 py-2">
        <div class="container">
            <ol class="breadcrumb mb-0">
                @yield('breadcrumb')
            </ol>
        </div>
    </nav>

    <main class="container my-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
