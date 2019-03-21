<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\brand;
class mobile extends Model
{
    //
    public function brand(){
        return $this->belongsTo(brand::class);
    }
    public function transaction(){
        return $this->hasMany(transaction::class);
    }
}
