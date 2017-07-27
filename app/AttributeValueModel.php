<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValueModel extends Model{
	protected $table = 'shop_attr_value';
	
	protected $primaryKey = 'avid';
	
	public function attributeModel(){
		return $this->belongsTo('App\AttributeModel','attr_id','attr_id');
	}
	
	public function getAttrValue($array){
		return $this->whereIn('attr_id',$array)->get();
	}
	
	public function getAttrValueAvid($array){
		return $this->whereIn('avid',$array)->get();
		
	}
	
	public function goodModel(){
		return $this->belongsToMany('App\GoodModel','shop_goods_attr','avid','gid');
	}
}