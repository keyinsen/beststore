<?php

namespace App\Http\Requests\Home;

use App\Http\Requests\Request;

class validLoginLInfo extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
 		 return [
        		'email'=>'required|email',
        		'pwd'=>'required|min:6'
        ];
    	
    }
    public function messages()
    {
    	return [
    			'email.required'=>'请输入邮箱',
    			'email.email'=>'请输入正确的邮箱',
    			'pwd.required'=>'请输入密码',
    			'pwd.min'=>'请输入不少于6位的密码'
    	];
    }
    
}
