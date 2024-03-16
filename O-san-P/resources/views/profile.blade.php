@extends('layouts.layout')

@section('content')
<div>
    <div class="p-1 mb-2 bg-success text-white">
        <div class="d-flex justify-content-between">
            <div class="align-self-center">
                <h3>お散歩記録アプリ</h2>
            </div>
            <div class="align-self-center">
                <h2>ユーザー情報</h2>
            </div>
            <div class="align-self-center">
                <form action="{{route('user.logout')}}" method="post">
                    @csrf
                    <button>ログアウト</button>
                </form>
            </div>
        </div>
        <hr class="border border-4">
    </div>
    <div class="">
        <div class="">
            <div>
                <?php
                    use Illuminate\Support\Facades\Auth;
                    $user=Auth::user();
                    $date_format=$user->created_at->format('Y-m-d');
                    $created=substr_replace(substr_replace($date_format,"年",4,1),"月",9,1)."日";
                ?>
                <p class="text-start">氏名: {{$user->name}}</p>
                <p class="text-start">email: {{$user->email}}</p>
                <p class="text-start">登録日: {{$created}}</p>
            </div>
        </div>
        <hr>
        <p>記録出力用</p>
    </div>
</div>
@endsection