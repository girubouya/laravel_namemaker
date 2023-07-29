<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddNameRequest;
use App\Models\Name;
use Illuminate\Support\Facades\Auth;

class NameController extends Controller
{
    /**
     * 名前を出力する
     * @param Illuminate\Http\Request $request
     * @param App\Models\Name
     */
    public function outputName(Request $request){
        //押されたボタンが左(0)か右(1)か
        $leftRight = $request->leftRight;
        //NameDBからランダムに1つデータを取得
        $name = Name::where('leftRight',$leftRight)->inRandomOrder()->first();
        //セッションに保存する
        if($leftRight==0){
            session()->put('leftName',$name->name);
        }else{
            session()->put('rightName',$name->name);
        }
        //homeにリダイレクト
        return redirect()->route('home');
    }

    /**
     * 名前登録画面 view
     */
    public function addName(){
        return view('name.add');
    }

    /**
     * nameDBに名前を登録
     * @param App\Http\Requests\AddNameRequest $request
     * @param App\Models\Name
     */
    public function DBaddName(AddNameRequest $request){
        
        $inputData = [
            'name'=>$request->name,
            'user_id'=>Auth::id(),
            'leftRight'=>$request->leftRight,
            'nameCount'=>mb_strlen($request->name),
        ];

        $name = new Name;
        $name->fill($inputData)->save();

        return redirect()->route('addName')->with('message','登録しました！');
    }

    /**
     * 名前を隠す
     */
    public function hideName(){
        session()->forget('leftName');
        session()->forget('rightName');

        return redirect()->route('home');
    }
}
