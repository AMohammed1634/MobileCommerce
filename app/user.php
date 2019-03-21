<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\User as Authenticatable;
 use Illuminate\Auth\Authenticatable;
 use App;

class user extends Model implements \Illuminate\Contracts\Auth\Authenticatable 
{
    //
	use Authenticatable;
	public function bills(){
	    return $this->hasMany(bill::class);
    }
    public function transactions(){
	    return $this->hasMany(transaction::class);
    }

}
