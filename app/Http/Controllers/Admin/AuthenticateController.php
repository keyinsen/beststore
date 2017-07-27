<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Home\id;

class AuthenticateController extends Controller{
	
	public function login(){
		return view('admin.login');
	}
	
	public function auth(id $request){
		$adminName = $request->input('adminName');
		$adminPwd = $request->input('adminPwd');
		$data = array();
		if($adminName == 'fred@126.com' && $adminPwd == '654321'){
			$data = [
					'adminName' => $adminName,
					'adminPwd' => $adminPwd
			];
			$request->session()->push('CURR_ADMIN', $data);
			return 1;
		}else{
			return 2;
		}
	}
}