<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'leftRight',
        'nameCount',
    ];

    public function leftRightChange($index){
        if($index==0){
            return '左';
        }
        if($index==1){
            return '右';
        }
    }
}
