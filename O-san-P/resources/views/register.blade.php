<div class="center">
    @if(!empty($fail))
        {{ $fail }}
    @endif
    <h1>お散歩アプリ</h1>
    <div class="">
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