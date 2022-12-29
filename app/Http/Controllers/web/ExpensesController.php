<?php

namespace App\Http\Controllers\web;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Validator;

class ExpensesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $expenses =  DB::table('expense')->paginate(10);
        $paid = DB::table('expense')->sum('expense.expenses_amount');
        $total['paid']=$paid;
        return view('expenses',['expensesArr'=>$expenses,'total'=>$total]);
    }
    public function editexpenses(Request $request){
        $expenses_edit= DB::table('expense')
        ->where('expenses_id','=',$request->expenses_id)
        ->get();
        return view('edit_expenses',['expenses_editArr'=>$expenses_edit]);
    }
    public function add_expenses(){
        return view('add_expenses');
    }
    public function expenses_search_details(Request $request){
        // DB::enableQueryLog();
        //  dd($request->all());
        $expense_search=$request->expense_search;
        $dates=$request->dates;
        $paid = DB::table('expense');
        // $paid = DB::table('expense')->sum('expense.expenses_amount');
       
        $expenses_tbl = DB::table('expense');
        if($request->from_date!='' && $request->to_date!=''){
            $from = date('Y-m-d',strtotime($request->from_date));
            $to = date('Y-m-d',strtotime($request->to_date));
            $expenses_tbl = $expenses_tbl->whereBetween(DB::raw('DATE(expense.expense_date)'), [$from, $to]);
            $paid = $paid->whereBetween(DB::raw('DATE(expense.expense_date)'), [$from, $to]);
        }
        if($expense_search !='')
        {
            $expenses_tbl=$expenses_tbl->where('expense.expense_Name','LIKE','%'.$expense_search.'%');
            $paid=$paid->where('expense.expense_Name','LIKE','%'.$expense_search.'%');
    
        }
        $expenses_tbl =  $expenses_tbl->simplePaginate(5);
        $paid =  $paid->get();
        $paid_amount = 0;
        foreach($paid as $pay){
            $paid_amount+=$pay->expenses_amount;
        }
        //   / dd($expenses_tbl);
        // dd(DB::getQueryLog());
        $output='';
        $i=1;
        foreach ($expenses_tbl as $expenses){
  
           $output.='<tr>
           <td>'.$i++.'</td>
           <td>'.$expenses->expense_Name.'</td>
           <td>'.$expenses->expenses_amount.'</td>
           <td>'.$expenses->expense_date.'</td>
           <td>
           <a href="edit_expenses/id='.$expenses->expenses_id.'">
               <i class="bi bi-pencil-square text-success px-2 booticon"></i>
           </a>
           <i class="bi bi-trash text-danger booticon" data-toggle="modal"
               data-target="#expenses_'.$expenses->expenses_id.'"></i>
           <!-- Modal -->
           <div class="modal fade" id="expenses_'.$expenses->expenses_id.'" tabindex="-1"
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
                               value="'.$expenses->expenses_id.'">Delete</button>
                       </div>
                   </div>
               </div>
           </div>
       </td></tr>';
        }

       $result['output']=$output;
       $result['paid']=$paid_amount;
    //    dd( $result);
     echo json_encode($result);
    }
  
    public function expensesstore(Request $request){
        // dd($request);
        if(empty($request->expenses_title)){

            $result['code']="404";
            $result['msg']="Please enter Title.";
        }
        else if(empty($request->expenses_amount)){

            $result['code']="404";
            $result['msg']="Please Enter Amount";
        }
        else if(empty($request->expenses_date)){

            $result['code']="404";
            $result['msg']="Please Select Date";
        }
        else{
            $res= array();
            $file = $request->file('expenses_invoice');
            $imgName='';
            if(!empty($file)){
                if ($request->hasfile('expenses_invoice')) {
                    // $imgName = $file->getClientOriginalName();
                    $imgName = $request->file('expenses_invoice')->getClientOriginalName();
                    // $file->move('./upload/', $imgName);
                    $path = $request->file('expenses_invoice')->move('./expence/', $imgName);
                    $res['invoice']=$request->file('expenses_invoice')->getClientOriginalName();
    
                }
            }
            
                
                $res['expense_Name']=$request->input('expenses_title');
                $res['expenses_amount']=$request->input('expenses_amount');
                $res['payment_type']=$request->input('expenses_payment');
                $res['expense_date']=$request->input('expenses_date');
            //  $res['category']=$request->input('expenses_category');
                $res['category']=$request->input('expenses_note');
                     
                //  dd($res);
                Expense::insert($res);
                $result['code']="200";
                $result['msg']="Expense created successfully";
         }
       echo json_encode($result);
    }
    public function vendor_payment(Request $request){
        // dd($request);
        $validator = Validator::make($request->all(), [
            // 'cust_order' => 'required|unique:posts|max:255',
            'commission' => 'required',
            // 'menu_id' => 'required',
        ],
        [   
            'commission.required'    => 'Please Add Commission Amount.',
            // 'menu_id.required' => 'Please Select Menu First.',
        ]
    
    );
    if ($validator->passes()) { 
            $res['expense_Name']='vendor_payment';
            $res['expenses_amount']=$request->input('commission');
            $res['payment_type']=$request->input('payment_type');
            $res['expense_date']=now();
            $res['customer_id']=$request->input('vendor_id');
        //  $res['expense_date']=$request->input('expenses_date');
            
        //  dd($res);
        Expense::insert($res);
        $result['code']="200";
        $result['msg']="Expense created successfully";
    }else{
        $result['code']=404;
        // $result['msg']=$validator->errors()->all();
        $result['msg']=$validator->errors()->all();
        // return response()->json(['error'=>$validator->errors()->all()]);

    }
       echo json_encode($result);
    }
    public function updateexpenses(Request $request){
        //    dd($request);
        $expenses_id = $request->input('expenses_id');           
            
        //  $res= array();
         $res= array();
         $file = $request->file('expenses_invoice');
         $imgName='';
         if(!empty($file)){
            if ($request->hasfile('expenses_invoice')) {
                 // $imgName = $file->getClientOriginalName();
                 $imgName = $request->file('expenses_invoice')->getClientOriginalName();
                 // $file->move('./upload/', $imgName);
                 $path = $request->file('expenses_invoice')->move('./expence/', $imgName);
                 $res['invoice']=$request->file('expenses_invoice')->getClientOriginalName();
 
            }
         }


        $res['expense_Name']=$request->input('expenses_title');
        $res['expenses_amount']=$request->input('expenses_amount');
        $res['payment_type']=$request->input('expenses_payment');
        $res['expense_date']=$request->input('expenses_date');
        $res['category']=$request->input('expenses_note');

        
            Expense::where('expenses_id', $expenses_id)->update($res);   
            $result['code']="200";
            $result['msg']="Expeses Updated successfully";

            echo json_encode($result);
    }
    public function destroy_expenses(Request $request)
    { //dd($request->all());
        Expense::where('expenses_id',$request->expenses_id)->delete();
        $data=array();
        $data['code']="200";
        $data['msg']="Expenses Data Deleted successfully!";

      return json_encode($data);
    }
}
