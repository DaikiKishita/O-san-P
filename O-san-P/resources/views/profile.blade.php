<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CDN を使用する場合 -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <title>Profile</title>
</head>
<body>
    <div class="">
        <form action="{{route('user.logout')}}" method="post">
            @csrf
            <button>ログアウト</button>
        </form>
    </div>
    <div class="">
        <h2>ユーザー情報</h2>
        <div class="container text-center">
            <div class="row">
                <div class="col">あああ</div>
                <div class="col">いいい</div>
            </div>
        </div>
    </div>

    <form action="{{route('user.logout')}}" method="post">
        @csrf
        <button>ログアウト</button>
    </form>
</body>
</html>