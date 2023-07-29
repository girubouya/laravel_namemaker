<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Name;

class NameController extends Controller
{
    public function addName(Request $request){
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
}
