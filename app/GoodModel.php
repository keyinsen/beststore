<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodModel extends Model
{
	protected $table = 'shop_goods';
	
	protected $primaryKey = 'gid';
	
	public function getGoodsTime()
	{
		$goodList = $this->orderBy('store_time','desc')->paginate(8);
		return $goodList;
	}
	
	public function getGoodCount()
	{
		$good = $this->orderBy('discount','asc')->paginate(3);
		return $good;
	}
	
	public function attributeValueModel(){
		return $this->belongsToMany('App\AttributeValueModel','shop_goods_attr','gid','avid');
	}
	
	public function getGoodList($gid){
		return $this->where('gid',$gid)->get();
	}
	
	
}