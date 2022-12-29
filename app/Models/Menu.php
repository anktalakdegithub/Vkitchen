<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table="menu_list";
    protected $fillable = ['menu_id','menu_name','menu_type','menu_date','menu_price','file_upload'];
}
