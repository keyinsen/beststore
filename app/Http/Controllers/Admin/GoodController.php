<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\GoodModel;
use App\CategoryModel;

class GoodController extends Controller{
	public function index(){
		$category= new CategoryModel();
		$cate = $category->select()->get();
		return view('admin/add')->with('cate',$cate);
	}
	
// 	public function page(id $page){
// 		$countPage = $page->input('countPage') + 4;
// 		$good = new GoodModel();
// 		$goodList = $good->offset($countPage)->limit(5)->get();
// 		return $goodList;
// 	}
	
	public function create(){
		
		
		return view('admin.addGood');
	}
	//添加商品
	public function add (){
		$good=new GoodModel;
// 		$goods=$good->select()->get()->toArray();
// 		var_dump($goods);exit;
// 		$category= new CategoryModel();
		$gname=$_POST['pro_name'];
		$cid=$_POST['pro_cate2'];
		$price=$_POST['pro_price'];
		$discount=$_POST['pro_discount'];
		$num=$_POST['pro_num'];
		$img=$_POST['pro_img'];
		$descript=$_POST['pro_intro'];
// 		var_dump($cname);exit;
		$data = [
				'gname'=>$gname,
				'cid'=>$cid,
				'price'=>$price,
				'discount'=>$discount,
				'store_num'=>$num,
				'art_path'=>$img,
				'Description'=>$descript,
		];
		$row = $good->where('gname', $data['gname'])->first();
		if($row){
			return "商品已经存在";
		}else {
			$isInsert = $good->insert($data);
			return "添加成功";
		}
	}
	
	public function store(){
		//表示新增一个goods资源记录
	}
	
	public function edit(){
		//打开修改key为7的记录的表单页面
	}
	
	public function update(){
		//表示更改key为7的记录
	}
	
	public function destroy(){
		//表示删除key为7的记录
	}
}