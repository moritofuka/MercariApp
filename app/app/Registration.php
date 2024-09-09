<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registration extends Model
{

    protected $fillable = ['name', 'amount','memo','image','comments'];

}
