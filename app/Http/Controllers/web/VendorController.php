<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use DB;
use Validator;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
        // return view('customer');
        $menu = DB::table('menu_list')->get();
        // ->where('menu_list.menu_type','Breakfast')->get
        $vendor=  DB::table('vendor')->paginate(10);
        $vendor_menu=  DB::table('vendor_menues')
            // ->join('menu_list')
            ->join('menu_list','menu_list.menu_id','=', 'vendor_menues.menu_id')
            ->get();
            // dd($vendor_menu);
        return view('vendor_list',['vendorArr'=>$vendor,'menus'=>$menu,'vendor_menu'=>$vendor_menu]);
    }
    public function addvendor(){
        return view('add_vendor');
    }
    public function addVendorstore(Request $request){
        // dd($request);
        if(empty($request->vendor_name)){

            $result['code']="404";
            $result['msg']="Please Enter Vendor Name.";
        }
        else if(empty($request->vendor_number)){

            $result['code']="404";
            $result['msg']="Please Enter Mobile Number";
        }
        else{
                $res= array();
                     $res['vendor_name']=$request->input('vendor_name');
                     $res['vendor_contactnum']=$request->input('vendor_number');
                     $res['vendor_emailid']=$request->input('vendor_email');
                     $res['vendor_whatsappnum']=$request->input('whatsapp_no');
                    //  $res['customer_pincode']=$request->input('customer_pin');
                    //  dd($res);
                    DB::table('vendor')->insert($res);
                    $result['code']="200";
                    $result['msg']="Vendor created successfully";
         }
       echo json_encode($result);
    }
    public function edit_vendor(Request $request){
        $vendor_edit= DB::table('vendor')
        ->where('vendor_id','=',$request->vendor_id)
        ->get();
        return view('edit_vendor',['vendor_editArr'=>$vendor_edit]);
    }
    public function updatevendor(Request $request){
        //    dd($request);
        if(empty($request->vendor_name)){

            $result['code']="404";
            $result['msg']="Please Enter Vendor Name.";
        }
        else if(empty($request->vendor_number)){

            $result['code']="404";
            $result['msg']="Please Enter Mobile Number";
        }
        else{
            $vendor_id = $request->input('vendor_id');
        
        
            $res= array();
            $res['vendor_name']=$request->input('vendor_name');
            $res['vendor_contactnum']=$request->input('vendor_number');
            $res['vendor_emailid']=$request->input('vendor_email');
            $res['vendor_whatsappnum']=$request->input('vendor_whatsapp');
        
            
            DB::table('vendor')->where('vendor_id', $vendor_id)->update($res);   
            $result['code']="200";
            $result['msg']="vendor Updated successfully";
        
        }
       
            echo json_encode($result);
    }
    public function destroy_vendor(Request $request)
    { //dd($request->all());
        DB::table('vendor')->where('vendor_id',$request->vendor_id)->delete();
        $data=array();
        $data['code']="200";
        $data['msg']="Vendor Data deleted successfully!";

      return json_encode($data);
    }
    public function add_commission(Request $request){
        // dd($request->all());
        // $vendor_edit= DB::table('vendor')
        // ->where('vendor_id','=',$request->vendor_id)
        // ->get();
        // return view('edit_vendor',['vendor_editArr'=>$vendor_edit]);
        // if(empty($request->menu_id)){

        //     $result['code']="404";
        //     $result['msg']="Please Select Menu First.";
        // }
        // else if(empty($request->commission)){

        //     $result['code']="404";
        //     $result['msg']="Please Enter Commission Amount";
        // }
        // else{
        $validator = Validator::make($request->all(), [
                // 'cust_order' => 'required|unique:posts|max:255',
                'commission' => 'required',
                'menu_id' => 'required',
            ],
            [   
                'commission.required'    => 'Please Add Commission Amount.',
                'menu_id.required' => 'Please Select Menu First.',
            ]
        
        );
        if ($validator->passes()) {
            $res= array();
            $res['menu_id']=$request->input('menu_id');
            $res['vendor_commission']=$request->input('commission');
            $res['vendor_id']=$request->input('vendor_id');
            // $res['vendor_whatsappnum']=$request->input('whatsapp_no');
            //  $res['customer_pincode']=$request->input('customer_pin');
            //  dd($res);
            DB::table('vendor_menues')->insert($res);
            $result['code']="200";
            $result['msg']="Commission Added Successfully";
        }else{
            $result['code']=404;
            // $result['msg']=$validator->errors()->all();
            $result['msg']=$validator->errors()->all();
            // return response()->json(['error'=>$validator->errors()->all()]);
    
        }
       
    
         echo json_encode($result);
    }
    public function vendor_list_ajax(Request $request)
    {
    
        if($request->ajax())
        {  
            $search = $request->get('search');
            //    $order_status = $request->get('order_status');
            $dates = $request->get('dates');
            $from = $request->get('from_date');
            $to = $request->get('to_date');
            //    dd($search);
            //   $search = str_replace(" ", "%", $search);
           
            $orders=  DB::table('vendor');
           
            $orders=$orders->Where('vendor_name', 'LIKE','%'.$search.'%');
            if($from!='' && $to!=''){
                $fromd = date('Y-m-d',strtotime($from));
                $tod = date('Y-m-d',strtotime($to));
                $orders = $orders->whereBetween(DB::raw('DATE(vendor.created_at)'), [$fromd, $tod]);
            }
           
            // $orders=$orders->where('payments.payment_method','=',"Cash");
            $orders=$orders->simplePaginate(10);
            // dd($orders);
            // $payment=  DB::table('payments')->get();
            $menu = DB::table('menu_list')->get();
            $vendor_menu=  DB::table('vendor_menues')
            // ->join('menu_list')
            ->join('menu_list','menu_list.menu_id','=', 'vendor_menues.menu_id')
            ->get();
            // ->where('menu_list.menu_type','Breakfast')->get
            // $vendor=  DB::table('vendor')->get();
        
            return view('vendor_data',['vendorArr'=>$orders,'menus'=>$menu,'vendor_menu'=>$vendor_menu]);
            // return view('vendor_data', ['ordersArr'=>$orders,'payment'=>$payment]);
        }
    }
    public function vendor_commission(){
        // return view('customer');
        $menu = DB::table('menu_list')->get();
        // ->where('menu_list.menu_type','Breakfast')->get
        $vendor=  DB::table('vendor')
            // ->leftjoin('vendor_menues','vendor_menues.vendor_id','=', 'vendor.vendor_id')
            // ->leftjoin('product_order','product_order.menu_id','=', 'vendor_menues.menu_id')
            // ->leftjoin('snacks_orders','snacks_orders.snacks_id','=', 'vendor_menues.menu_id')
            ->paginate(10);
        $vendor_menu=  DB::table('vendor_menues')
            ->join('menu_list','menu_list.menu_id','=', 'vendor_menues.menu_id')
            ->get();
        $total_orders =  DB::table('vendor_menues')
            ->join('product_order','product_order.menu_id','=', 'vendor_menues.menu_id')
            ->get();
        $total_snacks =  DB::table('vendor_menues')
            ->join('snacks_orders','snacks_orders.snacks_id','=', 'vendor_menues.menu_id')
            ->get();
        $total_paid =  DB::table('expense')->get();
            // dd($total_snacks);
        return view('vendor_commission',['vendorArr'=>$vendor,'menus'=>$menu,'vendor_menu'=>$vendor_menu,'total_orders'=>$total_orders,'total_snacks'=>$total_snacks,'total_paid'=>$total_paid]);
    }
    public function vendor_commission_ajax(Request $request)
    {
    
     if($request->ajax())
       {  
           $search = $request->get('search');
           $dates = $request->get('dates');
           $from = $request->get('from_date');
           $to = $request->get('to_date');
       
        // $orders=  DB::table('vendor');
        $vendor=  DB::table('vendor');
       
        $vendor=$vendor->Where('vendor_name', 'LIKE','%'.$search.'%')->simplePaginate(10);
       
        
        $vendor_menu=  DB::table('vendor_menues')
            ->join('menu_list','menu_list.menu_id','=', 'vendor_menues.menu_id')
            ->get();
        $total_orders =  DB::table('vendor_menues')
            ->join('product_order','product_order.menu_id','=', 'vendor_menues.menu_id');
            if($from!='' && $to!=''){
                $fromd = date('Y-m-d',strtotime($from));
                $tod = date('Y-m-d',strtotime($to));
                $total_orders = $total_orders->whereBetween(DB::raw('DATE(product_order.created_at)'), [$fromd, $tod]);
            }
            $total_orders = $total_orders->get();
        $total_snacks =  DB::table('vendor_menues')
            ->join('snacks_orders','snacks_orders.snacks_id','=', 'vendor_menues.menu_id');
            if($from!='' && $to!=''){
                $fromd = date('Y-m-d',strtotime($from));
                $tod = date('Y-m-d',strtotime($to));
                $total_snacks = $total_snacks->whereBetween(DB::raw('DATE(snacks_orders.order_date)'), [$fromd, $tod]);
            }
            $total_snacks = $total_snacks->get();
        $total_paid =  DB::table('expense');
            if($from!='' && $to!=''){
                $fromd = date('Y-m-d',strtotime($from));
                $tod = date('Y-m-d',strtotime($to));
                $total_paid = $total_paid->whereBetween(DB::raw('DATE(expense.expense_date)'), [$fromd, $tod]);
            }
            $total_paid = $total_paid->get();
       
        // return view('vendor_data',['vendorArr'=>$orders,'menus'=>$menu,'vendor_menu'=>$vendor_menu]);
        return view('vendor_commission_data',['vendorArr'=>$vendor,'vendor_menu'=>$vendor_menu,'total_orders'=>$total_orders,'total_snacks'=>$total_snacks,'total_paid'=>$total_paid]);

        // return view('vendor_data', ['ordersArr'=>$orders,'payment'=>$payment]);
     }
    }
}
