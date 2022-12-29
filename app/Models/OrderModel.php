<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    protected $table="order";
    protected $fillable = ['order_id','customer_name','customer_address','pincode','order_date','order_quantity','order_price','total_amount'];
}
