<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['voucherno', 'totalamount', 'totalbook', 'orderdate', 'deliveryaddress', 'status', 'shipping_id', 'user_id'];

    public function shipping(){
    	return $this->belongsTo('App\Models\Shipping');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }

    public function books(){
    	return $this->belongsToMany('App\Models\Book','book_order', 'book_id', 'order_id')
    				->withPivot('qty');
    }
}
