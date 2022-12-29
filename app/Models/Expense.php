<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table="expense";
    protected $fillable = ['menu_id','expense_Name','expense_date','expenses_amount','payment_type'];
}
