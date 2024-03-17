<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //getに対する処理↓

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

    public function show_editer(){
        return view('edit');
    }



    //postされた時の処理
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

    public function edit(Request $request){
        $password=$request["password"];
        $email=$request["email"];
        $cureent_password=Auth::user()->password;
        $current_email=Auth::user()->email;
        //認証ユーザのemailアドレスを抜いた配列
        $email_collection=User::select('email')
                    ->where('email','<>',$current_email)
                    ->get()
                    ->toArray();
        //連想配列をただの配列に直す
        $email_list=array();
        foreach($email_collection as $emails){
            array_push($email_list,$emails["email"]);
        }
        if(Hash::check($password,$cureent_password)){//まずはパスワードで判定
            if(!in_array($email,$email_list)){//メールアドレスは一意なので配列を使って判定
                User::where('email',$current_email)->update([
                    'name'=>$request["name"],
                    'email'=>$email,
                ]);
                
                return redirect()->route('profile');
            }else{
                $fail="入力したメールアドレスは使われています";
                return view('edit')->with('fail',$fail);
            }
        }else{
            $fail="パスワードが間違っています";
            return view('edit')->with('fail',$fail);
        }

    }


    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
