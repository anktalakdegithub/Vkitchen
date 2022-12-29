<?php

namespace App\Http\Controllers\web;
use DB;
use App\Http\Controllers\Controller;
// use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\PaymentModels;
use App\Models\PaymentDetailsModel;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Validator;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        // DB::enableQueryLog();
        // $payment=  DB::table('payments_tablel')->get();
        $payment=  DB::table('payments')->get();
        
        $orders = DB::table('payments')
        ->join('customers','customers.customer_id','=', 'payments.customer_id')
        ->join('order','order.order_id','=', 'payments.order_id')
        // ->where('payments.payment_method','=',"Cash")
        ->select('payments.payment_method','payments.amount_paid','payments.payment_id','customers.customer_name','order.order_id','order.order_date')
        ->orderBy('payments.payment_id', 'DESC')
        ->simplePaginate(10);
        //  dd(DB::getQueryLog());
        // dd($orders);
        $ordersbank = DB::table('payments')
        ->leftjoin('customers','customers.customer_id','=', 'payments.customer_id')
        ->leftjoin('order','order.order_id','=', 'payments.order_id')
        // ->where('payments.payment_method','=',"Bank")
        ->orderBy('payments.payment_id', 'DESC')
        ->simplePaginate(10);

        $total_order_amount = DB::table('order')->sum('order.grandtotal');
        // $total['paid']=$paid;
        $paid = DB::table('payments')->sum('payments.amount_paid');
        // $paid = DB::table('payments')->where('payments.payment_method','=',"Bank")->sum('payments.amount_paid');
        $total['paid']=$paid;
        $remainingamount= DB::table('payments')->sum('payments.remain_amount');
        // $remainingamount= DB::table('payments')->where('payments.payment_method','=',"Bank")->sum('payments.remain_amount');
        $remaingamt['remainingamount']=$remainingamount;
        $paidcash = DB::table('payments')->sum('payments.amount_paid');
        // $paidcash = DB::table('payments')->where('payments.payment_method','=',"Cash")->sum('payments.amount_paid');
        // $totalcash['paidcash']=$paidcash;
        $totalcash['paidcash']=$total_order_amount;
        $remainingamountcash= DB::table('payments')
        ->sum('payments.remain_amount');
        // $remainingamountcash= DB::table('payments')->where('payments.payment_method','=',"Cash")->sum('payments.remain_amount');
        // $remaingamtc['remainingamountcash']=$remainingamountcash;
        $remaingamtc['remainingamountcash']= $total_order_amount-$paid;
        $snacks = DB::table('snacks_orders')->leftjoin('menu_list','menu_list.menu_id','=', 'snacks_orders.snacks_id')->get();

        // dd($payment);
        return view('payment',['paymentArr'=>$payment,'ordersArr'=>$orders,'ordersbankArr'=>$ordersbank,'paidArr'=>$paid,'total'=>$total,'remaingamt'=>$remaingamt,'paidcashArr'=>$paidcash,'totalcash'=>$totalcash,'remaingamtc'=>$remaingamtc,'snacks'=>$snacks]);
    }
    public function payment_data(){
        $orders = DB::table('payments')
            ->join('customers','customers.customer_id','=', 'payments.customer_id')
            ->join('order','order.order_id','=', 'payments.order_id')
            ->where('payments.payment_method','=',"Cash")
            ->simplePaginate(3);

        $ordersbank = DB::table('payments')
            ->join('customers','customers.customer_id','=', 'payments.customer_id')
            ->join('order','order.order_id','=', 'payments.order_id')
            ->where('payments.payment_method','=',"Bank")
            ->get();

        $paid = DB::table('payments')->sum('payments.amount_paid');
        $total['paid']=$paid;
        return view('payment2',['ordersArr'=>$orders,'total'=>$total,'ordersbankArr'=>$ordersbank]);
    }
    public function fetch_ajaxdata(Request $request)
    {
        // DB::enableQueryLog();
     if($request->ajax())
       {  
           $search = $request->get('search');
           $dates = $request->get('dates');
           $from = $request->get('from_date');
           $to = $request->get('to_date');
        //    dd($search);
        //   $search = str_replace(" ", "%", $search);
          $orders = DB::table('payments');
          $orders=$orders->join('customers','customers.customer_id','=', 'payments.customer_id');
         
          $orders=$orders->join('order','order.order_id','=', 'payments.order_id')->select('payments.payment_method','payments.amount_paid','payments.payment_id','customers.customer_name','order.order_id','order.order_date');


          $total_order_amount = DB::table('payments')->join('customers','customers.customer_id','=', 'payments.customer_id')->join('order','order.order_id','=', 'payments.order_id');
          $paid = DB::table('payments')->join('customers','customers.customer_id','=', 'payments.customer_id');
          $snacks = DB::table('snacks_orders')->leftjoin('menu_list','menu_list.menu_id','=', 'snacks_orders.snacks_id');
  
  
        if($search!=''){
            $orders=$orders->Where('customers.customer_name', 'LIKE','%'.$search.'%');

            $total_order_amount=$total_order_amount->Where('customers.customer_name', 'LIKE','%'.$search.'%');
            $paid=$paid->Where('customers.customer_name', 'LIKE','%'.$search.'%');
        }
          
        if($from!='' && $to!=''){
            $fromd = date('Y-m-d',strtotime($from));
            $tod = date('Y-m-d',strtotime($to));
            $orders = $orders->whereBetween(DB::raw('DATE(order.order_date)'), [$fromd, $tod]);

            $snacks = $snacks->whereBetween(DB::raw('DATE(order_date)'), [$fromd, $tod]);
            $total_order_amount = $total_order_amount->whereBetween(DB::raw('DATE(order.order_date)'), [$fromd, $tod]);
            $paid = $paid->whereBetween(DB::raw('DATE(payments.created_at)'), [$fromd, $tod]);
        }
        // $orders=$orders->where('payments.payment_method','=',"Cash");
        $orders=$orders->simplePaginate(10);
        $snacks=$snacks->get();;
        $total_order_amount=$total_order_amount->get();;
        $paid=$paid->get();
        // $snacks_amount = 0;
        // foreach( $snacks as $snack){
        //     $snacks_amount+=$snack->menu_price*$snack->quantity;
        // }
        $total_amount = 0;
        foreach( $total_order_amount as $order_amount){
            $total_amount+=$order_amount->grandtotal;
        }
        $paid_amount = 0;
        foreach( $paid as $paid_am){
            $paid_amount+=$paid_am->amount_paid;
        }
        $totalcash['paidcash'] = $total_amount;
        $total['paid'] = $paid_amount;
        $remaingamtc['remainingamountcash'] = $total_amount-$paid_amount;
        // $total['paid']=$paid;
        // $remaingamtc['remainingamountcash']= $total_order_amount-$paid;
        // $snacks 
        // dd($orders);
        // dd(DB::getQueryLog());
        return view('pagination_data', ['ordersArr'=>$orders,'snacks'=>$snacks,'totalcash'=>$totalcash,'remaingamtc'=>$remaingamtc,'total'=>$total]);
     }
    }
    public function get_payment(Request $request){
    
        //  dd($request->all());
        $payment_search=$request->payment_search;
        $dates=$request->dates;
        $paymenttbl = DB::table('payments_tablel');


      
        if($request->from_date!='' && $request->to_date!=''){
            $from = date('Y-m-d',strtotime($request->from_date));
            $to = date('Y-m-d',strtotime($request->to_date));
            $paymenttbl = $paymenttbl->whereBetween(DB::raw('DATE(payments_tablel.payment_date)'), [$from, $to]);
        }
        if($payment_search !='')
        {
            $paymenttbl=$paymenttbl->where('payments_tablel.payment_id','LIKE','%'.$payment_search.'%');
    
        }
        $paymenttbl =  $paymenttbl->get()->toArray();
        $output='';
        $i=1;
        foreach ($paymenttbl as $payment){
  
           $output.='<tr>
           <td>'.$i++.'</td>
           <td>'.$payment->customer_name.'</td>
           <td>'.$payment->remaining_amount.'</td>
           <td>'.$payment->amount_paid.'</td>
           <td>';
           if($payment->payment_status=="Process"){

            $output.='<span
               class="badge badge-warning text-white">'.$payment->payment_status.'</span>';
           }if($payment->payment_status=="Pending"){
            $output.='<span
               class="badge badge-danger text-white">'.$payment->payment_status.'</span>';
           }if($payment->payment_status=="Completed"){
            $output.='<span class="badge badge-success text-white">'.$payment->payment_status.'</span>';
           }
           $output.='</td>
           <td>'.$payment->payment_date.'</td>
           <td>
           <i class="bi bi-trash text-danger booticon" data-toggle="modal"
               data-target="#payment_'.$payment->payment_id.'"></i>
           <!-- Modal -->
           <div class="modal fade" id="payment_'.$payment->payment_id.'" tabindex="-1"
               aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Are Sure You
                               Want Delete?
                           </h5>
                           <button type="button" class="close" data-dismiss="modal"
                               aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>

                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary"
                               data-dismiss="modal">Close</button>
                           <button type="button" class="btn btn-primary paymentdelete"
                               value="'.$payment->payment_id.'">Delete</button>
                       </div>
                   </div>
               </div>
           </div>
       </td></tr>';
        }

       $result['output']=$output;
      
     echo json_encode($result);
    }
    public function get_paymentdata(Request $request){
    
        //  dd($request->all());
        $payment_search=$request->payment_search;
         $dates=$request->dates;
       $paymenttbl = DB::table('payments_tablel');
       if($request->from_date!='' && $request->to_date!=''){
        $from = date('Y-m-d',strtotime($request->from_date));
        $to = date('Y-m-d',strtotime($request->to_date));
        $paymenttbl = $paymenttbl->whereBetween(DB::raw('DATE(payments_tablel.payment_date)'), [$from, $to]);
    }
       if($payment_search !='')
       {
         $paymenttbl=$paymenttbl->where('payments_tablel.payment_id','LIKE','%'.$payment_search.'%');
    
       }
       $paymenttbl =  $paymenttbl->get()->toArray();
     $output='';
       $i=1;
       foreach ($ordersArr as $payment){
  
           $output.='<tr>
           <td>'.$i++.'</td>
           <td>'.$payment->customer_name.'</td>
           <td>'.$payment->amount_paid.'</td>
           <td>'.$payment->payment_method.'</td>
           <td>'.$payment->order_date.'</td>
           <td>'.$payment->order_date.'</td>
           </tr>';
        }

       $result['output']=$output;
     echo json_encode($result);
    }
    public function edit_payment(Request $request){
        $customer = DB::table('customers')->get();
        $payment_edit= DB::table('payments_tablel')
        ->where('payment_id','=',$request->payment_id)
        ->get();
        return view('edit_payment',['editpaymentArr'=>$payment_edit,'customerArr'=>$customer]);
    }

    public function add_payment(){
        $customer = DB::table('customers')->get();
        return view('add_payment', ['customerArr'=>$customer]);
    }
    public function paymentstore(Request $request){
        // dd($request);
        if(empty($request->cust_name)){

            $result['code']="404";
            $result['msg']="Please slect Customer Name.";
        }
        else if(empty($request->amountpaid)){

            $result['code']="404";
            $result['msg']="Please Enter Amount";
        }
        else if(empty($request->paymentdate)){

            $result['code']="404";
            $result['msg']="Please Enter Amount";
        }
        else{
                $res= array();
                     $res['customer_name']=$request->input('cust_name');
                     $res['payment_type']=$request->input('paymenttype');
                     $res['remaining_amount']=$request->input('remainamount');
                     $res['amount_paid']=$request->input('amountpaid');
                     $res['balance_due']=$request->input('balanceamount');
                     $res['payment_date']=$request->input('paymentdate');
                     $res['payment_status']=$request->input('paymentstatus');
                    //  dd($res);
                    PaymentModels::insert($res);
                    $result['code']="200";
                    $result['msg']="Payment created successfully";
         }
       echo json_encode($result);
    }
    public function updatepayment(Request $request){
        //    dd($request);
            $payment_id = $request->input('payment_id');
           
            
         $res= array();
        $res['customer_name']=$request->input('cust_name');
             $res['payment_type']=$request->input('paymenttype');
             $res['remaining_amount']=$request->input('remainamount');
             $res['amount_paid']=$request->input('amountpaid');
             $res['balance_due']=$request->input('balanceamount');
             $res['payment_status']=$request->input('paymentstatus');
             $res['payment_date']=$request->input('paymentdate');
        
           
             PaymentModels::where('payment_id', $payment_id)->update($res);   
             $result['code']="200";
             $result['msg']="Payment created successfully";
        
             echo json_encode($result);
    }
    public function destroy_payment(Request $request)
    { 
        // dd($request->all());
        DB::table('payments')->where('payment_id',$request->payment_id)->delete();
        $data=array();
        $data['code']="200";
        $data['msg']="Data deleted successfully!";

      return json_encode($data);
    }
    public function bank(){
        return view('bank');
    }
    public function cash(){
        return view('cash');
    }
    public function add_cash(){
        return view('add_cash');
    }

    public function add_bank(){
        return view('add_bank');
    }

    public function edit_bank(){
        return view('edit_bank');
    }
    public function storecash(){
        
        $menulist= new Menu();
        
        $file = $this->request->getFile('fileupload');
        //   print_r(WRITEPATH);
        $imgName='';
        if(!empty($file)){
           if ($file->isValid() && ! $file->hasMoved()) {
            $imgName = $file->getRandomName();
            $file->move('./public/upload/', $imgName);
           }
        }
        $datacontact=[
            'menu_name' =>$this->request->getPost('menuname'),
            'menu_type' =>$this->request->getPost('menuselect'),
            'menu_date' =>$this->request->getPost('menudate'),
            'menu_price' =>$this->request->getPost('menuprice'),
            'file_upload' =>$imgName,
          
        ];
           
        $menulist->save($datacontact);
       
        $datacontact = ['status'=>'Menu Added Successfully','msg'=>'Menu Added Successfully'];
        
        return $this->response->setJSON($datacontact);
    
    }
}
