<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    //id以外は好きにinsert/updateができるように指定。(ブラックリスト方式)
    protected $guarded = ['id'];

    //自由にinsert/updateができるカラムを指定する。（ホワイトリスト方式）
    // protected $fillable = [
    //     'title',
    //     'content',
    // ];

    use HasFactory;
}
