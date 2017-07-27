<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CartModel;
use App\CategoryModel;
use App\Http\Requests\Home\id;
use App\AttributeValueModel;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	//购物车页面
    public function index()
    {
    	$attrArray = array();
    	$category = new CategoryModel();
		$parentcate=CategoryModel::where('parent_id',0)->get();
    	$categoryList = $category->getCategory();
    	if(!empty(session("CURR_USER"))){
    		$user = session("CURR_USER")[0][0];
    		$cartList = CartModel::where('uid', $user['uid'])->get();
    		$userId = $user['uid'];
    		foreach ($cartList as $c){
    			$skuArray = explode(':', $c->sku);
    			foreach ($skuArray as $s){
    				$attributeValue = AttributeValueModel::where('avid',$s)->get();
    				$data = [
    						'id' => $c->id,
    						'attr' => $attributeValue[0]['value']
    				];
    				array_push($attrArray, $data);
    			}
    		}
    		
    		$i = count($cartList);
    		
    		return view('Home.cart',compact('cartList','i','categoryList','attrArray','userId','parentcate'));
    	}else{
    		
    		return view('Home.login')->with('categoryList',$categoryList)->with('parentcate',$parentcate);
    	}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //添加到购物车
    public function add(id $request)
    {
    	$cartModel = new CartModel();
    	$sku = $request->input('sku');
    	$gid = $request->input('gid');
        $gname = $request->input('gname');
        $price = $request->input('price');
        $art_path = $request->input('art_path');
        $discount = $request->input('discount');
		if(!empty(session("CURR_USER"))) {
			$user = session("CURR_USER")[0][0];
			$userId = $user['uid'];
			$num = 1;
			$data = [
					'sku' => $sku,
					'gid' => $gid,
					'gname' => $gname,
					'price' => $price,
					'art_path' => $art_path,
					'discount' => $discount,
					'uid' => $userId,
					'num' => $num
			];
			if (count(explode(':', $sku)) == 2) {
				$row = CartModel::where('gid', $data['gid'])->where('uid',$userId)->first();
				if ($row) {
					$isInsert = CartModel::where('gid', $data['gid'])->where('uid',$userId)->increment('num');
				} else {
					$isInsert = $cartModel->insert($data);
				}

				if ($isInsert) {
					$resp = [
							'status' => 100,
							'msg' => '加入购物车成功'
					];
				} else {
					$resp = [
							'status' => 1000,
							'msg' => '加入购物车失败'
					];
				}
			} else {
				$resp = [
						'status' => 1001,
						'msg' => '你没选中规格'
				];
			}
		}else{
			$resp = [
					'status' => 1003,
					'msg' => '加入购物车失败，你没有登入，请刷新'
			];
		}
        
        return $resp;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //修改购物车信息
    public function update(Request $request, $id)
    {
        $op = $request->input('op');
        if($op == 1){
        	$isSuss = CartModel::where('id',$id)->increment('num');
        }else if($op == 0){
        	$isSuss = CartModel::where('id',$id)->decrement('num');
        }else{
        	$isSuss = CartModel::where('id',$id)->delete();
        	 
        }
        if($isSuss){
        	$resp['status'] = 1;
        	$resp['msg'] = 'ok';
        }else{
        	$resp['status'] = 0;
        	$resp['msg'] = 'fail';
        }
        return $resp;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //删除购物车信息
    public function del()
    {
        $cartid=$_POST['cartid'];
		$isSuss = CartModel::where('id',$cartid)->delete();
		if($isSuss){
			$resp['status'] = 1;
		}else{
			$resp['status'] = -1;
		}
		return $resp;
    }
}
