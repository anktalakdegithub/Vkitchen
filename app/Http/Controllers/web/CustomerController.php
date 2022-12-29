<?php

namespace App\Http\Controllers\web;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Validator;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        // return view('customer');
        // if(Auth::check()){

          $customer=  DB::table('customers')->paginate(10);
          return view('customer',['customerArr'=>$customer]);
        // }
    
        // return redirect("login")->withSuccess('Opps! You do not have access');
         
       
    }
    public function add_customer(){
        return view('add_customer');
    }
    public function edit_customer(Request $request){
        $customer_edit= DB::table('customers')
        ->where('customer_id','=',$request->customer_id)
        ->get();
        return view('edit_customer',['customer_editArr'=>$customer_edit]);
    }
    public function destroy_customer(Request $request)
    { //dd($request->all());
        Customers::where('customer_id',$request->cust_id)->delete();
        $data=array();
        $data['code']="200";
        $data['msg']="Customer Data deleted successfully!";

        return json_encode($data);
    }
    public function addcustomerstore(Request $request){
        // dd($request);
        // if(empty($request->customer_name)){

        //     $result['code']="404";
        //     $result['msg']="Please Enter Customer Name.";
        // }
        // else if(empty($request->customer_number)){

        //     $result['code']="404";
        //     $result['msg']="Please Enter Mobile Number";
        // }
        // else{
        $validator = Validator::make($request->all(), [
                // 'cust_order' => 'required|unique:posts|max:255',
                'customer_name' => 'required',
                'customer_number' => 'required',
            ],
            [   
                'customer_name.required'    => 'Please Enter Customer Name.',
                'customer_number.required' => 'Please Enter Mobile Number.',
            ]
        
        );
        if ($validator->passes()) {
            $customer = DB::table('customers')
            ->where('customers.customer_contactnum','=',$request->customer_number)
            ->first();
                $res= array();
                if(empty($customer)){
                    $res['customer_name']=$request->input('customer_name');
                    $res['customer_contactnum']=$request->input('customer_number');
                    $res['customer_emailid']=$request->input('customer_email');
                    $res['customer_address']=$request->input('customer_address');
                    $res['customer_pincode']=$request->input('customer_pin');
                    //  dd($res);
                    Customers::insert($res);
                    $result['code']="200";
                    $result['msg']="Customer created successfully";
                }else{
                    $result['code']="404";
                    $result['msg']="Costomer Already Exist!";
                }
               
        }else{
            $result['code']=404;
            // $result['msg']=$validator->errors()->all();
            $result['msg']=$validator->errors()->all();
            // return response()->json(['error'=>$validator->errors()->all()]);
    
        }
       echo json_encode($result);
    }
    public function updatecustomer(Request $request){
    //    dd($request);
        $validator = Validator::make($request->all(), [
                // 'cust_order' => 'required|unique:posts|max:255',
                'customer_name' => 'required',
                'customer_number' => 'required',
            ],
            [   
                'customer_name.required'    => 'Please Enter Customer Name.',
                'customer_number.required' => 'Please Enter Mobile Number.',
            ]

        );
        if ($validator->passes()) {

            $customer_id = $request->input('customer_id');
            $res= array();
            $res['customer_name']=$request->input('customer_name');
            $res['customer_contactnum']=$request->input('customer_number');
            $res['customer_emailid']=$request->input('customer_email');
            $res['customer_address']=$request->input('customer_address');
            $res['customer_pincode']=$request->input('customer_pin');
        
        
            Customers::where('customer_id', $customer_id)->update($res);   
            $result['code']="200";
            $result['msg']="Customer Updated successfully";
        }else{
            $result['code']=404;
            // $result['msg']=$validator->errors()->all();
            $result['msg']=$validator->errors()->all();
            // return response()->json(['error'=>$validator->errors()->all()]);
    
        }
         echo json_encode($result);
    }
    public function customer_list_ajax(Request $request)
    {
    
     if($request->ajax())
       {  
           $search = $request->get('search');
           $dates = $request->get('dates');
           $from = $request->get('from_date');
           $to = $request->get('to_date');
        //    dd($search);
        //   $search = str_replace(" ", "%", $search);
          $orders = DB::table('customers');
        //   $orders=$orders->join('customers','customers.customer_id','=', 'payments.customer_id');
        //   $orders=$orders->join('order','order.order_id','=', 'payments.order_id');
          $orders=$orders->Where('customers.customer_name', 'LIKE','%'.$search.'%');
        //  if($from!='' && $to!=''){
        //     $fromd = date('Y-m-d',strtotime($from));
        //     $tod = date('Y-m-d',strtotime($to));
        //     $orders = $orders->whereBetween(DB::raw('DATE(customers.created_at)'), [$fromd, $tod]);
        // }
        // $orders=$orders->where('payments.payment_method','=',"Cash");
        $orders=$orders->simplePaginate(10);
        // dd($orders);
        return view('customer_data', ['ordersArr'=>$orders]);
     }
    }
}