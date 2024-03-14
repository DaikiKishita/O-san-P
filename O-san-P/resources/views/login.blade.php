<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
</head>
<body>
    <div class="">
    @if(!empty($fail))
        {{ $fail }}
    @endif
        <h1>お散歩アプリ ログイン画面</h1>
        <div class="">
            <form action="" method="post">
                @csrf
                <label for="email">メールアドレス</label>
                <input type="email" name="email" id="email">
                <label for="password">パスワード</label>
                <input type="password" name="password" id="password">
                <button type="submit">ログイン</button>
            </form>
        </div>
        <br>
        <p>↓まだ未登録の方はこちら↓</p>
        <a href="/register">登録ページ</a>
    </div>
</body>
</html>