<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
    
    public function index(){
        return view('subsciption');
    }
    public function add_subsciption(){
        return view('add_subsciption');
    }
}
