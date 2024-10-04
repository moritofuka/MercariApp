<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{

    protected $fillable = ['name', 'amount','memo','image','comments'];



   public function likes()
    {
      return $this->hasMany(Like::class, 'registration_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
 


}
