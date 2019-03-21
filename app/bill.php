<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class bill extends Model
{
    //
    public function user(){
        return $this->belongsTo(bill::class);
    }
}
