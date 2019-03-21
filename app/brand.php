<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\mobile;
class brand extends Model
{
    //
    public function mobile(){
        return $this->hasMany(mobile::class);
    }
}
