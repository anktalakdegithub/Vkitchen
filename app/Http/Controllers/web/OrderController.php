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

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        // return view('order');
        $menu1 = DB::table('menu_list')
        ->where('menu_list.menu_type','=','Breakfast')
        ->where('menu_list.status','=','1')
        // ->whereDate('menu_date', date('Y-m-d'))->get()->toArray();
        ->get()->toArray();
        $menu2 = DB::table('menu_list')
        ->where('menu_list.menu_type','=','Regular')
        ->where('menu_list.status','=','1')
        // ->whereDate('menu_date', date('Y-m-d'))->get()->toArray();
        ->get()->toArray();
        $menu3 = DB::table('menu_list')
        ->where('menu_list.menu_type','=','Dinner')
        ->where('menu_list.status','=','1')
        // ->whereDate('menu_date', date('Y-m-d'))->get()->toArray();
        ->get()->toArray();
        $menu4 = DB::table('menu_list')
        ->where('menu_list.menu_type','=','Lunch')
        ->where('menu_list.status','=','1')
        // ->whereDate('menu_date', date('Y-m-d'))->get()->toArray();
        ->get()->toArray();
        $snacks = DB::table('menu_list')
        ->where('menu_list.menu_type','=','Snack')
        ->where('menu_list.status','=','1')
        // ->whereDate('menu_date', date('Y-m-d'))->get()->toArray();
        ->get()->toArray();
        $customer = DB::table('customers')->get();
        // $orderlistactive = DB::table('order')->orderBy('order.order_id', 'ASC')->get();
        $orderlistactive = DB::table('order')
        ->join('customers','customers.customer_id','=', 'order.customer_id')
        // ->where('order.status','!=','Completed')
        ->orderBy('order_id', 'DESC')
        ->get();


        $date = date('y-m-d');
        $menus = DB::table('menu_list')->
        leftjoin('snacks_orders', function($join) use ($date)
        {
            $join->on('snacks_orders.snacks_id','=', 'menu_list.menu_id')->where('snacks_orders.order_date', $date);
        })
       // ->join('snacks_orders','snacks_orders.snacks_id','=', 'menu_list.menu_id', 'left')
        ->where('menu_list.menu_type','=','Snack')
        ->where('menu_list.status','=','1')
       // ->whereDate('snacks_orders.order_date', $date)
        ->get();
        // dd($orderlistactive);
        return view('order',['menuArr'=>$menu1,'menuArray'=>$menu2,'menuArrays'=>$menu3,'menuArrayss'=>$menu4,'customerArr'=>$customer,'orderlistArr'=>$orderlistactive,'snacksord'=>$menus,'snacks'=>$snacks]);
    }
    public function list_order(Request $request){
        $order_list = DB::table('menu_list')
        ->where('menu_list.menu_id','=',$request->menu_id)
        ->get()->toArray();
        $output='';
        $faqs_row = 0;
        foreach ($order_list as $order){
            
        
            // $output.='<tr class="orderproduct" id="faqs-row'.$faqs_row.'"><td class="left px-0"><div class="row mx-1 px-0"><div class="col-md-12"><input class="form-control menuname tabledemo mx-0" readonly="readonly" value="'.$order->menu_name.'" /></div></div></td><td class="left cost px-0 " ><input class="form-control price tabledemo mx-1" readonly="readonly" value="'.$order->menu_price.'" /></td>  <td class="px-0"><input type="number" class="form-control quantity tabledemo mx-1" id="quantity_'.$order->menu_id.'" data_price="'.$order->menu_price.'" data_id="'.$order->menu_id.'" value="1" name="quantity" /></td><td class="px-0"><input class="form-control totalamount tabledemo" data_total="'.$order->menu_id.'" id="total-price_'.$order->menu_id.'" readonly="readonly" value="" /></td><td class="right px-0" ><i class="bi bi-trash text-primary p-2 order_delete btnDelete" value="'.$order->menu_id.'"></i> </td></tr>';
            $output.='<tr class="orderproduct" id="faqs-row'.$faqs_row.'"><td class="left px-0"><div class="row mx-1 px-0"><div class="col-md-12 px-0"><input class="form-control menuname tabledemo1 mx-0" readonly="readonly" value="'.$order->menu_name.'" /></div></div></td><input type="hidden" class="form-control price tabledemo mx-1" readonly="readonly" value="'.$order->menu_price.'" /><input type="hidden" class="form-control menu_id tabledemo mx-1"  value="'.$order->menu_id.'" />   <td class="px-0"> 
            <div class="number d-flex">
                <span class="minus" id="minus" data_price="'.$order->menu_price.'" data_id="'.$order->menu_id.'">-</span>
                    <input type="text" id="input" class="form-control quantity tabledemo rounded-0" data_price="'.$order->menu_price.'" data_id="'.$order->menu_id.'" value="1" readonly="readonly" name="quantity"/>
                <span class="plus" id="plus" data_price="'.$order->menu_price.'" data_id="'.$order->menu_id.'">+</span>
            </div>
        </td><td class="px-0"><input class="form-control totalamount tabledemo" data_total="'.$order->menu_id.'" id="total-price_'.$order->menu_id.'" readonly="readonly" value="'.$order->menu_price.'" /></td><td class="text-center px-0" ><i class="bi bi-trash text-primary p-2 order_delete btnDelete" value="'.$order->menu_id.'"></i> </td></tr>';
            $faqs_row++;
        }       
        // return json_encode($order_list);
        $result=array();
        $result['output']=$output;
        return json_encode($result);
    }
    public function insertordersubmit(Request $request){
        /// dd($request);
        $validator = Validator::make($request->all(), [
                // 'cust_order' => 'required|unique:posts|max:255',
                'customer_id' => 'required',
                'menu_id' => 'required',
            ],
            [   
                'customer_id.required'    => 'Please Add Customer Name.',
                'menu_id.required' => 'Please Select Menu First.',
            ]
        
        );
        // $cust_order=$request->cust_order;
        $menuname=$request->menuname;
        $menu_id=$request->menu_id;
        // $orderid=$request->orderid;
        $cost=$request->cost;
        $price=$request->price;
        $quantity=$request->quantity;
        $totalamount=$request->totalamount;
        $optionpickup=$request->optionpickup;
        $optiondelivery=$request->optiondelivery;
        $mobile_number=$request->mobile_number;
        $customer_name=$request->customer_name;
        $customer_id=$request->customer_id;
        $delivry_address=$request->delivry_address;
        $pincode=$request->pincode;
        $datetime=$request->datetime;
        $subtotal=$request->subtotal;
        $variant_pay=$request->variant_pay;
        $pick_type=$request->pick_type;
        $tax=$request->tax;
        $discount=$request->discount;
        $grandtotal=$request->grandtotal;
        $status_order=$request->status_order;
        $remain_amount=$request->remaing_amount;
        $paid_amount=$request->paid_amount;
        $i=0;
    //     $customer = DB::table('customers')
    //         ->where('customers.customer_contactnum','=',$mobile_number)
    //         ->get();
    // //    dd( $customer);
    //     if(!empty($customer)){
    //         $res= array();
    //         $res['customer_name']=$customer_name;
    //         $res['customer_contactnum']=$mobile_number;
    //         $res['customer_address']=$delivry_address;
            
            
    //         // Customers::insert($res);
    //         $customer_id=DB::table('customers')->insertGetId($res);
    //     }
       

    if ($validator->passes()) {
        $values = array('customer_id'=> $customer_id,'customer_name'=> $mobile_number,'customer_address'=>$delivry_address, 'order_date'=> $datetime,  'pay_method' => $variant_pay,'pick_type'=>$pick_type,'tax' => $tax,'discount' => $discount,'grandtotal'=>$grandtotal,'remain_amount'=>$remain_amount,'status_order' => $status_order);
        $order_id=DB::table('order')->insertGetId($values);
        $order=array();
     
        foreach ($menuname as $mname){
            $order[]=array('order_id'=>$order_id,'order_name'=> $mname,'order_quantity'=> $quantity[$i], 'total_amount'=> $totalamount[$i],'order_price'=> $price[$i],'menu_id'=> $menu_id[$i]);
            $i++;
        } 

        DB::table('product_order')->insert($order);

        $payment[]=array('order_id'=>$order_id,'customer_id'=> $customer_id,'amount_paid'=> $paid_amount,'payment_method'=> $variant_pay);
        DB::table('payments')->insert($payment);
        
       
        
            // return response()->json(['success'=>'Added new records.']);
        $result['code']=200;
        $result['msg']="Order added successfully.";
    }else{
        $result['code']=404;
        // $result['msg']=$validator->errors()->all();
        $result['msg']=$validator->errors()->all();
        // return response()->json(['error'=>$validator->errors()->all()]);

    }
     
    
        return json_encode($result);
    }
    public function fetchorderprice(Request $request){
        $order_pricedetails = DB::table('order')->where('customer_id', '=', $request->customer_id)->get();
        echo json_encode($order_pricedetails);
    }
    public function storeOrder(Request $request){
        
        $file = $request->file('fileupload');
        //   print_r(WRITEPATH);
        $imgName='';
        if(!empty($file)){
           if ($request->hasfile('fileupload')) {
            $imgName = $file->getClientOriginalName();
            $file->move('upload/', $imgName);

           }
        }
        $res= array();
        $res['menu_name']=$request->input('menuname');
        $res['menu_type']=$request->input('menuselect');
        $res['menu_date']=$request->input('menudate');
        $res['menu_price']=$request->input('menuprice');
        $res['file_upload']=$imgName;
          
           
               Menu::insert($res);
       
        $data=array();
        $data['code']="200";
        $data['msg']="Menu record added successfully!";
        return json_encode($data);
    }

    // public function menuorder(){
    //    $menuo = DB::table('menu_list')
    //     ->where('menu_list.menu_type ','=','Lunch')
    //     ->get()->toArray();
     
    //     return view('order',['menuArr'=>$menuo]);
    // }
    public function add_order(){
        return view('add_order');
    }
 
    public function fetch_customer(Request $request){
        $response = array();
        $customer_no=$request->search;
        $customer = DB::table('customers')
        // ->where('customers.customer_contactnum','=',$customer_id)
        ->where('customers.customer_contactnum', 'like', '%' . $customer_no . '%')
       ->get();
       foreach($customer as $row ){
        $name = $row->customer_name.' ('.$row->customer_contactnum.')';
        $response[] = array("label"=>$name,"phone"=>$customer_no);
     }
       // return json_encode($customer);

        
   
		// if(isset($postData['search']) ){
		//   // Select record
		//   $this->db->select('*');
		//   $this->db->where("keyword like '%".$postData['search']."%' ");
		//   $this->db->group_by('keyword');// add group_by
		//   $records = $this->db->get('keyword_search')->result();
   
		//   foreach($records as $row ){
		// 	 $response[] = array("label"=>$row->keyword);
		//   }
   
		// }
   
		return json_encode($response);
    }
    public function fetch_customer2(Request $request){
        $response = array();
        $customer_id=$request->customer_id;
        $int_var = (int)filter_var($customer_id, FILTER_SANITIZE_NUMBER_INT);
        // dd(strlen($int_var));
        // if(strlen($int_var) > 10){
        //     $newstring = substr($int_var, -10);
        // }
        $customer = DB::table('customers')
        // ->where('customers.customer_name','=',$customer_id)
        ->where('customers.customer_contactnum', 'like', '%' . $int_var . '%')
       ->get();
    //    dd($customer);
    //    foreach($customer as $row ){
    //     $response[] = array("label"=>$row->customer_name);
    //  }
       return json_encode($customer);
    }
    public function storeplaceorder(Request $request)
    { 
       
     
          $res= array();
          $res['menu_name']=$request->input('mobile_number');
            $res['menu_type']=$request->input('delivry_address');
            $res['menu_date']=$request->input('pincode');
            $res['menu_price']=$request->input('datetime');
            
            OrderModel::insert($res);
       
        $data=array();
        $data['code']="200";
        $data['msg']="Order added successfully!";
        return json_encode($data);
    
       
    }
    public function order_active_payment(Request $request)
    { 
    //    dd($request);
     
          $res= array();
               $res['customer_id']=$request->input('custid');
               $res['order_id']=$request->input('orderid');
               $res['paystatus']=$request->input('paystatus');
               $res['amount_paid']=$request->input('paidamount');
               $res['payment_method']=$request->input('paymethod');
              

            //    if($res['payment_method']=='Pay Later'){
                PaymentDetailsModel::insert($res);
            // }
             

               DB::table('order')->where('order_id', $res['order_id'])->update(['status' => $request->input('paystatus')]);
            $data=array();
            $data['code']="200";
            $data['msg']="Data added successfully!";
            return json_encode($data);
    
       
    }
    public function order_payment(Request $request)
    { 
    //    dd($request);
            $validator = Validator::make($request->all(), [
                    // 'cust_order' => 'required|unique:posts|max:255',
                    'paidamount' => 'required',
                    // 'menu_id' => 'required',
                ],
                [   
                    'paidamount.required'    => 'Please Add Payment Amount.',
                    // 'menu_id.required' => 'Please Select Menu First.',
                ]

            );
        //   $res= array();
               $customer_id = $request->input('custid'); 
               $order_id = $request->input('orderid'); 
            //    $res['payment_id']=$request->input('pay'); 
            //    $res['paystatus']=$request->input('paystatus'); 
            //    $res['remain_amount']=$request->input('remainamount');
               $paid_amount = $request->input('paidamount');
               $payment_method = $request->input('paymethod');
              
            //    if($res['payment_method']=='Pay Later'){
                // PaymentDetailsModel::insert($res);
            // }
            if ($validator->passes()) {
                    //    DB::table('order')->where('order_id', $res['order_id'])->update(['status' => $request->input('paystatus')]);
                    $payment[]=array('order_id'=>$order_id,'customer_id'=> $customer_id,'amount_paid'=> $paid_amount,'payment_method'=> $payment_method);
                    DB::table('payments')->insert($payment);
                    
                    
                //    DB::table('payments')->where('payment_id', $request->input('pay'))->update($res);
                //    DB::table('payments')->where('payment_id', $request->input('pay'))->Insert($res);

                $data=array();
                $data['code']="200";
                $data['msg']="Data added successfully!";
            }else{
                $data['code']=404;
                // $result['msg']=$validator->errors()->all();
                $data['msg']=$validator->errors()->all();
                // return response()->json(['error'=>$validator->errors()->all()]);

            }    

       
        return json_encode($data);
    
       
    }
    public function order_status(Request $request)
    { 
   
       
               $customer_id = $request->input('custid'); 
               $order_id = $request->input('orderid'); 
          
               $paid_amount = $request->input('paidamount');
               $payment_method = $request->input('paymethod');
          
                    DB::table('order')->where('order_id', $order_id)->update(['status' => $request->input('paystatus')]);
             

                $data=array();
                $data['code']="200";
                $data['msg']="Order Status Change successfully!";
          

       
        return json_encode($data);
    
       
    }
    public function fetch_ajaxorderlist(Request $request)
    {
        // DB::enableQueryLog();
     if($request->ajax())
       {  
           $search = $request->get('search');
           $order_status = $request->get('order_status');
           $order_payment = $request->get('order_payment');
           $dates = $request->get('dates');
           $from = $request->get('from_date');
           $to = $request->get('to_date');
            //    dd($search);
            //   $search = str_replace(" ", "%", $search);
            $orders = DB::table('order');
            $orders=$orders->join('customers','customers.customer_id','=', 'order.customer_id');
            $orders=$orders->select('order.*','customers.customer_name as name','customers.customer_id','customers.customer_contactnum as phone_no','customers.customer_address as address');
            // $orders=$orders->join('order','order.order_id','=', 'payments.order_id');
            if($search!=''){
                $orders=$orders->Where('customers.customer_name', 'LIKE','%'.$search.'%');
            }
           
            if($from!='' && $dates!=''){
                $fromd = date('Y-m-d',strtotime($from));
                $tod = date('Y-m-d',strtotime($to));
                $orders = $orders->whereBetween(DB::raw('DATE(order.order_date)'), [$dates, $fromd]);
            }
            if($order_status!=''){
                // $fromd = date('Y-m-d',strtotime($from));
                // $tod = date('Y-m-d',strtotime($to));
                $orders = $orders=$orders->Where('order.status', $order_status);
            }
            if($order_payment!=''){
                // $fromd = date('Y-m-d',strtotime($from));
                // $tod = date('Y-m-d',strtotime($to));
                // $orders = $orders=$orders->Where('order.status', $order_payment);
                $order_payment = $order_payment;
            }
        // $orders=$orders->where('payments.payment_method','=',"Cash");
        $orders=$orders->simplePaginate(10);
        // dd(DB::getQueryLog());
        $payment=  DB::table('payments')->get();
        return view('order_data', ['ordersArr'=>$orders,'payment'=>$payment,'payment_type'=>$order_payment]);
     }
    }
    
    public function store_details_order(Request $request)
    { 
       
        $file = $request->file('fileupload');
        //   print_r(WRITEPATH);
        $imgName='';
        if(!empty($file)){
           if ($request->hasfile('fileupload')) {
            $imgName = $file->getClientOriginalName();
            $file->move('orderimg/', $imgName);

           }
        }
          $res= array();
          $res['order_title']=$request->input('ordertitle');
               $res['amount']=$request->input('amount');
            //    $res['img_order']=$request->input('fileupload');
               $res['img_order']=$imgName;
          
           
              AddOrderModel::insert($res);
       
        $data=array();
        $data['code']="200";
        $data['msg']="Order record added successfully!";
        return json_encode($data);
    
       
    }
    public function storecustomer(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            // 'cust_order' => 'required|unique:posts|max:255',
            'customer_name' => 'required',
            'custmobilenum' => 'required',
        ]);
        $customer = DB::table('customers')
            ->where('customers.customer_contactnum','=',$request->input('custmobilenum'))
            ->first();
        //    dd( $customer);
        $data=array();
        if ($validator->passes()) {
            if(empty($customer)){
                $res= array();
                $res['customer_name']=$request->input('customer_name');
                $res['customer_contactnum']=$request->input('custmobilenum');
                $res['customer_address']=$request->input('cust_address');
                
                 
                // Customers::insert($res);
                $customer_id=DB::table('customers')->insertGetId($res);
                $data['code']="200";
                $data['customer_id']=$customer_id;
                $data['msg']="Customer added successfully!";
            }else{
                $data['code']="404";
                $data['msg']="Costomer Already Exist!";
            }
        }else{
            $data['code']="404";
            $data['msg']=$validator->errors()->all();
        }
       
       
        
       
       
       
        return json_encode($data);
    
       
    }
    public function check_request(Request $request)
    { 
       
       
          $res= array();
          $res['checked']=$request->input('checked');
          $res['customer_address']=$request->input('cust_address');
          

           
          Customers::insert($res);
       
        $data=array();
        $data['code']="200";
        $data['msg']="Customer added successfully!";
        return json_encode($data);
    
       
    }
    public function destroy_order(Request $request)
    { //dd($request->all());
        Menu::where('menu_id',$request->menu_id)->delete();
        $data=array();
        $data['code']="200";
        $data['msg']="Menu deleted successfully!";

      return json_encode($data);
    }
    public function destroy_po(Request $request)
    { 
        // dd($request->all());
        DB::table('order')->where('order_id',$request->products_id)->delete();
        $data=array();
        $data['code']="200";
        $data['msg']="Data deleted successfully!";

      return json_encode($data);
    }
    public function order_details(Request $request){
        $demo=$request->order_id;
        // dd($demo);
        // $payment=  DB::table('payments')->where('payments.order_id','=',$request->order_id)->get();
        $payment = DB::table('payments')
        ->leftjoin('customers','customers.customer_id','=', 'payments.customer_id')
        ->leftjoin('order','order.order_id','=', 'payments.order_id')
        ->where('payments.order_id','=',$request->order_id)
        // ->orderBy('payments.payment_id', 'DESC')
        // ->simplePaginate(10);
        ->get();


        $paid = DB::table('order')->join('product_order','product_order.order_id','=', 'order.order_id')->where('order.order_id','=',$request->order_id)->sum('product_order.total_amount');
        $total['paid']=$paid;

        $order_details= DB::table('order')
        ->leftjoin('customers','customers.customer_id','=', 'order.customer_id')
        ->leftjoin('product_order','product_order.order_id','=', 'order.order_id')
        ->select('order.*','product_order.*','customers.customer_name as name','customers.customer_id','customers.customer_contactnum as phone_no','customers.customer_address as address')
        ->where('order.order_id','=',$request->order_id)
        ->get();


        $order_single= DB::table('order');
        $order_single= $order_single->leftjoin('customers','customers.customer_id','=', 'order.customer_id');
        $order_single= $order_single->join('product_order','product_order.order_id','=', 'order.order_id');
        $order_single= $order_single->select('order.*','product_order.*','customers.customer_name as name','customers.customer_id','customers.customer_contactnum as phone_no','customers.customer_address as address');
        $order_single= $order_single->where('order.order_id','=',$request->order_id);
        $order_single= $order_single->get();

        return view('order_details',['order_detailsArr'=>$order_details,'order_singleArr'=>$order_single,'paidArr'=>$paid,'total'=>$total,'payment'=>$payment]);
        // return view('order_details');
    }

    public function order_list(){
        $payment=  DB::table('payments')->get();
        $orderlist = DB::table('order')
        ->leftjoin('customers','customers.customer_id','=', 'order.customer_id')
        // ->join('payments','payments.order_id','=', 'order.order_id')
        ->select('order.*','customers.customer_name as name','customers.customer_contactnum as phone_no','customers.customer_address as address')
        // ->where('order.status','!=','Completed')
        ->orderBy('order.order_id', 'DESC')
        ->paginate(10);
        // dd($orderlist);
        return view('order_list',['addorderArr'=>$orderlist,'payment'=>$payment]);
        // return view('order_list');
    }
    public function order_list2(){
        
        $orderlist = DB::table('order')
        ->join('customers','customers.customer_id','=', 'order.customer_id')
        ->orderBy('order.order_id', 'DESC')
        ->get();
        return view('order_list2',['addorderArr'=>$orderlist]);
        
    }
    public function fetch_ajaxdata(Request $request)
    {
        if($request->ajax())
        {  
                $search = $request->get('search');
                $dates = $request->get('dates');
                $from = $request->get('from_date');
                $to = $request->get('to_date');
                $orders = DB::table('order');
                $orders=$orders->join('customers','customers.customer_id','=', 'order.customer_id');
            //   $orders=$orders->join('order','order.order_id','=', 'payments.order_id');
                $orders=$orders->Where('customers.customer_name', 'LIKE','%'.$search.'%');
            //   $orders=$orders->Where('order.order_id', 'LIKE','%'.$search.'%');
            if($from!='' && $to!=''){
                $fromd = date('Y-m-d',strtotime($from));
                $tod = date('Y-m-d',strtotime($to));
                $orders = $orders->whereBetween(DB::raw('DATE(order.order_date)'), [$fromd, $tod]);
            }
            $orders=$orders->orderBy('order.order_id', 'DESC');
            $orders=$orders->simplePaginate(10);
            // dd($orders);
            return view('order_list', ['addorderArr'=>$orders]);
        }
    }
  
    public function snack_order(){
       
        $date = date('y-m-d');
        $menus = DB::table('menu_list')->
        leftjoin('snacks_orders', function($join) use ($date)
        {
            $join->on('snacks_orders.snacks_id','=', 'menu_list.menu_id')->where('snacks_orders.order_date', $date);
        })
       // ->join('snacks_orders','snacks_orders.snacks_id','=', 'menu_list.menu_id', 'left')
        ->where('menu_list.menu_type','=','Snack')
        ->where('menu_list.status','=','1')
       // ->whereDate('snacks_orders.order_date', $date)
        ->get();
       
        return view('snack_order',['menus'=>$menus]);
        
    }
     function snacks_order($date){
        
       
        $date = $date;
        if($date == ''){
            $date = date('y-m-d');
        }
        $menus = DB::table('menu_list')->
        leftjoin('snacks_orders', function($join) use ($date)
        {
            $join->on('snacks_orders.snacks_id','=', 'menu_list.menu_id')->where('snacks_orders.order_date', $date);
        })
       // ->join('snacks_orders','snacks_orders.snacks_id','=', 'menu_list.menu_id', 'left')
        ->where('menu_list.menu_type','=','Snack')
        ->where('menu_list.status','=','1')
       // ->whereDate('snacks_orders.order_date', $date)
        ->get();
        // dd($menus);
        return view('snacks_order',['menus'=>$menus]);
        
    }
    public function add_snacks(Request $request){
        
        
        $data = array();
        $date = $request->input('order_date');
        $menu_id = $request->input('menu');
        $menus = DB::table('snacks_orders')
            ->where('snacks_id','=',$menu_id)
            ->where('order_date','=',$date)
           ->first();
        //    dd($menus);
        if($menus != null){
            // dd($menus);
            // dd($menus[0]->quantity);
            $order_id = $menus->snacks_order_id;
            $quantity = ($menus->quantity)+$request->input('quanty');
            DB::table('snacks_orders')->where('snacks_id','=',$menu_id)->where('order_date','=',$date)->update(['quantity' => $quantity]);
            
            $data['code'] = '200';
            $data['msg'] = 'Snacks Updated Successfully';
        }else{
            $res= array();
            //    $res['total_price']=$request->input('total_price');
            $res['quantity']=$request->input('quanty');
            //    $res['price']=$request->input('price');
            $res['snacks_id']=$request->input('menu');
            $res['order_date']=$request->input('order_date');
            //  $res['customer_pincode']=$request->input('customer_pin');
            //  dd($res);
            // DB::table('snacks_orders')->insert($res);
            $order_id=DB::table('snacks_orders')->insertGetId($res);
            $data['code'] = '200';
            $data['msg'] = 'Snacks Add Successfully';
        }

        
        $date = date('y-m-d');
        $menus = DB::table('menu_list')->
        leftjoin('snacks_orders', function($join) use ($date)
        {
            $join->on('snacks_orders.snacks_id','=', 'menu_list.menu_id')->where('snacks_orders.order_date', $date);
        })
        ->where('menu_list.menu_type','=','Snack')
        ->where('menu_list.status','=','1')
        ->get();
        $output =[];
        $i = 1;
        foreach ($menus as $expenses) {
            $output[] = '<tr>
                    <td>'.$i++.'</td>
                    <td>'.$expenses->menu_name.' </td>
                    <td> ₹'.$expenses->menu_price.'</td>
                    <td>'.$expenses->quantity.'</td>
                    <td>₹'.($expenses->quantity)*($expenses->menu_price).'</td>
                </tr>';
            
        }
        // dd($menus);

                // $payment[]=array('order_id'=>$order_id,'amount_paid'=> $paid_amount,'payment_method'=> $variant_pay);
                // DB::table('payments')->insert($payment);

                // $data1 = $this->snacks_order($date);
        // dd($data1->menus);
        $data['snack']=$output;

        return json_encode($data);
        
    }
}
