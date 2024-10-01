<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{

    protected $fillable = ['name', 'amount','memo','image','comments'];

 
   // public function likes()
   // {
   //   return $this->hasMany('App\Like');
   // }

   public function likes()
    {
      return $this->hasMany(Like::class, 'user_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
 

public function like_exist($user_id, $post_id) {
    return Like::where('user_id', $user_id)->where('post_id', $post_id)->exists();
}

}
