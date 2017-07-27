<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class ReicvAddrModel extends Model {
	
	protected $table = 'shop_reicv_addr';
	
	protected $primaryKey = 'id';
	
	public function UserModel(){
		$this->belongsTo('App\UserModel','uid','uid');
	}
}