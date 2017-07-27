<?php
namespace App\Http\Controllers\home;

use App\GoodModel;
use App\Http\Controllers\Controller;
use App\CategoryModel;
use App\OrderDetailModel;
use App\OrderModel;
use App\UserModel;
use App\Http\Requests\Home\id;
use App\CartModel;
use App\AttributeValueModel;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller{
	
	//订单显示
	public function index(id $gid,$id){
        $user = session("CURR_USER")[0][0];
        $userId = $user['uid'];
		$attrArray = array();
		$uid = $id;
		$id = $gid->input('id');
		$idArray = explode('_', $id);
		$cartModel = new CartModel();
		$category = new CategoryModel();
        $parentcate=CategoryModel::where('parent_id',0)->get();
		$categoryList = $category->getCategory();
		
		$reicvAddress = UserModel::find($uid)->ReicvAddrModel;
// 		dump($reicvAddress);exit;
		$cartList = $cartModel->whereIn('id',$idArray)->get();
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
	
		return view('Home.order',compact('categoryList','reicvAddress','cartList','attrArray','userId','parentcate'));
	}

	//订单提交
	public function store(id $request,$id){
        $gidArray = array();
        $numArray = array();
        $gidString = $request->input('gid');
        $parentcate=CategoryModel::where('parent_id',0)->get();
        //获取gid和num
        $array = explode('_',$gidString);
        foreach($array as $g){
            $h = explode('.',$g);
            array_push($gidArray,$h[0]);
            array_push($numArray,$h[1]);
        }
        $addrId = $request->input('addrId');
        $cartId = $request->input('id');
        $idArrays = explode('_',$cartId);
        $goodModel = new GoodModel();
        $orderModel = new OrderModel();
        $order_num = date('ymd').substr(time(),-5).substr(microtime(),2,5);
        $create_at = date('Y-m-d H:i:s',time());
        $update_at = date('Y-m-d H:i:s',time());
        $status_id = 1;
        $status = '已付款';
        $addr_id = $addrId;
        $lArray = [];
        $orderDate = [
            'order_num' => $order_num,
            'uid' => $id,
            'create_at' => $create_at,
            'update_at' => $update_at,
            'status_id' => $status_id,
            'status' => $status,
            'addr_id' => $addr_id
        ];
        //事务
        DB::beginTransaction();
        try{
            $oid = DB::table('shop_order')->insertGetId($orderDate,'oid');
            $list = $goodModel->whereIn('gid',$gidArray)->select('gid','gname','price','art_path','discount')->get();
            for($i = 0; $i < count($list); $i++){
                $listArray = [
                    'oid' => $oid,
                    'gid' => $list[$i]['gid'],
                    'gname' => $list[$i]['gname'],
                    'price' => $list[$i]['price'],
                    'art_path' => $list[$i]['art_path'],
                    'discount' => $list[$i]['discount'],
                    'num' => $numArray[$i]
                ];
                array_push($lArray,$listArray);
            }
            $orderDetailModel = new OrderDetailModel();
            $orderDetailModel->insert($lArray);
            DB::table('shop_cart')->whereIn('id',$idArrays)->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
        $category = new CategoryModel();
        $categoryList = $category->getCategory();
        return view('Home.orderSuccess')->with('categoryList',$categoryList)->with('parentcate',$parentcate);
    }

    //我的订单页面显示
    public function myOrder(){
        $category = new CategoryModel();
        $parentcate=CategoryModel::where('parent_id',0)->get();

        $categoryList = $category->getCategory();
        $oidArray = array();
        $user = session("CURR_USER")[0][0];
        $userId = $user['uid'];
        $order = DB::table('shop_order')->where('uid',$userId)->select('oid','order_num','status')->get();

        foreach ($order as $o){

            array_push($oidArray,$o->oid);
        }

        $orderList = DB::table('shop_order_detail')->whereIn('oid',$oidArray)->select('oid','gid','gname','price','art_path','discount','num')->get();
        return view('Home.myOrder',compact('order','orderList','categoryList','parentcate'));
    }

	public function image(){
		return view('home.jcrop');
	}
	
	//图片
	public function images(id $request){
		$artPath = $request->input('image');
		$art = 'http://localhost:8080/BestStore/public/images/';
		$path = $art . $artPath;
		return view('home.jcrop',compact('path'));
	}
	//复制图片
	public function cropImages(id $request){
		$x1 = $request->input('x1');
		$y1 = $request->input('y1');
		$cw = $request->input('cw');
		$ch = $request->input('ch');
		$img = $request->input('img');
		$img = \Image::make($img)->crop($cw, $ch, $x1, $y1);
		$img->save('images/LaravelAcademy1.jpg');
		return $img->response('jpg');
		
	}
	//删除订单
    public function del(){
        $oid=$_GET['oid'];
        $isSuss1 = OrderModel::where('oid',$oid)->delete();
        $isSuss2 = OrderDetailModel::where('oid',$oid)->delete();
     return   redirect('home/myOrder');

    }
}