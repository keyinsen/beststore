<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/24
 * Time: 0:37
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model  {
    protected $table = 'shop_order';

    public function index(){
        return '支付成功';
    }
}
