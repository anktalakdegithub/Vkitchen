<?php

namespace App\Http\Controllers\web;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\OrderModel;
use App\Models\ProductOrderModel;
use App\Models\PaymentDetailsModel;
use App\Models\AddOrderModel;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Validator;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('report');
    }
    public function sales(){
        // $payment=  DB::table('payments')->get();
        // $orderlist = DB::table('menu_list')
        // ->join('product_order','product_order.menu_id','=', 'menu_list.menu_id')
        // ->paginate(5);

        // $date = date('y-m-d');
        $menus = DB::table('menu_list')->
            leftjoin('snacks_orders', function($join)
            {
                $join->on('snacks_orders.snacks_id','=', 'menu_list.menu_id');
            })
            ->leftjoin('vendor_menues','vendor_menues.menu_id','=', 'menu_list.menu_id')
            ->leftjoin('vendor','vendor.vendor_id','=', 'vendor_menues.vendor_id')
            ->where('menu_list.menu_type','=','Snack')
            ->where('menu_list.status','=','1')
            // ->whereDate('snacks_orders.order_date', $date)
            ->paginate(10);
        // dd($menus);
        return view('sales',['addorderArr'=>$menus]);
    }
    public function menu_report(){
        $payment=  DB::table('payments')->get();
        $orderlist = DB::table('menu_list')
        ->join('product_order','product_order.menu_id','=', 'menu_list.menu_id')
        ->leftjoin('vendor_menues','vendor_menues.menu_id','=', 'menu_list.menu_id')
        ->leftjoin('vendor','vendor.vendor_id','=', 'vendor_menues.vendor_id')
        // ->join('payments','payments.order_id','=', 'order.order_id')
        // ->select('order.*','customers.customer_name as name','customers.customer_contactnum as phone_no','customers.customer_address as address')
        // ->where('order.status','!=','Completed')
        // ->orderBy('order.order_id', 'DESC')
        // ->get();
        ->paginate(10);
        // dd($orderlist);
        return view('menu_report',['addorderArr'=>$orderlist,'payment'=>$payment]);
        // return view('menu_report');
    }
    public function fetch_ajaxreportlist(Request $request)
    {
        if($request->ajax())
        {  
            $search = $request->get('search');
            $dates = $request->get('dates');
            $from = $request->get('from_date');
            $to = $request->get('to_date');
            //    dd($search);
            //   $search = str_replace(" ", "%", $search);
            $orders = DB::table('menu_list');
            $orders=$orders->join('product_order','product_order.menu_id','=', 'menu_list.menu_id');
            $orders=$orders->leftjoin('vendor_menues','vendor_menues.menu_id','=', 'menu_list.menu_id');
            $orders=$orders->leftjoin('vendor','vendor.vendor_id','=', 'vendor_menues.vendor_id');
          
            // $orders=$orders->join('order','order.order_id','=', 'payments.order_id');
            $orders=$orders->Where('menu_list.menu_name', 'LIKE','%'.$search.'%');
            if($from!='' && $to!=''){
                $fromd = date('Y-m-d',strtotime($from));
                $tod = date('Y-m-d',strtotime($to));
                $orders = $orders->whereBetween(DB::raw('DATE(product_order.created_at)'), [$fromd, $tod]);
            }
            // $orders=$orders->where('payments.payment_method','=',"Cash");
            $orders=$orders->simplePaginate(10);
            // dd($orders);
            return view('menu_report_data', ['ordersArr'=>$orders]);
        }
    }
    public function fetch_salesreportlist(Request $request)
    {
        if($request->ajax())
        {  
            $search = $request->get('search');
            $dates = $request->get('dates');
            $from = $request->get('from_date');
            $to = $request->get('to_date');
            //    dd($search);
            //   $search = str_replace(" ", "%", $search);
            // $orders = DB::table('menu_list');
            // $orders=$orders->join('product_order','product_order.menu_id','=', 'menu_list.menu_id');
            // $orders=$orders->join('order','order.order_id','=', 'payments.order_id');
            $orders = DB::table('menu_list')->
            leftjoin('snacks_orders', function($join)
            {
                $join->on('snacks_orders.snacks_id','=', 'menu_list.menu_id');
            })
            ->leftjoin('vendor_menues','vendor_menues.menu_id','=', 'menu_list.menu_id')
            ->leftjoin('vendor','vendor.vendor_id','=', 'vendor_menues.vendor_id')
            ->where('menu_list.menu_type','=','Snack');
            // ->where('menu_list.status','=','1')
            // ->whereDate('snacks_orders.order_date', $date)
            // ->get();
            $orders=$orders->Where('menu_list.menu_name', 'LIKE','%'.$search.'%');
            if($from!='' && $to!=''){
                $fromd = date('Y-m-d',strtotime($from));
                $tod = date('Y-m-d',strtotime($to));
                $orders = $orders->whereBetween(DB::raw('DATE(snacks_orders.order_date)'), [$fromd, $tod]);
            }
            // $orders=$orders->where('payments.payment_method','=',"Cash");
            $orders=$orders->simplePaginate(10);
            // dd($orders);
            return view('sales_report_data', ['ordersArr'=>$orders]);
        }
    }
}
