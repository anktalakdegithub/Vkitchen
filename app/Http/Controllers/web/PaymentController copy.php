<?php

namespace App\Http\Controllers\web;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentModels;
use Validator;

class PaymentController extends Controller
{
    public function index(){
        $payment=  DB::table('payments_tablel')->get();
        $paid = DB::table('payments')->sum('payments_tablel.amount_paid');
        $total['paid']=$paid;
        $remainingamount= DB::table('payments')->sum('payments_tablel.remaining_amount');
        $remaingamt['remainingamount']=$remainingamount;
        return view('payment',['paymentArr'=>$payment,'paidArr'=>$paid,'total'=>$total,'remaingamt'=>$remaingamt]);
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
           <a href="edit_payment/id='.$payment->payment_id.'">
               <i class="bi bi-pencil-square text-success px-2 booticon"></i>
           </a>
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
    { //dd($request->all());
        PaymentModels::where('payment_id',$request->payment_id)->delete();
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
