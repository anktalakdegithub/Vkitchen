<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table="customers";
    protected $fillable = ['customer_id','customer_name','customer_contactnum','customer_emailid','customer_address','customer_pincode'];
}
