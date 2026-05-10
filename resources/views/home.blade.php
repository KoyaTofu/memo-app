<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>
        /* #region 画面全体 */
        body {
            font-family: Arial, sans-serif;
            margin: 0px;
            background-color: #000000;
        }
        /* #endregion */

        /* ヘッダー領域 */
        .site-header {
            background-color: #333;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        /* #region ヘッダー(左側)領域 */
        .header-left {
        }
        /* リンク : ホームページ */
        .link-home{
            color: #fff;
            text-decoration: none;
            font-size: 32px;
            font-weight: bold;
            border: none;
        }

        /* #endregion */
        
        /* #region ヘッダー(右側)領域 */
        .header-right {
        }
        /* リンク : ログイン */
        .link-login {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            padding: 8px 16px;
            background-color: #4a90d9;
            border: none;
            border-radius: 4px;
        }
        .link-login:hover {
            background-color: #357abd;
        }
        /* #endregion */

        /* #region メインコンテンツ領域 */
        .main-content {
            padding: 20px;
            color: #fff;
        }
        /* #endregion */
    </style>
</head>

<body>
    <!-- #region ヘッダー領域 -->
    <header class="site-header">
        <div class="header-left">
            <a href="/" class="link-home">メモアプリ</a>
        </div>
        <div class="header-right">
            <a href="/login" class="link-login">ログイン</a>
        </div>
    </header>
    <!-- #endregion -->

    <!-- #region メインコンテンツ領域 -->
    <main class="main-content">
        <h2>ホームページ</h2>
        <p>ようこそメモアプリへ</p>
    </main>
    <!-- #endregion -->
</body>

</html>