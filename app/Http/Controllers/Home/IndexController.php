<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CategoryModel;
use App\GoodModel;



class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	//主页显示
    public function index()
    {
        $parentcate=CategoryModel::where('parent_id',0)->get();
    	$categoryList =CategoryModel::get();
    	$good = new GoodModel();
//     	$goodAtTime = $good->getGoodsTime();
        $goodsList = $good->get();
//         dump($goodsList);exit;
//     	$user = session('CURR_USER');
//     	$goodCount = $good->getGoodCount();
//     	if(!empty($user)){
//     		return view('Home.index',compact('categoryList','goodsList','parentcate'));
//     	}
    	return view('Home.index',compact('categoryList','goodsList','parentcate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
