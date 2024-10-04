<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
 

 
   

  
public function user() {
  return $this->belongsTo('App\User', 'user_id', 'id');
}

public function like_exist($user_id, $registration_id) {
  return Like::where('user_id', $user_id)->where('registration_id', $registration_id)->exists();
}

public function registration() {
  return $this->belongsTo('App\Registration', 'registration_id', 'id');
}

}