<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
// use App\Models\User;

class cosmetic extends Model
{
    use HasFactory;

    protected $table = 'cosmetics';

    //入力できないカラム
    protected $guarded = ['id','created_at','updated_at','role','favorite'];

    protected $date = [
        'created_at',
        'updated_at',
        'expiry_date',
    ];

    //Viewで使う、いいねされているかを判定するメソッド。
    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('cosmetic_id', $this->id)->first() !==null;
    }

    public function likes(){
        return $this->hasMany('App\Models\Like');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
