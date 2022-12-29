<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentModels extends Model
{
    use HasFactory;
    protected $table="payments_tablel";
    protected $fillable = ['payment_id','customer_id','customer_name','order_id','payment_type','remaining_amount','amount_paid','balance_due','payment_date'];
}
