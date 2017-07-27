<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\CategoryModel;
use App\Http\Requests\Home\id;
use App\GoodModel;
use App\AttributeModel;

class SingleController extends Controller {
	
	//商品详情
	public function index(id $id){
		$gid = $id->input('gid');
		$goodModel = new GoodModel();
	//	$parentcate=CategoryModel::where('parent_id',0)->get();
		$category = new CategoryModel();
		$goodList = $goodModel->getGoodList($gid)->toArray()[0];
		$attributeValues = GoodModel::find($gid)->attributeValueModel()->get()->toArray();
		$attrIdArray = array();
		foreach ($attributeValues as $a){
			array_push($attrIdArray, $a['attr_id']);
		}
		$attributeModel = new AttributeModel();	
		$attribute = $attributeModel->whereIn('attr_id',$attrIdArray)->get()->toArray();
		$categoryList = $category->getCategory();
		$parentcate=CategoryModel::where('parent_id',0)->get();
    	$user = session('CURR_USER');
    	if(!empty($user)){
    		return view('Home.single',compact('categoryList','goodList','attribute','attributeValues','parentcate'));
    	}
    	return view('Home.single',compact('categoryList','goodList','attribute','attributeValues','parentcate'));
	}
}