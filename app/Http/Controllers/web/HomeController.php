<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use DB;
use Validator;

class HomeController extends Controller
{
    //
    public function index(){
        if(Auth::check()){
            $date = date('Y-m-d');
            $currentMonth = date('m');
            $total_orders = DB::table('order')->whereRaw('MONTH(order_date) = ?',[$currentMonth])->get();
            $total_snacks = DB::table('snacks_orders')->whereRaw('MONTH(order_date) = ?',[$currentMonth])->get();
            // dd($total_orders);
            // ->where('menu_list.menu_type','Breakfast')->get
            $total_sale=  ($total_orders->count())+($total_snacks->count());
            $total_expance=  DB::table('expense')->whereRaw('MONTH(expense_date) = ?',[$currentMonth])->get();
                // ->join('menu_list')
                // ->join('menu_list','menu_list.menu_id','=', 'vendor_menues.menu_id')
                // ->get();
                // dd($vendor_menu);
            return view('index',['total_orders'=>$total_orders,'total_sale'=>$total_sale,'total_expance'=>$total_expance]);
    

            // return view('index');
        }
    
        return redirect("login")->withSuccess('Opps! You do not have access');
       
    }
    public function addfield(){
        return view('addfield');
    }
    public function ca(){
        return view('ca');
    }
}
