<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetailsModel extends Model
{
    use HasFactory;
    protected $table="payments";
    protected $fillable = ['order_id','customer_id','amount_paid','payment_method'];
}
