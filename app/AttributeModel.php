<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeModel extends Model {
	protected $table = 'shop_attr';
	
	protected $primaryKey = 'attr_id';
	
	public function CategoryModel(){
		return $this->belongsTo('App\CategoryModel','cid','cid');
	}
	
	public function AttributeValueModel(){
		return $this->hasMany('App\AttributeValueModel','attr_id','attr_id');
	}
	
	public function getAttribute($cid){
		return $this->where('cid',$cid)->select()->get();
	}
	
	public function getAttrbuteByattrId($attr_id){
		return $this->whereIn('attr_id',$attr_id)->get();
	}
	
}