<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchase extends Model
{
    protected $fillable = ['name', 'postcode','address','tel'];


    public function registration() {
        return $this->belongsTo('App\Registration','registration_id','id');
}


}
