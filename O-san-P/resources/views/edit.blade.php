@extends('layouts.layout')

@section('content')
<div class="ratio ratio-2x2">
    <div class="d-flex justify-content-center">
        @if(!empty($fail))
            <p class="text-danger">{{ $fail }}</p>
        @endif
    </div>
    <div class="d-flex justify-content-center">
        <h1>ユーザー編集</h1>
    </div>
    <div class="mx-auto" style="width: 250px;">
        <div class="p-3 mb-2 bg-success text-white">
            <h2>編集</h2><br>
            <?php   
                use Illuminate\Support\Facades\Auth;
                $user=Auth::user();
            ?>
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">氏名</label>
                    <input type="text" name="name" id="name" placeholder="{{$user->name}}" required>
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" name="email" id="email" placeholder='{{$user->email}}'  required>
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button type="submit">更新</button>
            </form>
        </div>
    </div>
</div>
@endsection