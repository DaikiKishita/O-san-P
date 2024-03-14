<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //viewを返す関数
    public function showRegister()
    {
        return view('register');
    }

   //登録した後にプロフィールへ飛ばす
    public function profile()
    {
        return view('profile');
    }

    //ログインページ
    public function loginTo()
    {
        return view('login');
    }

   //リクエストされたユーザー情報を保存する
    public function register(Request $request)
    {
        $exist_user=User::query()
            ->select('name')
            ->where("email",$request['email'])
            ->get();
        
        if ($exist_user->isEmpty()){
            
            $user = User::query()->create([
                'name'=>$request['name'],
                'email'=>$request['email'],
                'password'=>Hash::make($request['password'])
            ]);

                //ここでユーザーログイン
            Auth::login($user);

            return redirect()->route('profile');
        } else {
            $fail="このメールアドレスは既に登録されています";
            return view('register')->with('fail',$fail);
        }
    }

    public function Userlogin(Request $request)
    {
        $password = $request["password"];
        $user = User::query()
                ->where("email",$request["email"])
                ->first();//get()でコレクションにさせないようにこれを採用

        
        if(!$user==null)
        {
            $current_password=$user->password;
            //ここで入力されたものと保存されているもののハッシュ値を確認
            if(!Hash::check($password,$current_password))
            {
                $fail="パスワードが違います";
                return view('login')->with('fail',$fail);
            }

            //全ての条件をクリアしたらログイン
            Auth::login($user);

            $name=$user->name;
            $email=$request["email"];
            $created=$user->created_at;


            return redirect()->route('profile',["name" => $name , "email" => $email, "created" => $created]);
        }
        else
        {
            $fail="入力したメールアドレスが存在しません";
            return view('login')->with('fail',$fail);
        }

    }


    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
