<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\CategoryModel;
use App\Http\Requests\Home\searchInfo;
use App\AttributeValueModel;

use App\Http\Requests\Request;
use App\AttributeModel;
use App\Http\Requests\Home\id;
use App\GoodModel;
use Illuminate\Support\Facades\DB;



class SearchController extends Controller
{
	
	//商品类别页面数据显示
	public function index(id $id)
	{
		$category = new CategoryModel();
		$attr_idArray = array();
		$avidArray = array();
		$attrIdNum = array();
		$cid = $id->input('cid');
		$path = $id->input('path');
		
		$parentcate=CategoryModel::where('parent_id',0)->get();
		
		$cidArray = $category->where('path','like',$path.'%')->select('cid')->get()->toArray();
		$cArray = array();
	    $newgoods=GoodModel::orderBy("gid","DESC")->get();
// 	    dump($newgoods);exit;
		foreach ($cidArray as $c){
			array_push($cArray, $c['cid']);
		}
// 		dump($cArray);exit;
		$avid = $id->input('attr');
		
		$attrArray = explode('.', $avid);
// 		dump($attrArray);exit;
		if($attrArray != ['']){
			foreach ($attrArray as $ay){
				$y = explode('_',$ay);
				array_push($attr_idArray, $y[1]);
				array_push($avidArray, $y[0]);
			}
		}
		
		for ($k = 0; $k < count($attr_idArray); $k++){
			for($a = $k+1; $a < count($attr_idArray); $a++){
				if($attr_idArray[$k] == $attr_idArray[$a]){
					array_push($attrIdNum, $attr_idArray[$k]);
				}
			}
		}
		$ac = count($avidArray);
		//实例化属性值列表
		$attr = new AttributeModel();
		$good = new GoodModel();
// 		dump($attr->getAttribute($cid));exit;
		//json解码成数组
		$attr_id = json_decode($attr->getAttribute($cid));
		$attrId = array();
		foreach ($attr_id as $at){
			array_push($attrId, $at->attr_id);
		}
		//实例化属性值列表
		$attribute = new AttributeValueModel();
		$attrValue = $attribute->getAttrValue($attrId);
		$goodList = array();
		$goodGid = array();
		$gList = array();
		$goodListArray = array();
		$num = 1;
		//sql语句的方法不需要关联
		$i = count($avidArray);
		$x = implode(",", $avidArray);
		$p = implode(",", $attr_idArray);
		$g = DB::select('select count.gid from  (select count(gid) as counts,gid from shop_goods_attr where avid in(?)) as count where counts=?;', [$p,count($i)]);

		
		if($avidArray != null){
			foreach ($avidArray as $avidA){
				$goodLists = $attribute->find($avidA)->goodModel()->get()->toArray();
				foreach ($goodLists as $good){
					$goodListArray[] = $good;
				}
			}
		}else{
			$goodList = $good->whereIn('cid',$cArray)->paginate(6);
		}
		$attrbuteListCid = array();
		$attrIdList = array();
		$isattrIdList = true;
		$attrIdList = $attr->getAttrbuteByattrId($attr_idArray)->toArray();
		foreach ($attrIdList as $atr){
			array_push($attrbuteListCid, $atr['cid']);
		}
		//移除数组中重复的值
		$unique = array_unique($attrbuteListCid);
		if($avid != null){
			foreach ($goodListArray as $g){
// 				array_push($attrbuteList, $attr->getAttribute($g['cid'])->toArray());
				array_push($goodGid, $g['gid']);
			}
// 			foreach ($attrbuteList as $aList){
// 				foreach ($aList as $st){
// 					array_push($attrIdList, $st['attr_id']);
// 				}
// 			}
			if(count($avidArray) == 1 ){
				$gList = $goodGid;
			}else{
				for($i = 0; $i < count($goodGid); $i++){
					$num = 1;
					for($j = $i+1; $j < count($goodGid); $j++){
						if($goodGid[$i] == $goodGid[$j]){
							$num = $num + 1;
						}
					}
					if($num == $ac){
						array_push($gList, $goodGid[$i]);
					}
				}
			}
			$goodList = GoodModel::whereIn('gid',$gList)->paginate(6);
		}
		$ar = array();
		$topT = array();
		foreach ($attr_id as $ad){
			$is = true;
			for($m = 0; $m < count($attr_idArray); $m++){
				if($ad->attr_id == $attr_idArray[$m]){
					$is = false;
					array_push($topT, $ad);
				}
			}
			if($is){
				array_push($ar, $ad);
			}
		}
		$getValuesByAvid = $attribute->getAttrValueAvid($avidArray);
		$categoryList = $category->getCategory();
		$user = session("CURR_USER");
		if(!$path&&!$avid){
 			$goodList = $good->where('cid',$cid)->paginate(6);
		}
		if(!empty($user)){
			return view('Home.search',compact('cid','categoryList','attrValue','goodList','ar','avid','getValuesByAvid','parentcate','newgoods'));
		}
		return view('Home.search',compact('cid','categoryList','attrValue','goodList','ar','avid','getValuesByAvid','parentcate','newgoods'));
	}
	//搜索
// 	public function search_up(searchInfo $request){

// 		$input = $request->all();
// 		$v = $input['searchValues'];
// 		$ctry = new CategoryModel();
// 		$dataCtry = array();
// 		$ctryList = $ctry->getCategory();
// 		if($v == 1){
// 			foreach ($ctryList as $c){
// 				if($c['parent_id'] == 0){
// 					array_push($dataCtry, $c['cname']);
// 				}
// 			}
// 		}else{
// 			$dataCtry = $ctry->where('cname','like',"$v%")->select('cname','cid')->get()->toArray();
// 		}
// 		return $dataCtry;
	
// 	}
}