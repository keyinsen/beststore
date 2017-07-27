<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
	protected $table = "shop_category";
	
	protected $primaryKey = "cid";
	
	public function getCategory()
	{
		return $this->all();
	}
	
	public function attributeModel(){
		return $this->hasMany('App\AttributeModel','cid','cid');
	}
}