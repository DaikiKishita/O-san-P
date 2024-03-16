@extends('layouts.layout')

@section('content')
<div>
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
            <h2>ユーザー登録</h2>
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">氏名</label><br>
                    <input type="text" name="name" id="name" required>   
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label><br>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label><br>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="d-flex justify-content-between pt-3">
                    <button type="submit" class="btn btn-success">
                        {{ __('登録') }}
                    </button>
                </div>
                </form>
        </div>
    </div>
    <div class="mx-auto" style="width: 210px;">
        </br><p>↓登録してある場合はこちら↓</p>
        <div class="d-flex justify-content-center">
            <a href="/login">ログインページ</a>
        </div>
    </div>
</div>
@endsection