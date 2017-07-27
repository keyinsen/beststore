<?php
namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\validLoginLInfo;
use Illuminate\Http\Request;
use App\UserModel;
use App\CategoryModel;
use Illuminate\Support\Facades\DB;



class AuthenticateController extends Controller
{
	
	//登入页面显示
	public function login(){
//	    echo "keyinsen";exit;
		$category = new CategoryModel();
		$categoryList = $category->getCategory();
		$parentcate=CategoryModel::where('parent_id',0)->get();
		$categoryList =CategoryModel::get();
		$user = session("CURR_USER");
		if(!empty($user)){
			return view('Home.index')->with('categoryList',$categoryList)->with('parentcate',$parentcate);
		}
		return view('Home.login')->with('categoryList',$categoryList)->with('parentcate',$parentcate);
	}
	
	//登入验证
	public function auth(validLoginLInfo $request)
	{
//echo 'hah';exit;
//	    var_dump(validLoginLInfo);exit;

		$input = $request->all();
		$user = new UserModel();
		$userInfo = $user->where(['email' => $input['email'],'password' => $input['pwd']])->select()->get()->toArray();
		
		if($userInfo != []){
			$request->session()->push('CURR_USER', $userInfo);

			$data = array();
			$data["last_login"] = date("Y-m-d H:i:s");
			
// 			$user->where('uid',$userInfo[0][0]['uid'])->update($data);
			$resp = [
				'status' => 200,
				'msg' => 'ok',
				'date' => $data["last_login"]
			];
			
		}else{
			$resp = [
				'status' => 1000,
				'msg' => '邮箱或者密码不正确'
			];
		}
		return $resp;
	}
	//退出
	public function logout(Request $request)
	{
		$request->session()->forget('CURR_USER');
		return redirect('home/login');
	}
	//注册页面显示
	public function registerindex(){
		$category = new CategoryModel();
		$parentcate=CategoryModel::where('parent_id',0)->get();
		$categoryList = $category->getCategory();
		return view('home.register')->with('categoryList',$categoryList)->with('parentcate',$parentcate);
	}
//注册功能的实现
	public function registers(){
		$user = new UserModel();
		if(isset($_POST["submit"])&& $_POST["submit"]=="注册"){
			$username=$_POST['username'];
			$usertel=$_POST['usertel'];
			$useremail=$_POST['useremail'];
			$userpassword=$_POST['userpassword'];
			$userpsw=$_POST['userpsw'];
			if($username == "" || $usertel == "" || $useremail == ""|| $userpassword == "")
			{
				echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
			}else {
				if ($userpassword==$userpsw){
					 $u = $user->where(['email' => $username])->select()->get()->toArray();
					 if ($u != []){
					 	echo "<script>alert('用户名已存在'); history.go(-1);</script>";
					 }else {
             DB::insert("insert into shop_user (uname,email,password,tel) values (?,?,?,?)", [$username,$useremail,$userpassword,$usertel]);
					 	
					 }
				}else{
					echo "<script>alert('请确认密码是否正确！'); history.go(-1);</script>";
				}
			}
			
		}
		echo "<script>alert('注册成功'); history.go(-1);</script>";
	}
}