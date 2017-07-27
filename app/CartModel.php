<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
	protected $table = 'shop_cart';

    protected $primaryKey = 'id';
	
	public $timestamps = false;
}