<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\AddUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
        ログイン画面表示
        @return View
    */
    public function showLogin(){
        return view('login.login_form');
    }

    /**
     * ログイン処理
     * @param App\Http\Requests\LoginFormRequest $request
     */
    public function login(LoginFormRequest $request){
        $credentials = $request->only('name','password');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect('home')->with('login_success','ログイン成功しました');
        }

        return back()->withErrors([
            'login_error'=>'メールかパスワードが間違っています'
        ]);
    }

    /**
     * ログアウト処理
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Http\Response
     */
    public function logout(Request $request){
        //ログアウトする
        Auth::logout();
        //セッション削除
        $request->session()->invalidate();
        //セッションを作り直す
        $request->session()->regenerateToken();

        return redirect()->route('login.show')->with('logout','ログアウト成功');
    }

    /*
     *新規ユーザー登録
     */
    public function addUser(){
        return view('login.add');
    }

    /**
     * DBにユーザー情報を登録
     * @param \App\Http\Requests\AddUserRequest $request
     * @param \Illuminate\Support\Facades\Hash
     * @param \App\Models\User
     */
    public function DBaddUser(AddUserRequest $request){
        $inputData = [
            'name'=>$request->name,
            'email'=>$request->mail,
            'password'=>Hash::make($request->password),
        ];

        $user = new User;
        $user->fill($inputData)->save();

        return redirect()->route('login.show')->with('message','登録できました！');
    }
}
