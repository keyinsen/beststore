<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = "shop_user";
    
    protected $primaryKey = "uid";
    
    public function ReicvAddrModel(){
    	return $this->hasMany('App\ReicvAddrModel','uid','uid');
    }
}
