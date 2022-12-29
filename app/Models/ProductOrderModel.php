<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrderModel extends Model
{
    use HasFactory;
    protected $table="product_order";
    protected $fillable = ['products_id','order_id','order_name','order_price','order_quantity','total_amount'];
}
