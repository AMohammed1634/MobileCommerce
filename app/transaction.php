<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\user;

class transaction extends Model
{
    //
    public function user(){
        return $this->belongsTo(user::class);
    }
    public function mobile(){
        return $this->belongsTo(mobile::class);
    }
    public function mobiles(){
        return $this->belongsTo(mobile::class);
    }
}
