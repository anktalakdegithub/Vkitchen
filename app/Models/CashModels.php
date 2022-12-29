<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashModels extends Model
{
    use HasFactory;
    protected $table="menu_list";
    protected $primaryKey = "menu_id";
}
