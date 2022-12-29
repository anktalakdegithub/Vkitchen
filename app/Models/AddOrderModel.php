<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddOrderModel extends Model
{
    use HasFactory;
    protected $table="add_order";
    protected $fillable = ['order_id','order_title','amount','img_order'];
}
