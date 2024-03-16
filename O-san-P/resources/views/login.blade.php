@extends('layouts.layout')

@section('content')
<div class="ratio ratio-2x2">
    <div class="d-flex justify-content-center">
        @if(!empty($fail))
            <p class="text-danger">{{ $fail }}</p>
        @endif
    </div>
    <div class="d-flex justify-content-center">
        <h1>お散歩記録アプリ</h1>
    </div>
    <div class="mx-auto" style="width: 250px;">
        <div class="p-3 mb-2 bg-success text-white">
            <h2>ログイン</h2><br>
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button type="submit">ログイン</button>
            </form>
        </div>
    </div>
    <div class="mx-auto" style="width: 200px;">
        <br><p>↓まだ未登録の方はこちら↓</p>
        <div class="d-flex justify-content-center">
            <a href="/register">登録ページ</a>
        </div>
    </div>
</div>

@endsection